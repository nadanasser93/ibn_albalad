<?php

namespace App\Services\Subscription;

interface ISubscriptionService
{

    /**
    * get All subscriptions
    *
    * @return Collection<App\Models\Subscription>
    */
    public function all();

    /**
    * find subscription By ID
    * @param int $id
    * @return App\Models\Subscription
    */
    public function find($id);
    /**
    * Create new subscription
    *
    * @param Array $data
    * @return App\Models\Subscription
    */
    public function create($data);

    /**
    * update existing subscription
    *
    * @param Array $data
    * @param App\Models\Subscription $subscription
    * @return App\Models\Subscription
    */
    public function update($id, $data);


    /**
    * delete existing subscription
    *
    * @param int $id
    * @return boolean
    */
    public function delete($id);




}
