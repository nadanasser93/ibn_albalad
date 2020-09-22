@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('vedio.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$user}}" name="user">
                            <div id="vedio" class="mt-3" style="border-bottom: 1px solid #ddd;">+
                                <div class="form-group row">
                                    <label for="path" class="col-md-4 col-form-label text-md-right">{{ __('admin.videos.path')}}</label>
                                    <div class="col-md-6">
                                        <input id="file" type="file" class="form-control" name="vedio_path" required></div>
                                    </div>
                            <!--<div class="form-group row">
                                    <label for="path" class="col-md-4 col-form-label text-md-right">{{ __('admin.videos.poster')}}</label>
                                    <div class="col-md-6">
                                        <input id="file" type="file" class="form-control" name="poster" required></div>
                                </div>-->
                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('admin.videos.description')}}</label>
                                    <div class="col-md-6">
                                        <textarea id="description" class="form-control" name="description"></textarea>
                                        </div>
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


