@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                    @if($errors->any())
                        <!-- Warning Alert -->
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {!! $error !!}<br/>
                                @endforeach
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{session()->get('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{session()->get('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('subscriptions.update',$subscription) }}" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <div class="form-group row">
                                    <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('admin.subscriptions.name')}}</label>
                                    <div class="col-md-6">
                                        <input id="file" type="text" class="form-control" name="name" value="{{$subscription->name}}"></div>

                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('admin.subscriptions.period')}}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="period_id">
                                            @foreach($periods as $period)
                                                <option value="{{$period->id}}" {{$subscription->period_id==$period->id?'selected':''}}>{{$period->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('admin.subscriptions.type')}}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="order_type">

                                            <option {{$subscription->order_type=='dalilak'?'selected':''}}>dalilak</option>
                                            <option {{$subscription->order_type=='linkdin'?'selected':''}}>linkdin</option>
                                            <option {{$subscription->order_type=='home'?'selected':''}}>home</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('admin.subscriptions.most_chosen')}}</label>
                                    <div class="col-md-6">
                                        <input id="file" type="checkbox" class="form-control" name="most_chosen" value=1 {{$subscription->most_chosen==1?'checked':''}}></div>

                                </div>
                                <div class="form-group row">
                                    <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('admin.subscriptions.price_incl')}}</label>
                                    <div class="col-md-6">
                                        <input id="file" type="number" step="0.1" class="form-control" name="price_incl" value="{{$subscription->price_incl}}"></div>

                                </div>
                                <div class="form-group row">
                                    <label for="price_excl" class="col-md-4 col-form-label text-md-right">{{ __('admin.subscriptions.price_excl')}}</label>
                                    <div class="col-md-6">
                                        <input id="price_excl" type="number" step="0.1" class="form-control" name="price_excl" value="{{$subscription->price_excl}}"></div>

                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('admin.subscriptions.description')}}</label>
                                    <div class="col-md-6">
                                        <textarea id="description" class="form-control" name="description">{{$subscription->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('admin.subscriptions.image')}}</label>
                                <div class="col-md-6">
                                    <input id="file" type="file" class="form-control" name="image" value=""></div>

                            </div>
                            <div class="form-group row mb-0 mt-2">
                                <div class="col-md-12 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                    <!--<a href="" style="color: #fff!important"  class="btn btn-dark" type="submit">Back</a>-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

