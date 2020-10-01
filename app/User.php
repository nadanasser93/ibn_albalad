<?php

namespace App;

use App\Models\Company;
use App\Models\Employee;
use App\Models\Home;
use App\Models\Order;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const USER_ROLE_ADMIN_USER = 'admin';
    const USER_ROLE_SUPER_ADMIN_USER = 'superadmin';
    const USER_ROLE_COMPANY_USER = 'company';
    const USER_ROLE_CUSTOMER_USER = 'customer';

    protected $fillable = [
        'name', 'email', 'password','customer_name','phone','company_name','phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function isAdminUser() : bool
    {
        return $this->hasRole(self::USER_ROLE_ADMIN_USER) ;
    }

    /**
     * returns true if the user has super_admin role
     * @return bool
     */
    public function isSueprAdminUser() : bool
    {
        return  $this->hasRole(self::USER_ROLE_SUPER_ADMIN_USER);
    }
    public static function getUsersByType(string $type) : Collection
    {
        return User::whereHas('roles' , function($q ) use ($type){
            $q->where('name', $type);
        })->get();
    }
    public function order(){
        return $this->hasOne(Order::class,'user_id');
    }
    public function homes()
    {
        return $this->hasMany(Home::class,'user_id');
    }
    public function companies()
    {
        return $this->hasMany(Company::class,'user_id');
    }
    public function employees()
    {
        return $this->hasMany(Employee::class,'user_id');
    }
}
