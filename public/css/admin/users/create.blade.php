@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="card ved_card" style="display: none">
                                <div class="card-header">Add New Vedio</div>
                                <div class="card-body" id="vedios">
                                    <input type="hidden" name="x" id="x">
                                </div>
                            </div>
                            <div class="card img_card" style="display: none">
                                <div class="card-header">Add New Image</div>
                                <div class="card-body" id="images">
                                    <input type="hidden" name="count_img" id="count_img">
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
@push('footer-scripts')
    <script>
       /* var add_vedio_button  = $("#add_new_vedio");
        var add_image_btn     = $("#add_new_image");
        var x = 1;y=1;
        //initlal text box count
        $(add_vedio_button).click(function(e){
            e.preventDefault();
             //text box increment
            $('#vedios').after(
                '<div id="vedio'+x+'" class="mt-3" style="border-bottom: 1px solid #ddd;">'+
                '<div class="form-group row">'+
                '<label for="path" class="col-md-4 col-form-label text-md-right">{{ __('admin.videos.title')}}</label>'+
                '<div class="col-md-6">'+
                '<input id="file" type="text" class="form-control" name="title[]" required></div>'+
                '</div>'+
                '<div class="form-group row">'+
                '<label for="path" class="col-md-4 col-form-label text-md-right">{{ __('admin.videos.path')}}</label>'+
                '<div class="col-md-6">'+
                '<input id="file" type="text" class="form-control" name="video_link[]" required></div>'+
                '<div class="col-md-2 mb-3"><button id="minus\'+x+\'" onclick="removeVedio(event,'+x+',\'vedio\')"  class="btn btn-danger"><i class="fa fa-trash"></i></button></div>'+
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

       /* $(add_image_btn).click(function(e){
            e.preventDefault();
            //text box increment
            $('#images').after(
                '<div id="image'+y+'">'+
                '<div class="form-group row">'+
                '<label for="path" class="col-md-4 col-form-label text-md-right"></label>'+
                '<div class="col-md-6">'+
                '<div class=row>'+
                '<div class="col-md-10">'+
                '<input id="file" type="file" class="form-control" name="image_path'+y+'" accept="image/*" required></div>'+
                '<div class="col-md-2 mb-3"><button id="minus\'+x+\'" onclick="remove(event,'+y+',\'vedio\')"  class="btn btn-danger"><i class="fa fa-trash"></i></button></div>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '<div class="form-group row">'+
                '<label for="path" class="col-md-4 col-form-label text-md-right"></label>'+
                '<div class="col-md-6">'+
                '<textarea id="description" class="form-control name="description_image[]"></textarea>'+
                '</div>'+
                '</div></div>'
            );
            y++;
            $('#count_img').val(y);
            $('.img_card').css('display','block');
        });
        function removeImage(e,x,id){ //user click on remove text
            e.preventDefault(); $('#'+id+x).remove(); this.y--;
            if(this.y===1) $('.img_card').css('display','none');
        }*/
    </script>
@endpush

