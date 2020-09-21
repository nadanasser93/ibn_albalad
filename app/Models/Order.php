<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends BaseModel
{
    protected $fillable=['order_type','	orderable_id','orderable_type','description','city_id','job_id','home_id'];
    public function orderable(){
        return $this->morphTo();
    }
    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }
    public function job(){
        return $this->belongsTo(Company::class,'job_id');
    }
    public function home(){
        return $this->belongsTo(Customer::class,'home_id');
    }
}
