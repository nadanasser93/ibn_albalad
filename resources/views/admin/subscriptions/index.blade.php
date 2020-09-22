@extends('layouts.admin')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">  <h1>Subscriptions</h1></div>

                    <div class="card-body" >
                        @include('admin.subscriptions.components.table-subscriptions')
                    </div>
                    <div class="card-footer">
                        <div class="row pl-3 pr-3 pl-md-0">
                            <a href="{{ route('subscriptions.create') }}" class="btn btn-primary ">
                                {{ trans('admin.subscriptions.create') }}
                            </a>
                           <!-- <a href="#" style="color: #fff!important"  class="btn btn-dark" type="submit">Back</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
