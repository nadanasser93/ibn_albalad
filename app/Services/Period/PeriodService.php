<?php

namespace App\Services\Period;




use App\Models\Period;
use App\Services\Period\IPeriodService;

use Carbon\Carbon;
class PeriodService implements IPeriodService
{

    protected $period;

    function __construct(Period $period) {
        $this->period = $period;
    }
    /**
    * get All Periods
    *
    * @return Collection<App\Models\Period>
    */
    public function all(){
        return Period::query()->orderby('created_at','desc')->get();
    }

    /**
    * find period By ID
    * @param int $id
    * @return App\Models\Period
    */
    public function find($id){
        return Period::where('id',$id)->first();
    }
    /**
    * Create new period
    *
    * @param Array $data
    * @return App\Models\Period
    */
    public function create($data){
        $period =  Period::create($data);
        return $period;
    }

    /**
    * update existing period
    *
    * @param Array $data
    * @param App\Models\Period $period
    * @return boolean
    */
    public function update($id, $data){
        $period = $this->find($id);

        $period->update($data);

        return $period;
    }


    /**
    * delete existing Period
    *
    * @param int $id
    * @return boolean
    */
    public function delete($id){
        return Period::destroy($id);
    }



}
