<?php

namespace App\Services\Subscription;


use App\Models\Subscription;
use Carbon\Carbon;
class SubScriptionService implements ISubscriptionService
{

    protected $subscription;

    function __construct(Subscription $subscription) {
        $this->subscription = $subscription;
    }
    /**
    * get All subscriptions
    *
    * @return Collection<App\Models\Subscription>
    */
    public function all(){
        return Subscription::query()->orderby('created_at','desc')->get();
    }

    /**
    * find subscription By ID
    * @param int $id
    * @return App\Models\Subscription
    */
    public function find($id){
        return Subscription::where('id',$id)->first();
    }
    /**
    * Create new subscription
    *
    * @param Array $data
    * @return App\Models\Subscription
    */
    public function create($data){
        $subscription =  Subscription::create($data);
        return $subscription;
    }

    /**
    * update existing subscription
    *
    * @param Array $data
    * @param App\Models\Subscription $subscription
    * @return boolean
    */
    public function update($id, $data){
        $subscription = $this->find($id);

        $subscription->update($data);

        return $subscription;
    }


    /**
    * delete existing subscription
    *
    * @param int $id
    * @return boolean
    */
    public function delete($id){
        return Subscription::destroy($id);
    }



}
