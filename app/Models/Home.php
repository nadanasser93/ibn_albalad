<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Home extends BaseModel implements HasMedia
{
    use HasMediaTrait;
    protected $fillable=['post_code','street','house_number','description','city_id','company_id','change','user_id',
        'phone','area','rooms_count','house_type','subscription_id'
    ];

    protected $appends = ['main_image','photos'];

    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('main_image')->singleFile();;

        $this->addMediaCollection('photos');
    }
    public function getPhotosAttribute()
    {
        return $this->getMedia('photos');
    }
    public function getMainImageAttribute()
    {
        return $this->getFirstMedia('image');
    }
    public function orderServices(){
        return $this->morphMany(OrderService::class, 'service');
    }
    public function subscription(){
        return $this->belongsTo(Subscription::class,'subscription_id');
    }
}
