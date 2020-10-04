<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Models\Subscription;
use App\Services\Subscription\ISubscriptionService;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    private $subscription_service;

    public function __construct(ISubscriptionService $subscription_service)
    {
        $this->subscription_service = $subscription_service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $subscriptions = $this->subscription_service->all();

        return view('admin.subscriptions.index',compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periods=Period::all();
        return view('admin.subscriptions.create',compact('periods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $subscription = $this->subscription_service->create($request->all());
        if($request->hasFile('image')){
            $name =  $request->image->getClientOriginalName();
            $extension = $request->image->getClientOriginalExtension();
            $mdf5 = md5($name.'_'.time()).'.'.$extension;
            $subscription->addMediaFromRequest('image')->usingFileName($mdf5)->withResponsiveImages()->toMediaCollection('image');
        }

        return redirect()->route('subscriptions.index');
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
        $subscription = $this->subscription_service->find($id);
        return view('admin.subscriptions.show',compact('subscription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $periods=Period::all();
        $subscription = $this->subscription_service->find($id);
        return view('admin.subscriptions.edit',compact('subscription','periods'));
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
        //
        $subscription = $this->subscription_service->update($id,$request->all());
        if($request->hasFile('image')){
            $name =  $request->image->getClientOriginalName();
            $extension = $request->image->getClientOriginalExtension();
            $mdf5 = md5($name.'_'.time()).'.'.$extension;
            $subscription->addMediaFromRequest('image')->usingFileName($mdf5)->withResponsiveImages()->toMediaCollection('image');
        }
        return redirect()->route('subscriptions.index');
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
        $this->subscription_service->delete($id);
        return \redirect()->back();
    }
}
