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
                        <form method="POST" action="{{ route('user.update', $user->id) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid
                                    @enderror" value="{{$user->name}}" name="name"  required
                                           autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"  value="{{$user->email}}" class="form-control @error('email') is-invalid
                                    @enderror" name="email"  required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  >

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                                </div>
                            </div>
                            {{--<div class="card ved_card" style="display: block">
                                <div class="card-header">Vedio</div>
                                <div class="card-body" id="vedios">
                                    <input type="hidden" name="x" id="x">
                                    @foreach($user->links as $x=>$link)
                                    <div id="vedio{{$x+1}}">
                                        <input type="hidden" name="id" id="{{$link->id}}">
                                        <div class="form-group row">
                                           <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('admin.videos.path')}}</label>
                                            <div class="col-md-6">
                                                  <input id="file" type="text" class="form-control" name="title[]" value="{{$link->title}}"></div>
                                                    <div class="col-md-2 mb-3"><button id="minus{{$x+1}}" onclick="removeVedio(event,'{{$x+1}}','vedio')"  class="btn btn-danger"><i class="fa fa-trash"></i></button></div>
                                            </div>

                                        <video id="Player" data-id="{{$link->id}}" preload="auto" style="object-fit:cover;width:100%" allow="fullscreen"  class=""  preload="metadata"
                                               poster="{{ ($link->video_link) == null ? '' : asset($link->video_link)}}">
                                            <source src="{{asset( $link->video_link)}}"  type="video/mp4">
                                            Your browser does not support HTML5 video.
                                        </video>
                                        <div class="form-group row">
                                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('admin.videos.description')}}</label>
                                            <div class="col-md-6">
                                                <textarea id="description" class="form-control" name="description[]">{{$link->description}}</textarea>
                                                </div>
                                            </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>--}}

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
@push('footer-scripts')
    <script>
        var add_vedio_button  = $("#add_new_vedio");
        var add_image_btn     = $("#add_new_image");
        var x = 1;y=1;
        //initlal text box count
        $(add_vedio_button).click(function(e){
            e.preventDefault();
            //text box increment
            $('#vedios').after(
                '<div id="vedio'+x+'">'+
                '<div class="form-group row">'+
                '<label for="path" class="col-md-4 col-form-label text-md-right">{{ __('admin.videos.path')}}</label>'+
                '<div class="col-md-6">'+
                '<div class=row>'+
                '<div class="col-md-10">'+
                '<input id="file" type="file" class="form-control" name="vedio_path'+x+'" accept="video/mp4,video/x-m4v,video/*" required></div>'+
                '<div class="col-md-2 mb-3"><button id="minus\'+x+\'" onclick="removeVedio(event,'+x+',\'vedio\')"  class="btn btn-danger"><i class="fa fa-trash"></i></button></div>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '<div class="form-group row">'+
                '<label for="path" class="col-md-4 col-form-label text-md-right">{{ __('admin.videos.description')}}</label>'+
                '<div class="col-md-6">'+
                '<textarea id="description" class="form-control name="description[]"></textarea>'+
                '</div>'+
                '</div></div>'
            );
            x++;
            $('#x').val(x);
            $('.ved_card').css('display','block');
        });

        function removeVedio(e,x,id){ //user click on remove text
            e.preventDefault(); $('#'+id+x).remove(); this.x--;
            if(this.x===1) $('.ved_card').css('display','none');
        }

    </script>
@endpush
