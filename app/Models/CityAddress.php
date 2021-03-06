<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityAddress extends BaseModel
{
    protected $fillable=['post_code','street','house_number','city_id','company_id','customer_id'];

    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }
    public function company(){
        return $this->belongsTo(Company::class,'company_id');
    }

    public function job(){
        return $this->belongsTo(Job::class,'job_id');
    }
}
