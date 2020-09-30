<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;

use App\Models\Employee;
use App\Models\Home;
use App\Models\Job;
use App\Models\Subscription;
use App\Services\Company\ICompanyService;
use App\Services\Customer\ICustomerService;
use App\Services\Employee\IEmployeeService;
use App\Services\Home\IHomeService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller
{
    private $company_service,$employee_service,$home_service;

    public function __construct(ICompanyService $company_service,IHomeService $home_service,IEmployeeService $employee_service)
    {
       // $this->customer_service = $customer_service;
        $this->company_service = $company_service;
        $this->home_service = $home_service;
        $this->employee_service = $employee_service;
    }
    public function getAll(){
        $customer=Auth::user();
        $jobs=Job::all();
        return view('customer.all_services',compact('customer','jobs'));
    }
    public function profile(){
        $customer=Auth::user();

        $cities=City::all();
        $jobs=Job::all();

        return view('customer.main-page', compact('customer','cities','jobs'));
    }
    public function getSubscriptionType($type){
        $subscriptions=Subscription::where('subscription_for',$type)->get();
        foreach ($subscriptions as $subscription) {
            if ($subscription->most_chosen == 1)
                $subscription->most_chosen = 'most chosen';
            else
                $subscription->most_chosen = '';
            $subscription->price_incl = $subscription->price_incl-$subscription->discount;
        }
        $subscriptions =json_decode($subscriptions);
        return $subscriptions;
    }
    public function orderNow(Request $request)
    {
        if($request->type==='homes') {
            $home = Home::find($request->id);
            $home->subscription_id=$request->subscription_id;
            $home->update();
        }
        else  if($request->type==='companies')
        {
            $company = Company::find($request->id);
            $company->subscription_id=$request->subscription_id;
            $company->update();
        }
        else
        {
            $employee = Employee::find($request->id);
            $employee->subscription_id=$request->subscription_id;
            $employee->update();
        }
        return response()->json(['success'=>'Success']);
    }
    public function store(Request $request)
    {
        $user = User::where('id',$request->user_id)->first();
        $validator = \Validator::make($request->all(), [
            'customer_name' => ['required', 'string', 'max:255'],
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $user->customer_name = $request->customer_name;
        $user->company_name= $request->company_name;
        $user->phone= $request->phone;
        $user->email= $request->email;


            $user->update();

          return response()->json(['success'=>'Success']);
    }
}
