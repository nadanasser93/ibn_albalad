<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\CityAddress;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Job;
use App\Services\Company\ICompanyService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\Models\Media;

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
       /* $coms=Company::where('company_name','created')->get();
        foreach ($coms as $com)
            $com->delete();*/

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

        $company = $this->company_service->create([
            'company_name'=>'created',
        ]);
         return $company->id;
       // return view('customer.companies.create',compact('customer','cities','jobs','company',''));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$company_id)
    {
        $jobs=[];
        if(isset($request->job))
            if(count($request->job)<=3) {
           // dd($request->job);
                for ($x = 0; $x < count($request->job); $x++) {
                    $job = Job::where('id', $request->job[$x])->first();
                    if ($job == null) {
                        $job = Job::create(['name' => $request->job[$x]]);

                    }
                    array_push($jobs, $job->id);
                }
            }
            else
            return response()->json(['errors'=>'You Can Select Only Three Jobs']);
      //  dd($company_id,$request->all());
          $company = $this->company_service->update($company_id,[
            'company_name'=>$request->company_name,
            'user_id'=>$request->customer_id,
            'kvk'=>$request->kvk,
            'phone'=>$request->phone,
            'description'=>$request->description,
            'email'=>$request->email,
            'job'=>$jobs,
        ]);
         if($request->city!=null)
        for($i=0;$i<count($request->city);$i++)
        {
            $city=City::where('id',$request->city[$i])->first();
            if($city==null&&$request->city!=null)
                $city=City::create(['name'=>$request->city[$i]]);
            $address=new CityAddress();
            if($city!=null)
            $address->city_id=$city->id;
            $address->street=$request->street[$i];
            $address->house_number=$request->house_number[$i];
            $address->post_code=$request->post_code[$i];
            $address->company_id=$company->id;
            $address->save();
        }


        return response()->json(['success'=>'Success']);
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
  public function uploadMainImage(Request $request,$id){
        $company=Company::find($id);
      if($request->hasFile('file')) {
          $name = $request->file->getClientOriginalName();
          $extension = $request->file->getClientOriginalExtension();
          $mdf5 = md5($name . '_' . time()) . '.' . $extension;
          $company->addMediaFromRequest('file')->usingFileName($mdf5)->withResponsiveImages()->toMediaCollection('image');
      }
  }
    public function uploadOtherImage(Request $request,$id){
        $company=Company::find($id);
        if ($request->hasFile('files')) {
            $fileAdders = $company->addMultipleMediaFromRequest(['files'])
                ->each(function ($fileAdder) {
                    $fileAdder->withResponsiveImages()->toMediaCollection('photos');

                });
        }
    }
    public function deleteImage($id)
    {
        $image=Media::find($id)->delete();
    }
    public function updateImage(Request $request,$id)
    {
       // dd($request->all());

        $image=Media::find($id);
        $company=Company::find($request->company_id);


            //$image->delete();
            $name = $request->image->getClientOriginalName();
            $extension = $request->image->getClientOriginalExtension();
            $mdf5 = md5($name . '_' . time()) . '.' . $extension;
            $company->addMediaFromRequest('image')->usingFileName($mdf5)->withResponsiveImages()->toMediaCollection('photos');


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
       $request->validate(['company_name'=>'required']);
        $jobs=[];
        if(isset($request->job))
            if(count($request->job)<=3) {
              //  dd($request->job);
                for ($x = 0; $x < count($request->job); $x++) {
                    $job = Job::where('id', $request->job[$x])->first();
                    if ($job == null) {
                        $job = Job::create(['name' => $request->job[$x]]);

                    }
                    array_push($jobs, $job->id);
                }
            }
            else
        return redirect()->back()->with('messg',"You Can Select Only Three Jobs");
        $company = $this->company_service->update($id,[
            'company_name'=>$request->company_name,
           // 'user_id'=>$request->customer_id,
            'kvk'=>$request->kvk,
            'phone'=>$request->phone,
            'description'=>$request->description,
            'email'=>$request->email,
            'job'=>$jobs,
        ]);
      //  dd($company->addresses);
        if($request->city!=null)
            for($i=0;$i<count($request->city);$i++)
            {
                $city=City::where('id',$request->city[$i])->first();
                if($city==null&&$request->city!=null)
                    $city=City::create(['name'=>$request->city[$i]]);
                $job=Job::where('id',$request->job[$i])->first();
                if($job==null)
                    $job=Job::create(['name'=>$request->job[$i]]);
                if($request->address_id==null)
                $address=new CityAddress();
                else
                $address=CityAddress::find($request->address_id);
                if($city!=null)
                $address->city_id=$city->id;
               // $address->job_id=$job->id;
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
