<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;

use App\Services\Company\ICompanyService;
use App\Services\Customer\ICustomerService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller
{
    private $company_service;

    public function __construct(ICompanyService $company_service)
    {
       // $this->customer_service = $customer_service;
        $this->company_service = $company_service;
    }

    public function profile(){
        $customer=Auth::user();
       /* if(Auth::user()->userable_type==Customer::class) {
            $customer = $this->customer_service->find(auth()->user()->userable_id);
        }
        else if(Auth::user()->userable_type==Company::class)
            $customer = $this->company_service->find(auth()->user()->userable_id);
        else $customer= new Customer();*/
        return view('customer.profile', compact('customer'));
    }
    public function store(Request $request)
    {

        $user = User::where('id',$request->user_id)->first();
      //  dd($user);
            $request->validate([
              'customer_name' => ['required', 'string', 'max:255'],
                'email' => 'required|email|unique:users,email,'.$user->id,
            ]);


        if ($request['type'] == 'customer')
            $request['customer_type']=1;
          else
              $request['customer_type']=2;



        $user->userable_type = "customer";
        $user->customer_name = $request->customer_name;
        $user->company_name= $request->company_name;
        $user->kvk= $request->kvk;
        $user->phone= $request->phone;
        $user->email= $request->email;
        $user->customer_type= $request->customer_type;

            $user->update();

        return back();
    }
}
