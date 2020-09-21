<?php

namespace App\Services\Customer;

use App\Services\Customer\ICustomerService;
use App\Models\Customer;
use Carbon\Carbon;
class CustomerService implements ICustomerService
{

    protected $customer;

    function __construct(Customer $customer) {
        $this->customer = $customer;
    }
    /**
    * get All Customers
    *
    * @return Collection<App\Models\Customer>
    */
    public function all(){
        return Customer::query()->orderby('created_at','desc')->get();
    }

    /**
    * find Customer By ID
    * @param int $id
    * @return App\Models\Customer
    */
    public function find($id){
        return Customer::where('id',$id)->first();
    }
    /**
    * Create new Customer
    *
    * @param Array $data
    * @return App\Models\Customer
    */
    public function create($data){
        $customer =  Customer::create($data);
        return $customer;
    }

    /**
    * update existing Customer
    *
    * @param Array $data
    * @param App\Models\Customer $Customer
    * @return boolean
    */
    public function update($id, $data){
        $customer = $this->find($id);

        $customer->update($data);

        return $customer;
    }


    /**
    * delete existing Customer
    *
    * @param int $id
    * @return boolean
    */
    public function delete($id){
        return Customer::destroy($id);
    }



}
