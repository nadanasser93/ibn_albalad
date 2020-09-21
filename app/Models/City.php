<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends BaseModel
{
    protected $fillable=['name'];
    public function addresses()
    {
        return $this->hasMany(CityAddress::class,'city_id');//->withPivot('company_name', 'company_address','company_phone','company_description','image');
    }
    public function homes()
    {
        return $this->hasMany(Home::class,'city_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class,'city_id');
    }
}
