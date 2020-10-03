<?php

namespace App\Services\Payment;

interface IPaymentService
{

    /**
    * get All payments
    * 
    * @return Collection<App\Models\MolliePayemnt> 
    */
    public function all();

    /**
    * find payemtn By ID 
    * @param int $id 
    * @return App\Models\MolliePayment 
    */
    public function find($id);
    /**
    * Create new payment
    * 
    * @param Array $data
    * @return App\Models\MolliePayment
    */
    public function create($data);

    /**
    * update existing payment
    * 
    * @param Array $data
    * @param int $id
    * @return App\Models\MolliePayemnt
    */
    public function update($id, $data);


    /**
    * delete existing payment
    * 
    * @param int $id
    * @return boolean
    */
    public function delete($id);

    

}
