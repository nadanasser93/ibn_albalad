@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('periods.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <div class="form-group row">
                                    <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('admin.period.name')}}</label>
                                    <div class="col-md-6">
                                        <input  type="text" class="form-control" name="name" value=""></div>

                                </div>

                                <div class="form-group row">
                                    <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('admin.period.number')}}</label>
                                    <div class="col-md-6">
                                        <input  type="number" class="form-control" name="number" value="" required></div>

                                </div>
                            </div>

                            <div class="form-group row mb-0 mt-2">
                                <div class="col-md-12 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                   <!-- <a href="" style="color: #fff!important"  class="btn btn-dark" type="submit">Back</a>-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


