<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderService extends BaseModel
{
    protected $fillable=['service_type','service_id','order_id','start_date','end_date'];
    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
public function service(){
        return $this->morphTo('service');
}
}
