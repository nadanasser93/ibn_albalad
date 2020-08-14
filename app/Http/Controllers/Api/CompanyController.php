<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function getCompanies(){
        return Company::all();
    }
    public function show($company_id){
        return Company::with('jobs')->findOrfail($company_id);
    }
    public function getByCity($city_id){
        return Company::where('city_id',$city_id)->get();
    }

}
