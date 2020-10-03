<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\City;
use App\Models\Employee;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view('job.city_or_job');
    }

    public function showjob()
    {
        $jobs = Job::all();
        return view('job.show_jobs', ['jobs' => $jobs]);
    }

    public function showcity()
    {
        $cities = City::all();
        return view('job.show_jobs', ['cities' => $cities]);
    }

    public function showbycity($id)
    {
        $city = City::findOrFail($id);
        $employees = Employee::where('city_id', '=', $id)->get();
        return view('job.jobs', ['employees' => $employees , 'city' => $city ]);
    }

    public function showbyjob($id)
    {
        $jobs = Job::findOrFail($id);
        $employees = Employee::where('job_id', '=', $id)->get();
        return view('job.jobs', ['employees' => $employees , 'city' => $city ]);
    }

    public function detail($id)
    {
        $employee = Employee::findOrFail($id);
        return view('job.details', ['employee' => $employee ]);
    }
}
