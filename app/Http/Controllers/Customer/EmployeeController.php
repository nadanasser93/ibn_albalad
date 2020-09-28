<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\CityAddress;
use App\Models\Employee;
use App\Services\Employee\IEmployeeService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    private $employee_service;

    public function __construct(IEmployeeService $employee_service)
    {
        $this->employee_service = $employee_service;
    }

    public function index()
    {
        $user=Auth::user();
        $employees = $this->employee_service->all();
       /* $enp=Employee::where('title','')->get();
        foreach ($enp as $com)
            $com->delete();*/

        $employees=$employees->where('user_id',$user->id);
        return view('customer.employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadMainImage(Request $request,$id){
        $employees=Employee::find($id);
        if($request->hasFile('file')) {
            $name = $request->file->getClientOriginalName();
            $extension = $request->file->getClientOriginalExtension();
            $mdf5 = md5($name . '_' . time()) . '.' . $extension;
            $employees->addMediaFromRequest('file')->usingFileName($mdf5)->withResponsiveImages()->toMediaCollection('employee_image');
        }
    }

    public function create()
    {
        $cities=City::all();
        $user=Auth::user();
        $user=User::find($user->id);
        $employee = $this->employee_service->create([

        ]);
         return $employee->id;
       // return view('customer.employees.create',compact('cities','employee','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$employee_id)
    {
        $city=City::where('id',$request->city)->first();
        if($city==null&&$request->city!=null)
            $city=City::create(['name'=>$request->city]);
        if($city!=null)
        $request['city_id']=$city->id;
        $request['user_id']=$request->user_id;
        $employee = $this->employee_service->update($employee_id,$request->all());
        return redirect()->route('employees.index');
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
        $employee= $this->employee_service->find($id);
        return view('customer.employees.show',compact('employee'));
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

        $employee = $this->employee_service->find($id);
        return view('customer.employees.edit',compact('employee','cities'));
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
        $employee = $this->employee_service->update($id,$request->all());

        return redirect()->route('employees.index');
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
        $this->employee_service->delete($id);
        return \redirect()->back();
    }
}
