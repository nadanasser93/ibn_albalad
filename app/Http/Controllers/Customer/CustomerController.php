<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Services\Customer\ICustomerService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller
{
    private $customer_service;

    public function __construct(ICustomerService $customer_service)
    {
        $this->customer_service = $customer_service;
    }

    public function profile(){
        if(Auth::user()->userable_type==Customer::class) {
            $customer = $this->customer_service->find(auth()->user()->userable_id);
        }
        else $customer=null;
        return view('customer.profile', compact('customer'));
    }
    public function store(Request $request)
    {


        $data  = $request->validate([
            'customer_name'=>['required', 'string', 'max:255'],
            'phone'=>['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);

        $customer =$this->customer_service->create($data);
        if($request->hasFile('image')){
            $name =  $request->image_file->getClientOriginalName();
            $extension = $request->image_file->getClientOriginalExtension();
            $mdf5 = md5($name.'_'.time()).'.'.$extension;
            $customer->addMediaFromRequest('image')->usingFileName($mdf5)->withResponsiveImages()->toMediaCollection('image');
        }
        $user=Auth::user();

        $user->userable_type = "App\Models\Customer";
        $user->userable_id = $customer->id;
        $user->update();
        $user->assignRole(User::USER_ROLE_CUSTOMER_USER);
        return back();
    }
}
