<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends BaseModel
{
    protected $fillable=['name'];

    public function addresses()
    {
        return $this->hasMany(CityAddress::class,'job_id');//->withPivot('company_name', 'company_address','company_phone','company_description','image');
    }

}
