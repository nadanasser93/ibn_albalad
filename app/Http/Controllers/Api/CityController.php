<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCities(){
        return City::all();
    }
    public function show($id){
        return City::with('companies')->findOrfail($id);
    }
}
