@extends('layouts.admin')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">  <h1>{{ trans('global.companies.title') }}</h1></div>

                    <div class="card-body" >
                        @include('customer.companies.components.table-companies')
                    </div>
                    <div class="card-footer">
                        <div class="row pl-3 pr-3 pl-md-0">
                            <a href="{{ route('companies.create') }}" class="btn btn-primary ">
                                {{ trans('global.companies.create') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
