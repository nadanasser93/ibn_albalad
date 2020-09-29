@extends('layouts.admin')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">  <h1>{{ trans('global.homes.title') }}</h1></div>

                    <div class="card-body" >
                        @include('customer.components.all-table')
                    </div>
                    <div class="card-footer">
                        <div class="row pl-3 pr-3 pl-md-0">
                            <a href="{{ route('profile') }}" class="btn btn-primary ">
                                {{ trans('global.homes.create') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
