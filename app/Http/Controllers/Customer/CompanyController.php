<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\CityAddress;
use App\Models\Customer;
use App\Models\Job;
use App\Services\Company\ICompanyService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    private $company_service;

    public function __construct(ICompanyService $company_service)
    {
        $this->company_service = $company_service;
    }
    public function index()
    {
        $customer=Auth::user();
        //dd( $customer);
        $companies = $this->company_service->all();
        $companies=$companies->where('user_id',$customer->id);
        return view('customer.companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=Auth::user();
        $customer=User::find($user->id);
        $cities=City::all();
        $jobs=Job::all();
        return view('customer.companies.create',compact('customer','cities','jobs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $company = $this->company_service->create([
            'company_name'=>$request->company_name,
            'user_id'=>$request->customer_id,
            'kvk'=>$request->kvk,
            'phone'=>$request->phone,
            'description'=>$request->description,
            'email'=>$request->email,
        ]);
if($request->city!=null)
        for($i=0;$i<count($request->city);$i++)
        {
            $city=City::where('id',$request->city[$i])->first();
            if($city==null)
                $city=City::create(['name'=>$request->city[$i]]);
            $job=Job::where('id',$request->job[$i])->first();
            if($job==null)
                $job=Job::create(['name'=>$request->job[$i]]);
            $address=new CityAddress();
            $address->city_id=$city->id;
            $address->street=$request->street[$i];
            $address->house_number=$request->house_number[$i];
            $address->post_code=$request->post_code[$i];
            $address->company_id=$company->id;
            $address->save();
        }
        if($request->hasFile('image')) {
            $name = $request->image->getClientOriginalName();
            $extension = $request->image->getClientOriginalExtension();
            $mdf5 = md5($name . '_' . time()) . '.' . $extension;
            $company->addMediaFromRequest('image')->usingFileName($mdf5)->withResponsiveImages()->toMediaCollection('image');
        }
        if ($request->hasFile('photos')) {
            $fileAdders = $company->addMultipleMediaFromRequest(['photos'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('photos');

                });
            // }
        }
        return redirect()->route('companies.index');
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
        $company = $this->company_service->find($id);

        return view('customer.companies.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $company = $this->company_service->find($id);
        $cities=City::all();
        $jobs=Job::all();
        return view('customer.companies.edit',compact('company','cities','jobs'));
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
      //  dd($request->all());
        $company = $this->company_service->update($id,[
            'company_name'=>$request->company_name,
            'kvk'=>$request->kvk,
            'phone'=>$request->phone,
            'description'=>$request->description,
            'email'=>$request->email,
        ]);
      //  dd($company->addresses);
        if($request->city!=null)
            for($i=0;$i<count($request->city);$i++)
            {
                $city=City::where('id',$request->city[$i])->first();
                if($city==null)
                    $city=City::create(['name'=>$request->city[$i]]);
                $job=Job::where('id',$request->job[$i])->first();
                if($job==null)
                    $job=Job::create(['name'=>$request->job[$i]]);
                if($request->address_id==null)
                $address=new CityAddress();
                else
                $address=CityAddress::find($request->address_id);
                $address->city_id=$city->id;
                $address->job_id=$job->id;
                $address->street=$request->street[$i];
                $address->house_number=$request->house_number[$i];
                $address->post_code=$request->post_code[$i];
                $address->save();
            }
        if($request->hasFile('image')) {
            $name = $request->image->getClientOriginalName();
            $extension = $request->image->getClientOriginalExtension();
            $mdf5 = md5($name . '_' . time()) . '.' . $extension;
            $company->addMediaFromRequest('image')->usingFileName($mdf5)->withResponsiveImages()->toMediaCollection('image');
        }
        return redirect()->route('companies.index');

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
        $this->company_service->delete($id);
        return \redirect()->back();
    }
    public function destroyAddress($id)
    {
        CityAddress::find($id)->delete($id);
      //  return \redirect()->back();
    }
}
