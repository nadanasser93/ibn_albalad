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
                        <form method="POST" action="{{ route('image_link.update', $link->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div id="vedio">
                                <div class="form-group row">
                                    <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('admin.videos.path')}}</label>
                                    <div class="col-md-6">
                                        <input id="file" type="text" class="form-control" name="title" value="{{$link->title}}"></div>

                                </div>

                                    <div class="form-group row">
                                        <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('admin.videos.path')}}</label>
                                        <div class="col-md-6">
                                            <input id="file" type="text" class="form-control" name="image_link"></div>
                                           @if(!empty($link->image_link))
                                          <a href="{{$link->image_link}}"><i class="fa fa-download"></i> </a>
                                        @endif
                                    </div>

                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('admin.videos.description')}}</label>
                                    <div class="col-md-6">
                                        <textarea id="description" class="form-control" name="description">{{$link->description}}</textarea>
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

