<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function getJobs(){
        return Job::all();
    }
    public function show($job_id){
        return Job::findOrfail($job_id);
    }
    public function getByCompany($company_id){
        return Job::where('company_id',$company_id)->get();
    }

}
