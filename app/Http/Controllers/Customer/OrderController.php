<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
   public function storeOrder(Request $request)
   {
       $order = Order::where('user_id', Auth::user()->id)->first();
       if ($order == null) {
       $request['user_id'] = Auth::user()->id;
       $order = Order::create($request->all());
       }
       return $order;
   }

   public function storeServiceOrder(Request $request){
       if($request->type=="companies")
       $request['service_type']="App\Models\Company";
       else if($request->type=="homes")
           $request['service_type']="App\Models\Home";
       else
           $request['service_type']="App\Models\Employee";
       $order=Order::where('user_id', Auth::user()->id)->first();
       if($order==null) {
           $request['user_id'] = Auth::user()->id;
           $order = Order::create($request->all());
       }
       $request['order_id'] = $order->id;
       $request['service_id'] = $request->id;
       $service = OrderService::create($request->all());
       return $service;
   }
}
