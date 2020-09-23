<?php

namespace App\Services\Home;


use App\Models\Home;
use App\Services\Home\IHomeService;
use Carbon\Carbon;
class HomeService implements IHomeService
{

    protected $home;

    function __construct(Home $home) {
        $this->home = $home;
    }
    /**
    * get All Customers
    *
    * @return Collection<App\Models\homes>
    */
    public function all(){
        return Home::query()->orderby('created_at','desc')->get();
    }

    /**
    * find home By ID
    * @param int $id
    * @return App\Models\Home
    */
    public function find($id){
        return Home::where('id',$id)->first();
    }
    /**
    * Create new Customer
    *
    * @param Array $data
    * @return App\Models\Home
    */
    public function create($data){
        $home =  Home::create($data);
        return $home;
    }

    /**
    * update existing homes
    *
    * @param Array $data
    * @param App\Models\homes $home
    * @return boolean
    */
    public function update($id, $data){
        $home = $this->find($id);

        $home->update($data);

        return $home;
    }


    /**
    * delete existing Customer
    *
    * @param int $id
    * @return boolean
    */
    public function delete($id){
        return Home::destroy($id);
    }



}
