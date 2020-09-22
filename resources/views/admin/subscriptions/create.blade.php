@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('subscriptions.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <div class="form-group row">
                                    <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('admin.subscriptions.name')}}</label>
                                    <div class="col-md-6">
                                        <input id="file" type="text" class="form-control" name="name" value=""></div>

                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('admin.subscriptions.description')}}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="period_id">
                                            @foreach($periods as $period)
                                                <option value="{{$period->id}}">{{$period->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('admin.subscriptions.description')}}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="order_type">

                                            <option>dalilak</option>
                                            <option>linkdin</option>
                                            <option>home</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('admin.subscriptions.most_chosen')}}</label>
                                    <div class="col-md-6">
                                        <input id="file" type="checkbox" class="form-control" name="most_chosen" value=1></div>

                                </div>
                                <div class="form-group row">
                                    <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('admin.subscriptions.price_incl')}}</label>
                                    <div class="col-md-6">
                                        <input id="file" type="number" step="0.1" class="form-control" name="price_incl" value=""></div>

                                </div>
                                <div class="form-group row">
                                    <label for="price_excl" class="col-md-4 col-form-label text-md-right">{{ __('admin.subscriptions.price_excl')}}</label>
                                    <div class="col-md-6">
                                        <input id="price_excl" type="number" step="0.1" class="form-control" name="price_excl" value=""></div>

                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('admin.subscriptions.description')}}</label>
                                    <div class="col-md-6">
                                        <textarea id="description" class="form-control" name="description"></textarea>
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
                                    <!--<a href="#" style="color: #fff!important"  class="btn btn-dark" type="submit">Back</a>-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


