<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\CityAddress;
use App\Models\Home;
use App\Services\Home\IHomeService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $home_service;

    public function __construct(IHomeService $home_service)
    {
        $this->home_service = $home_service;
    }

    public function index()
    {
        $user=Auth::user();
        $homes = $this->home_service->all();
        $homes=$homes->where('user_id',$user->id);
        return view('customer.homes.index',compact('homes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadMainImage(Request $request,$id){
        $home=Home::find($id);
        if($request->hasFile('file')) {
            $name = $request->file->getClientOriginalName();
            $extension = $request->file->getClientOriginalExtension();
            $mdf5 = md5($name . '_' . time()) . '.' . $extension;
            $home->addMediaFromRequest('file')->usingFileName($mdf5)->withResponsiveImages()->toMediaCollection('image');
        }
    }
    public function uploadOtherImage(Request $request,$id){
        $home=Home::find($id);
        if ($request->hasFile('files')) {
            $fileAdders = $home->addMultipleMediaFromRequest(['files'])
                ->each(function ($fileAdder) {
                    $fileAdder->withResponsiveImages()->toMediaCollection('photos');

                });
        }
    }
    public function create()
    {
        $cities=City::all();
        $user=Auth::user();
        $user=User::find($user->id);
        $home = $this->home_service->create([

        ]);
        return $home->id;
       // return view('customer.homes.create',compact('cities','home','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$home_id)
    {
        $city=City::where('id',$request->city)->first();
        if($city==null&&$request->city!=null)
            $city=City::create(['name'=>$request->city]);
        if($city!=null)
        $request['city_id']=$city->id;
        $request['user_id']=$request->user_id;
        $home = $this->home_service->update($home_id,$request->all());
        return redirect()->route('homes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $home= $this->home_service->find($id);
        return view('customer.homes.show',compact('home'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities=City::all();

        $home = $this->home_service->find($id);
        return view('customer.homes.edit',compact('home','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city=City::where('id',$request->city)->first();
        if($city==null&&$request->city!=null)
            $city=City::create(['name'=>$request->city]);
        if($city!=null)
        $request['city_id']=$city->id;
        $home = $this->home_service->update($id,$request->all());

        return redirect()->route('homes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->home_service->delete($id);
        return \redirect()->back();
    }
}
