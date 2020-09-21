<?php

namespace App\Models;

use Hamcrest\Thingy;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Company extends BaseModel implements HasMedia
{
    use HasMediaTrait;
    protected $fillable=['company_name','phone','email','bank_account','description','kvk','btw'];
    protected $appends =['image'];
    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
    public function addresses()
    {
        return $this->hasMany(CityAddress::class,'company_id');//->withPivot('company_name', 'company_address','company_phone','company_description','image');
    }
    public function homes()
    {
        return $this->hasMany(Home::class,'home_id');
    }
    public function orders()
    {
        return $this->morphMany('App\Models\Order', 'orderable');
    }
    public function registerMediaCollections()
    {
        $this->addMediaCollection('image')
            ->singleFile();
    }
    public function getImageAttribute()
    {
        return $this->getFirstMedia('image');
    }
}
