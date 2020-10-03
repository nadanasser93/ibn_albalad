<?php

namespace App\Models;


class MolliePayment extends BaseModel
{
    //
    protected $fillable=['mollie_payment_id','amount','currency','method','description','status','webhookUrl','paymentable_id','paymentable_type'];
    
    
    public function paymentable()
    {
        return $this->morphTo();
    }
}
