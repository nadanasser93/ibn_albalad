<?php

namespace App\Services\User;

use App\Services\User\IUserService;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Helpers\UserHelper;

class UserService implements IUserService
{ 

    protected $user;

    function __construct(User $user) {
        $this->user = $user;
    }
    /**
    * get All users
    * 
    * @return Collection<App\User> 
    */
    public function all(){
        return User::cursor();
    }

    /**
    * find user By ID 
    * @param int $id 
    * @return App\User 
    */
    public function find($id){
        return User::where('id',$id)->first();
    }
    /**
    * Create new User
    * 
    * @param Array $data
    * @return App\User
    */
    public function create($data){
        $user =  User::create($data);
        return $user;
    }

    /**
    * update existing user
    * 
    * @param Array $data
    * @param int $id
    * @return boolean
    */
    public function update($id, $data){
        $user = $this->find($id);
        $user->update($data);
        return $user;
    }


    /**
    * delete existing user
    * 
    * @param int $id
    * @return boolean
    */
    public function delete($id){
        return User::destroy($id);
    }

    /**
    * create a user for client
    * @param Array $data
    * @return App\User 
    */
    public function creat_user_for_client($data){
        $data['name']=$data['first_name'];
        $pass = UserHelper::generatePassword();
        $data['unhashed_password'] = $pass;
        $data['password']=Hash::make($pass);
        $user =  $this->create($data);
        $user->assignRole(User::USER_ROLE_STANDARD_USER);
        return $user;

    }
 
}
