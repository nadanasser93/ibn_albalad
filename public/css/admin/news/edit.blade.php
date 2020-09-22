@extends('layouts.admin')
<link rel="stylesheet" href="{{asset('css/croppie.css')}}" />

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{route('new.update',$new)}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('admin.news.title')}}</label>
                                <div class="col-md-6">

                                    <input id="file" type="text" class="form-control" name="title" value="{{$new->title}}"></div>

                            </div>
                            <div class="form-group row">
                                <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('admin.news.date')}}</label>
                                <div class="col-md-6">

                                    <input id="file" type="date" class="form-control" name="date" value="{{$new->date}}"></div>

                            </div>
                            <div id="image">
                                <div class="form-group row">
                                    <label for="path" class="col-md-4 col-form-label text-md-right">{{ __('admin.news.main_image')}}</label>
                                    <div class="col-md-6">
                                        <img id="photo" class="image my-image" onclick="uploadPhoto('id_photo')"  src="{{  str_replace('storage', 'public/storage',asset('storage/images/news/'.$new->main_image) ) }}"   style="width: 200px;height: 120px;{{isset($new->main_image)?'':'display:none;'}}" />
                                    <input type="file" class="form-control" name="main_image" id="id_photo" placeholder="ID Photo" accept="image/*" value="" style="{{isset($new->main_image)?'display:none;':''}};margin-top: -1.3em;">
                                </div>
                                </div>



                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('admin.news.decription')}}</label>
                                    <div class="col-md-6">
                                        <textarea id="description" class="form-control" name="description">{{$new->content}}</textarea>
                                    </div>
                                </div></div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ trans('button.general.update') }}
                                    </button>
<a class=" btn btn-dark" data-toggle="modal" onclick="croppi('photo{{$new->id}}','{{$new->main_image}}')" data-target="#new_element" style="color: #fff">Edit Image</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="new_element" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" action="" method="post" >
                    @csrf

                    <div id="photo" class="crop_div"></div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary crop_image" type="button" id="crop_image">Edit Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('footer-scripts')
    <script>
        function uploadPhoto(file_input_id){
            document.getElementById(file_input_id).click();
        }
        function readURL(input,id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+id).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
       $("#id_photo").change(function(){
           readURL(this,'photo');
       });
        $image_crop=null
        function croppi(id,name) {

            var vEl = document.getElementById(id);
            this.$image_crop = $('.crop_div').croppie({
                enableExif:true,
                viewport:{
                    width:300,
                    height:300,
                },
                boundary:{
                    width:320,
                    height:400
                },
                url: '{{  str_replace('storage','public/storage',asset('storage/images/news'))  }}/'+name,
                showZoomer: true,
                //  enableResize: true,
                enableOrientation: true,
                mouseWheelZoom: 'ctrl'
            });
            // console.log(str_replace('storage','public/storage',asset('storage/images/news'))}}/'+name);
        }
      /*  $('#id_photo').change(function(){
            var reader = new FileReader();

            reader.onload = function(event){
                $image_crop.croppie('bind', {
                    url:event.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
        });*/

        $('.crop_image').click(function(event){
            event.preventDefault()
            $image_crop.croppie('result', {
                type:'canvas',
                size:'viewport'
            }).then(function(response){
                console.log(response);
                var _token = $('input[name=_token]').val();
                $.ajax({
                    url:'{{ route('new.updateImage', $new->id) }}',
                    type:'post',
                    data:{"image":response, _token:_token},
                    dataType:"json",
                    success:function(data)
                    {
                        $('#photo').attr("src",data.path.replace('storage', 'public/storage'))
                        $('#photo').croppie('destroy');
                        $("#new_element").modal('hide');
                        $image_crop.croppie('destroy');
                    },
                    error:function (data) {
                        console.log("error",data);
                        $image_crop.croppie('destroy');
                    }
                });
            });
        });
    </script>
@endpush

