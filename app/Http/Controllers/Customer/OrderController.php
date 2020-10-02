<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function storeOrder(Request $request){
        $user=Auth::user();
        $request['user_id']=$user->id;
        $order=Order::create($request->all());
        return $order;

    }
    public function storeServiceOrder(Request $request){
        if($request->type=="companies")
            $request['service_type']="App\Models\Company";
        else if($request->type=="homes")
            $request['service_type']="App\Models\Home";
        else
            $request['service_type']="App\Models\Employee";
        $request['service_id'] = $request->id;
        $service = OrderService::create($request->all());
        return $service;
    }
    public function getCustomerOrders($order_id){
        $order=Order::with(['user','services','services.service','services.service.subscription'])->where('id',$order_id)->first();
        return $order;
    }
}
