<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;

use App\Models\Employee;
use App\Models\Home;
use App\Models\Job;
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
    public function newService(){
      /*  $coms=Company::where('company_name','created')->get();
        foreach ($coms as $com)
            $com->forceDelete();
        $emp=Employee::where('title','')->get();
        foreach ($emp as $e)
            $e->forceDelete();
        $homes=Home::where('post_code','')->get();
        foreach ($homes as $h)
            $h->forceDelete();*/
        $company = $this->company_service->create([
            'company_name'=>'created',
        ]);
        $employee = $this->employee_service->create([

        ]);
        $home = $this->home_service->create([

        ]);
    }
    public function profile(){
        $customer=Auth::user();
      /* $coms=Company::where('company_name','created')->get();
       foreach ($coms as $com)
           $com->forceDelete();
        $emp=Employee::where('title','')->get();
        foreach ($emp as $e)
            $e->forceDelete();
        $homes=Home::where('post_code','')->get();
        foreach ($homes as $h)
            $h->forceDelete();*/
        $cities=City::all();
        $jobs=Job::all();
      /*  $company = $this->company_service->create([
            'company_name'=>'created',
        ]);
        $employee = $this->employee_service->create([

        ]);
        $home = $this->home_service->create([

        ]);*/
        return view('customer.main-page', compact('customer','cities','jobs'));
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

          return response()->json(['success'=>'Success']);
    }
}
