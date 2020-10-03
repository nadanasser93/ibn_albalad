<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Home;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function show($id)
    {
        $city = City::findOrFail($id);
        $homes = Home::where('city_id', '=', $id)->get();
        return view('home.homes', ['homes' => $homes , 'city' => $city ]);
    }


    public function detail($id)
    {
        $home = Home::findOrFail($id);
        return view('home.home_details', ['home' => $home ]);
    }
    
}
