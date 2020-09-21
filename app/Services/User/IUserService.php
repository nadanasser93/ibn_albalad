<?php

namespace App\Services\User;

interface IUserService
{

    /**
    * get All userse
    * 
    * @return Collection<App\User> 
    */
    public function all();

    /**
    * find user By ID 
    * @param int $id 
    * @return App\User 
    */
    public function find($id);
    /**
    * Create new user
    * 
    * @param Array $data
    * @return App\User
    */
    public function create($data);

    /**
    * update existing user
    * 
    * @param Array $data
    * @param int $id
    * @return boolean
    */
    public function update($id, $data);


    /**
    * delete existing user
    * 
    * @param int $id
    * @return boolean
    */
    public function delete($id);

    /**
     * create a user for client
     * @param Array $data
     * @return App\User 
     */
    public function creat_user_for_client($data);
}
