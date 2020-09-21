<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\CityJob;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function getJobs(){
        return Job::all();
    }
    public function show($job_id){
        return Job::with('cities')->findOrfail($job_id);
    }
    public function getJobByCity($city_id){
       //  $city=City::find($city_id);
        // return $city->jobs;
        $jobs=Job::join('city_job','city_job.job_id','jobs.id')->join('cities','city_job.city_id','cities.id')->
            select('jobs.id','jobs.name','city_id')->
            where('city_job.city_id',$city_id)->get();
        return $jobs;
    }
    public function getCompanies($city_id,$job_id){
        $companies=CityJob::where('city_id',$city_id)->where('job_id',$job_id)->get();
        return $companies;
    }
    public function getDetailes($id){
        $detaile=CityJob::find($id);
        return $detaile;
    }
}
