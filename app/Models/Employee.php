<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Employee extends BaseModel implements HasMedia
{
    use HasMediaTrait;
    protected $fillable=['post_code','street','house_number','description','city_id','title','user_id',
        'phone','email','contactor_name','subscription_id'
    ];

    protected $appends = ['employee_image'];

    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('employee_image')->singleFile();;

    }
    public function getEmployeeImageAttribute()
    {
        return $this->getFirstMedia('employee_image');
    }
    public function orderServices(){
        return $this->morphMany(OrderService::class, 'serviceable');
    }
}
