<?php

namespace App\Services\Home;

interface IHomeService
{

    /**
    * get All homes
    *
    * @return Collection<App\Models\homes>
    */
    public function all();

    /**
    * find homes By ID
    * @param int $id
    * @return App\Models\homes
    */
    public function find($id);
    /**
    * Create new homes
    *
    * @param Array $data
    * @return App\Models\homes
    */
    public function create($data);

    /**
    * update existing homes
    *
    * @param Array $data
    * @param App\Models\homes $homes
    * @return App\Models\homes
    */
    public function update($id, $data);


    /**
    * delete existing homes
    *
    * @param int $id
    * @return boolean
    */
    public function delete($id);




}
