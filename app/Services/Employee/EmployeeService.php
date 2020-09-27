<?php

namespace App\Services\Employee;

use App\Models\Employee;
use Carbon\Carbon;
class EmployeeService implements IEmployeeService
{

    protected $employee;

    function __construct(Employee $employee) {
        $this->employee = $employee;
    }
    /**
    * get All Customers
    *
    * @return Collection<App\Models\employees>
    */
    public function all(){
        return Employee::query()->orderby('created_at','desc')->get();
    }

    /**
    * find employees By ID
    * @param int $id
    * @return App\Models\employees
    */
    public function find($id){
        return Employee::where('id',$id)->first();
    }
    /**
    * Create new Customer
    *
    * @param Array $data
    * @return App\Models\employees
    */
    public function create($data){
        $employees =  Employee::create($data);
        return $employees;
    }

    /**
    * update existing employees
    *
    * @param Array $data
    * @param App\Models\employees $employees
    * @return boolean
    */
    public function update($id, $data){
        $employees = $this->find($id);

        $employees->update($data);

        return $employees;
    }


    /**
    * delete existing Customer
    *
    * @param int $id
    * @return boolean
    */
    public function delete($id){
        return Employee::destroy($id);
    }



}
