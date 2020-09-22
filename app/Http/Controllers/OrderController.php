<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderFormRequest;
use App\Models\Order;
use App\Models\Subscription;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Mollie\Laravel\Facades\Mollie;

class OrderController extends Controller
{
    public function order(OrderFormRequest $request)
    {

        //dd($request->all());
        if(Auth::user()->isAdminUser()) {

            return response()->json([
                'status'    => 'error',
                'message'   => 'contacteer de systeem administrator. Er is iets mis gegaan.'
            ]);
        }

        $startDate = date('Y-m-d');

        $endDate = date('Y-m-d', strtotime(date('Y-m-d').' + 1 '.$request->get('subscription_name')));
        /**
         * @var $existingOrder Order
         */
        $existingOrder = Order::query()->where('user_id', Auth::user()->id)
                               ->whereNotIn('payment_status', ['canceled', 'failed'])
                               ->where('end_date', '>', $endDate)
                               ->where('start_date', '<', $startDate)
                               ->first();

        if(!empty($existingOrder)) {
            return response()->json([
                'status' => 'failed',
                'message'=> 'You already have a subscription running currently.'
            ]);
        }

        $orderData = $request->all();

        $mollieMethods = Mollie::api()->methods()->allActive();
        $mollieMethodNames = [];
        foreach ($mollieMethods as $mollieMethod) {
            $mollieMethodNames[] = $mollieMethod->id;
        }

        if(!in_array($orderData['method'], $mollieMethodNames)) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Betaalmethode is niet beschikbar, selecteer 1 van de betaalmethodes.',
            ]);
        }



        $order = new Order();

        /**
         * @var Subscription $subscription
         */
        $subscription = Subscription::query()->where('period_id', $request->get('subscription_id'))->first();

        $order->user_id  = Auth::user()->id;

        $order->subscription_id    = $request->get('subscription_id');
        $order->payment_method    = $orderData['method'];
        $order->payment_status  =  'open';
        $order->start_date  =  $startDate;
        $order->end_date  =  $endDate;
        $order->amount_excl  =  $subscription->price_excl;
        $order->amount_incl  =  $subscription->price_incl;

        /**
         * @var $order Order
         */
        if($order->save()) {
            $order->refresh();
            return $this->processingThePayment($order);
        }

        return response()->json([
            'status' => 'failed',
            'message'=> 'Er is tijdens het invoeren van de bestelling iets fout gegaan.'
        ]);
    }

    public function processPaymentMethod(Request $request) {
        $data = $request->all();

        $mollieMethods = Mollie::api()->methods()->allActive();
        $mollieMethodNames = [];
        foreach ($mollieMethods as $mollieMethod) {
            $mollieMethodNames[] = $mollieMethod->id;
        }

        if(!in_array($data['method'], $mollieMethodNames)) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Betaalmethode is niet beschikbar, selecteer 1 van de betaalmethodes.',
            ]);
        }

        $order = Order::query()->where('user_id', Auth::user()->id)
                               ->where('id', $data['order_id'])
                               ->first();

        if(empty($order)) {
            return redirect()->route('subscription/extend', [
                'status'    => 'no_order',
                'message'   => 'Er is geen bestelling bekend bij ons, plaats nu een bestelling'
            ]);
        }

        $order->payment_method = $data['method'];
        $order->save();
        $order->refresh();

        return $this->processingThePayment($order);
    }


    public function processingThePayment(Order $order)
    {
        $amount = number_format($order->amount_incl,2,'.','');
        $orderDescription = '';
        $payment = Mollie::api()->payments()->create([
            "method" => $order->payment_method,
            'amount' => [
                'currency' =>  config('molie.defaults.currency'),
                'value' => $amount, // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'description' => (string)$order->id,
            'redirectUrl' =>  config('app.url').'/subscription/status/',

        ]);
        $order->payment_id = $payment->id;
        $order->payment_status = $payment->status;
        $order->save();
        $payment = Mollie::api()->payments()->get($payment->id);
        $order->save();
        // redirect customer to Mollie checkout page
        //Redirect::away($payment->getCheckoutUrl());
        //return redirect($payment->getCheckoutUrl(), 302);

        return response()->json([
            'status' => 'success',
            'code'   => '302',
            'redirectUrl' => $payment->getCheckoutUrl(),
        ]);
    }

    public function checkThePayment(Order $order)
    {
        /**
         * @var Mollie $payment
         */
        $payment = mollie()->payments()->get( $order->payment_id);


        $order->payment_status = $payment->status;
        $order->payment_method = $payment->method;
        $order->save();

        if(in_array($order->payment_status, ['expired', 'failed', 'canceled'])) {
            return redirect('/subscription/extend');
        }

        if($payment->isPaid()) {
            switch ($order->subscription->period_id) {
                case 1:
                    $subscriptionDateAdd = 'week';
                    break;
                case 2:
                    $subscriptionDateAdd = 'month';
                    break;
                case 3:
                    $subscriptionDateAdd = 'year';
                    break;

            }
            $order->start_date = date('Y-m-d');
            $order->end_date = date('Y-m-d', strtotime(date('Y-m-d'). ' + 1 '.$subscriptionDateAdd));

            $order->save();
            $order->refresh();
        }

        return;
        //return redirect('/subscription/status');
    }

    public function getStatus()
    {

        $date = date('Y-m-d');


        $user = Auth::user();
        /**
         * @var Order $order
         */
        $order = Order::query()->where('user_id', $user->id)
                               ->where('end_date', '>', $date) // date_end is before now
                               ->where('payment_status', 'paid')
                               ->orderByDesc('id')->first();

        if(empty($order)) {
            $order = Order::query()->where('user_id', $user->id)
                        ->whereIn('payment_status', ['open','pending'])
                        ->orderByDesc('id')
                        ->first();
            if(empty($order)) {
                return response()->json([
                    'status' => 404,
                ]);
            }
        }

        if($order->payment_status === 'paid') {
            return  response()->json([
                'status' => 'paid',
            ]);
        }
        $this->checkThePayment($order);
        $order->refresh();

        if($order->payment_status === 'pending') {
            $payment = Mollie::api()->payments()->get($order->payment_id);
            if($payment->status !== 'pending' ){
                $order->payment_status = $payment->status ;
                $order->save();
            }
        }

        if($order->payment_status === 'open') {
            $payment = Mollie::api()->payments()->get($order->payment_id);
            if($payment->status === 'open' ){
                $order->payment_status = 'expired';
                $order->save();
            }
        }

        return response()->json([
            'status' => $order->payment_status,
        ]);

    }
}
