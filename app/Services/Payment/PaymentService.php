<?php

namespace App\Services\Payment;

use App\Models\MolliePayment;
use App\Services\Payment\IPaymentService;

use Carbon\Carbon;
use Mollie\Laravel\Facades\Mollie;


class PaymentService implements IPaymentService
{

    protected $payement;

    function __construct(MolliePayment $payement) {
        $this->payement = $payement;
    }
    /**
    * get All Payemnts
    *
    * @return Collection<App\Models\Payments>
    */
    public function all(){
        return MolliePayment::cursor();
    }

    /**
    * find payment By ID
    * @param int $id
    * @return App\Models\MolliePayemnt
    */
    public function find($payment_id){
        return MolliePayment::where('mollie_payment_id',$payment_id)->first();
    }
    /**
    * Create new Patment
    *
    * @param Array $data
    * @return App\Models\MolliePayment
    */
    public function create($data){
        $amount = number_format(floatval($data['amount']) ,2,'.','');
        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => 'EUR',
                'value' => $amount, // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'description' => 'order an Service From Dalilak Site',
            'webhookUrl' => route('webhooks.mollie'),
            'redirectUrl' => route('order.success')
            ]);
        $payment_mollie = Mollie::api()->payments()->get($payment->id);
       // dd($payment_mollie);
        $data['mollie_payment_id']=$payment_mollie->id;
        $data['status']=$payment_mollie->status;
        $data['currency']='EUR';
        $data['method']=$payment_mollie->method;
        $payement =  MolliePayment::create($data);

        return $payment_mollie;
    }

    /**
    * update existing payment
    *
    * @param Array $data
    * @param int $id
    * @return boolean
    */
    public function update($id, $data){
        $mollie_payment = Mollie::api()->payments()->get($data['id']);
        $payement = $this->find($mollie_payment->id);
        $data['status'] = $mollie_payment->status;
        $payement->update($data);

        return $payement;
    }


    /**
    * delete existing paymetn
    *
    * @param int $id
    * @return boolean
    */
    public function delete($id){
        return MolliePayment::destroy($id);
    }


}
