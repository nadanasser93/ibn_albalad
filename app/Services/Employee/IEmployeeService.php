<?php

namespace App\Services\Employee;

interface IEmployeeService
{

    /**
    * get All employees
    *
    * @return Collection<App\Models\employees>
    */
    public function all();

    /**
    * find employees By ID
    * @param int $id
    * @return App\Models\employees
    */
    public function find($id);
    /**
    * Create new employees
    *
    * @param Array $data
    * @return App\Models\employees
    */
    public function create($data);

    /**
    * update existing employees
    *
    * @param Array $data
    * @param App\Models\employees $employees
    * @return App\Models\employees
    */
    public function update($id, $data);


    /**
    * delete existing employees
    *
    * @param int $id
    * @return boolean
    */
    public function delete($id);




}
