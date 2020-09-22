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
                        <form method="POST" action="{{ route('vedio.update', $vedio->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div id="vedio" class="mt-3">
                                <div class="form-group row">
                                    <label for="path" class="col-md-4 col-form-label text-md-right">{{ __('admin.videos.path')}}</label>
                                    <div class="col-md-6">
                                        <video id="Player" data-id="{{$vedio->id}}" preload="auto" style="object-fit:cover;width:100%" allow="fullscreen"  class=""  preload="metadata"
                                               controls>
                                            <source src="{{str_replace('storage','public/storage',asset('storage/vedios/'.$vedio->name))}}"  type="video/mp4">
                                            Your browser does not support HTML5 video.
                                        </video>
                                        <input id="file" type="file" class="form-control" name="vedio_path"></div>
                                </div>
                                   <!--<div class="form-group row">
                                    <label for="path" class="col-md-4 col-form-label text-md-right">{{ __('admin.news.main_image')}}</label>
                                    <div class="col-md-6">
                                        <img id="photo" class="image my-image" onclick="uploadPhoto('id_photo')"  src="{{str_replace('storage','public/storage',asset('storage/images/posters/'.$vedio->poster) ) }}"   style="width: 200px;height: 120px;{{isset($vedio->poster)?'':'display:none;'}}" />
                                        <input type="file" class="form-control" name="poster" id="id_photo" placeholder="ID Photo" accept="image/*" value="" style="{{isset($vedio->poster)?'display:none;':''}};margin-top: -1.3em;">
                                    </div>-->
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('admin.videos.description')}}</label>
                                    <div class="col-md-6">
                                        <textarea id="description" class="form-control" name="description">{{$vedio->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ trans('button.general.update') }}
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
