<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;
use App\Models\Customer;
use App\Services\Company\ICompanyService;
use App\Services\Customer\ICustomerService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller
{
    private $customer_service,$company_service;

    public function __construct(ICustomerService $customer_service,ICompanyService $company_service)
    {
        $this->customer_service = $customer_service;
        $this->company_service = $company_service;
    }

    public function profile(){
        $user=Auth::user();
        $cities=City::all();
        if(Auth::user()->userable_type==Customer::class) {
            $customer = $this->customer_service->find(auth()->user()->userable_id);
        }
        else if(Auth::user()->userable_type==Company::class)
            $customer = $this->company_service->find(auth()->user()->userable_id);
        else $customer=null;
        return view('customer.profile', compact('customer','user','cities'));
    }
    public function store(Request $request)
    {
        if ($request['type'] == 'customer') {
            $request->validate([
                'customer_name' => ['required', 'string', 'max:255'],
            ]);
            if (Auth::user()->userable_type == Customer::class) {
                $customer = $this->customer_service->update(Auth::user()->userable_id, $request->all());
            } else
                $customer = $this->customer_service->create($request->all());
            $user = User::find($request->user_id);
            $user->userable_type = "App\Models\Customer";
            $user->userable_id = $customer->id;
            $user->update();
            $user->assignRole(User::USER_ROLE_CUSTOMER_USER);
        }
        else{
            $request->validate([
                'company_name' => ['required', 'string', 'max:255'],
            ]);
            if (Auth::user()->userable_type == Company::class) {
                $company = $this->company_service->update(Auth::user()->userable_id, $request->all());
            } else
                $company = $this->company_service->create($request->all());

            /*  if($request->hasFile('image')){
                  $name =  $request->image->getClientOriginalName();
                  $extension = $request->image->getClientOriginalExtension();
                  $mdf5 = md5($name.'_'.time()).'.'.$extension;
                  $customer->addMediaFromRequest('image')->usingFileName($mdf5)->withResponsiveImages()->toMediaCollection('image');
              }*/
          /*  $user = User::find($request->user_id);
            $user->userable_type = "App\Models\Company";
            $user->userable_id = $company->id;
            $user->update();
            $user->assignRole(User::USER_ROLE_COMPANY_USER);*/
        }
        return back();
    }
}
