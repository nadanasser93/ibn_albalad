<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Period
 *
 * @property int $id
 * @property string $name
 * @property int $number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Period whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Period extends Model
{
    //

    /*public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }*/
}
