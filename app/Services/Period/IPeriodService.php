<?php

namespace App\Services\Period;

interface IPeriodService
{

    /**
    * get All period
    *
    * @return Collection<App\Models\Period>
    */
    public function all();

    /**
    * find period By ID
    * @param int $id
    * @return App\Models\Period
    */
    public function find($id);
    /**
    * Create new period
    *
    * @param Array $data
    * @return App\Models\Period
    */
    public function create($data);

    /**
    * update existing period
    *
    * @param Array $data
    * @param App\Models\Period $period
    * @return App\Models\Period
    */
    public function update($id, $data);


    /**
    * delete existing period
    *
    * @param int $id
    * @return boolean
    */
    public function delete($id);




}
