<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Job;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCities(){
        return City::all();
    }
    public function show($id){
        return City::with('jobs')->findOrfail($id);
    }
    public function getByJob($job_id){
     //   $job=Job::find($job_id);
     //   return $job->cities;
        $cities=City::join('city_job','city_job.city_id','cities.id')
            ->join('jobs','city_job.job_id','jobs.id')->
        select('cities.id','cities.name','job_id')->
        where('city_job.job_id',$job_id)->distinct('cities.name')->get();
        return $cities;
    }
    public function getImage($job_id){
        $job=Job::find($job_id);
        return 'http://ibn-albalad.amtechno.nl/public/storage/'.$job->image;
    }

}
