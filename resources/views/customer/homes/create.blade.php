@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('admin.homes.create') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('homes.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="nameAr" class="col-md-4 col-form-label text-md-right">{{ __('admin.homes.name.ar') }}</label>

                                <div class="col-md-6">
                                    <input id="nameAr" type="text" class="form-control" name="name[ar]" value="{{ old('name.ar') }}" required autocomplete="name" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nameEn" class="col-md-4 col-form-label text-md-right">{{ __('admin.homes.name.nl') }}</label>

                                <div class="col-md-6">
                                    <input id="nameEn" type="text" class="form-control" name="name[nl]" value="{{ old('name.nl') }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descriptionAr" class="col-md-4 col-form-label text-md-right">{{ __('admin.homes.description.ar') }}</label>

                                <div class="col-md-6">
                                    <textarea id="descriptionAr" class="form-control" name="description[ar]"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descriptionNl" class="col-md-4 col-form-label text-md-right">{{ __('admin.homes.description.nl') }}</label>

                                <div class="col-md-6">
                                    <textarea id="descriptionNl" class="form-control" name="description[nl]"></textarea>
                                </div>
                            </div>


                           <!-- <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('admin.homes.main_image') }}</label>

                                <div class="col-md-6">
                                   <input type="file" class="form-control" accept="images/*" name="image_file" id="image_file">
                                </div>
                            </div>
                           <div class="form-group row">
                            <label for="image_prview" class="col-md-4 col-form-label text-md-right">{{ __('admin.homes.main_image') }}</label>

                            <div class="col-md-6">
                                <div class="img-container">
                                    <div class="content" id="image_preview_container">
                                        <img src="{{ asset('/images/image_preview.jpg') }}" id="image_preview">
                                    </div>
                                </div>
                            </div>
                           </div>-->

                            <div class="form-group row mb-0 mt-2">
                                <div class="col-md-12 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('button.general.save') }}
                                    </button>
                                    <!--<a href="{{route('homes.index')}}" style="color: #fff!important"  class="btn btn-dark" type="submit">Back</a>-->
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

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);

            reader.onload = function (e) {
                //.
                $('#image_preview_container img')[0].src = e.target.result;
                $('#image_preview_container img')[0].srcset = e.target.result;
            }
        }
    }
    $("#image_file").on("change", function (e) {

        var count=1;
        const maxAllowedSize = 2 ; // 2 MB
        var file = e.currentTarget.files[0]; // puts all files into an array
        var filesize = ((file.size/1024)/1024).toFixed(4); // MB
        if(filesize > maxAllowedSize){
            $('.alert-container').show()
            $('.alert').addClass('bg-danger').append("max file size is 2 MB please upload a file less than 2 MB");
        }else{
            readURL(this);
            $('.alert-container').hide()

        }

    });
</script>
@endpush

