<?php

namespace App\Models;

use Hamcrest\Thingy;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable=['company_name','city_id','address','phone'];
    public function jobs()
    {
        return $this->hasMany(Job::class,'company_id');
    }
    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }
}
