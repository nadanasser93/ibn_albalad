<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderService;
use App\Services\Payment\IPaymentService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public $payment_service;

    public function __construct(
                                IPaymentService $payment_service)
    {
        $this->payment_service = $payment_service;
    }
    public function storeOrder(Request $request){
        $user=Auth::user();
        $request['user_id']=$user->id;
        $order=Order::create($request->all());
        return $order;

    }
    public function storeServiceOrder(Request $request){
        if($request->type=="companies")
            $request['service_type']="App\Models\Company";
        else if($request->type=="homes")
            $request['service_type']="App\Models\Home";
        else
            $request['service_type']="App\Models\Employee";
        $request['service_id'] = $request->id;
        $service = OrderService::create($request->all());
        return $service;
    }
    public function getCustomerOrders($order_id){
        $order=Order::with(['user','services','services.service','services.service.subscription'])->where('id',$order_id)->first();
        $sum_incl=0;$sum_excl=0;
       // dd($order->services);
        foreach ($order->services as $service)
        {
            if($service->service->subscription!=null) {
                $sum_incl += $service->service->subscription->price_incl;
                $sum_excl += $service->service->subscription->price_excl;
            }
        }
        $order->payment_status='open';
        $order->amount_excl=$sum_excl;
        $order->amount_incl=$sum_incl;
        $order->update();
        return $order;
    }
    public function order(Request $request){
        $data = $request->all();
        $data['user_id']= Auth::user()->id;
        $order=Order::find($request->order_id);
        $data['paymentable_id']=$order->id;
        $data['paymentable_type']="App\Models\Order";
        $data['amount']=$order->amount_excl ;
        $payment = $this->payment_service->create($data);
        return redirect($payment->getCheckoutUrl(), 303);

    }


    public function handleWebhook(Request $request){
        if (! $request->has('id')) {
            return;
        }
        $mollie_payment = $this->payment_service->update($request->id,$request->all());
        switch($mollie_payment->status){
            case "cancled":
                return redirect()->route('payment.failed');
                break;
            case "paid":
                // event(new ClientHasPaidEvent($reservation));
                break;
        }

    }
}
