<?php

namespace App\Models;

use App\Models\Period;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * App\Models\Subscription
 *
 * @property int $id
 * @property int $period_id
 * @property string $name
 * @property string $description
 * @property int $most_chosen
 * @property string $order_type
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property float $price_incl
 * @property float $price_excl
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscription whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscription whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscription whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscription whereMostChosen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscription whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscription wherePeriodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscription wherePriceExcl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscription wherePriceIncl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscription whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Subscription extends BaseModel implements HasMedia
{
    use HasMediaTrait;

    protected $fillable=['period_id','name','description','most_chosen','price_incl','price_excl','order_type','is_company','discount','subscription_for'];
    protected $appends =['image'];
    public function period()
    {
        return $this->belongsTo(Period::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
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
