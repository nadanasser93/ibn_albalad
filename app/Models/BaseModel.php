<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\LocalizeTrait;
class BaseModel extends Model
{
    //
    use SoftDeletes;//,LocalizeTrait;
    protected $dates=['deleted_at'];

}
