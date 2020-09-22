@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('new.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('admin.news.title')}}</label>
                                <div class="col-md-6">

                                    <input id="file" type="text" class="form-control" name="title" ></div>

                            </div>
                            <div class="form-group row">
                                <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('admin.news.date')}}</label>
                                <div class="col-md-6">

                                    <input id="file" type="date" class="form-control" name="date" ></div>

                            </div>
                                <div class="form-group row">
                                    <label for="path" class="col-md-4 col-form-label text-md-right">{{ __('admin.news.main_image')}}</label>
                                    <div class="col-md-6">

                                                <input id="file" type="file" class="form-control" name="main_image" accept="image/*" ></div>

                                    </div>
                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('admin.news.description')}}</label>
                                    <div class="col-md-6">
                                        <textarea id="description" class="form-control" name="description"></textarea>
                                        </div>
                                    </div>

                            <div class="form-group row mb-0 mt-2">
                                <div class="col-md-12 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


