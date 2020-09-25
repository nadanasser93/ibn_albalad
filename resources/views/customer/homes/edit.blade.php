@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('global.companies.create') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('homes.update',$home) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body ">
                                <div class="col-12 image-item" data-order="" id="{{$home->main_image->id}}">
                                    <div class=" overlay">

                                        <img style="max-height: 300px" id="{{$home->main_image->id}}" class="image"  src="{{$home->main_image->getFullUrl() }}" />

                                        <div class="middle row ml-1" >

                                            <a class="fancybox-thumb btn btn-dark" rel="fancybox-thumb" href="{{ $home->main_image->getFullUrl() }}"  style="margin-top: 0.5em;"><i class="fa fa-eye"></i></a>
                                            <!--<a class=" btn btn-dark" data-toggle="modal" onclick="croppi('photo','{{$home->main_image->getFullUrl()}}')" data-target="#editImage" style="margin-top: 0.5em;color: #fff"><i class="fa fa-edit"></i></a>-->
                                            <a class=" btn btn-dark"  onclick="im_delete('{{$home->main_image->id}}')"   style="margin-top: 0.5em;color: #fff"><i class="fa fa-trash"></i></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Main Image</label>
                                <div class="dropzone" id="main_photo"></div>
                            </div>
                            <div class="row">
                            @foreach($home->photos as $image)
                                <div class="col-4 image-item" data-order="" id="{{$image->id}}">
                                    <div class="overlay mx-3 my-3" style="width: 200px;height: 200px;">

                                        <img id="{{$image->id}}" class="image"  src="{{$image->getFullUrl() }}"  style="width: 200px;height: 200px;" />



                                        <div class="middle row ml-1">

                                            <a class="fancybox-thumb btn btn-dark" rel="fancybox-thumb" href="{{ $image->getFullUrl() }}"  style="margin-top: 0.5em;"><i class="fa fa-eye"></i></a>
                                           <!-- <a class=" btn btn-dark" data-toggle="modal" onclick="croppi('photo','{{ $image->getFullUrl() }}')" data-target="#editImage" style="margin-top: 0.5em;color: #fff"><i class="fa fa-edit"></i></a>-->
                                            <a class=" btn btn-dark"  onclick="im_delete('{{$image->id}}')"   style="margin-top: 0.5em;color: #fff"><i class="fa fa-trash"></i></a>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Other Image</label>
                                <div class="dropzone" id="dropzonefileupload"></div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Description</label>
                                <textarea   class="form-control" id="exampleInputName1" name="description">{{$home->description}}</textarea>
                            </div>

                            <div class="card-body" id="addressdel" style="border: 1px lightgray">

                                <div class="form-group">
                                    <label for="exampleInputName1">City</label>
                                    <select  name="city" class="form-control js-example-disabled sel" >
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}" {{$home->city_id==$city->id?'selected':''}}>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Street</label>
                                    <input type="text" name="street"  value="{{$home->street}}" class="form-control" id="exampleInputName1" placeholder="Street">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">House Number</label>
                                    <input type="text" name="house_number"  value="{{$home->house_number}}" class="form-control" id="exampleInputName1" placeholder="House Number">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Post Code</label>
                                    <input type="text" name="post_code"  value="{{$home->post_code}}" class="form-control" id="exampleInputName1" placeholder="Post Code">
                                </div>
                            </div>
                            <div class="form-group row mb-0 mt-2 mb-1">
                                <div class="col-md-12 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('button.general.save') }}
                                    </button>


                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editImage" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                    <div id="photo"></div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="window.location.reload();"  data-dismiss="modal">Close</button>
                        <button class="btn btn-primary crop_image" type="button" onclick="crop(event,2,false)">Edit Image</button>
                        <a class="btn btn-primary rotate"  type="button" data-deg="90">Rotate</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('footer-scripts')
    <script>
        $(document).ready(function() {
            $(".sel").select2({
                tags: true
            });
        });

        $(".fancybox-thumb").fancybox({
            prevEffect	: 'none',
            nextEffect	: 'none',
            helpers	: {
                title	: {
                    type: 'outside'
                },
                thumbs	: {
                    width	: 50,
                    height	: 50
                }
            }
        });
        Dropzone.autoDiscover = false;
        $('#main_photo').dropzone({
            url:"{{asset('customer/homes/upload_image/'.$home->id)}}",
            paramName:'file',
            autoDiscover:false,
            uploadMultiple:false,
            maxFiles:1,
            maxFilessize:3, // MB
            acceptedFiles:'image/*',
            dictDefaultMessage:'Select Main Photo',
            dictRemoveFile:'Delete',
            params:{
                _token:'{{ csrf_token() }}'
            },
            addRemoveLinks:true,
            removedfile:function(file)
            {
                //file.fid
                $.ajax({
                    dataType:'json',
                    type:'post',
                    url:'',
                    data:{_token:'{{ csrf_token() }}'}
                });
                var fmock;
                return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement):void 0;


            },
            init:function(){

                    @if(!empty($product->photo))
                var mock = {name: '{{ $product->title }}',size: '',type: '' };
                this.emit('addedfile',mock);
                this.options.thumbnail.call(this,mock,'{{ url('storage/'.$product->photo) }}');
                $('.dz-progress').remove();
                @endif

                    this.on('sending',function(file,xhr,formData){
                    formData.append('fid','');
                    file.fid = '';
                });

                this.on('success',function(file,response){
                    file.fid = response.id;
                });


            }
        });
        $('#dropzonefileupload').dropzone({
            url:"{{asset('customer/homes/upload_others/'.$home->id)}}",
            paramName:'files',
            autoDiscover:false,
            uploadMultiple:false,
            maxFiles:15,
            maxFilessize:3, // MB
            acceptedFiles:'image/*',
            dictDefaultMessage:'Click Here To Upload Files',
            dictRemoveFile:'{{ trans('admin.delete') }}',
            addRemoveLinks: true,
            params:{
                _token:'{{ csrf_token() }}'
            },
            removedfile:function(file)
            {
                //file.fid
                $.ajax({
                    dataType:'json',
                    type:'post',
                    url:'',
                    data:{_token:'{{ csrf_token() }}'}
                });
                var fmock;
                return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement):void 0;


            },
            init:function(){

                    @if(!empty($product->photo))
                var mock = {name: '{{ $product->title }}',size: '',type: '' };
                this.emit('addedfile',mock);
                this.options.thumbnail.call(this,mock,'{{ url('storage/'.$product->photo) }}');
                $('.dz-progress').remove();
                @endif

                    this.on('sending',function(file,xhr,formData){
                    formData.append('fid','');
                    file.fid = '';
                });

                this.on('success',function(file,response){
                    file.fid = response.id;
                });


            }
        });
        function im_delete(id){
            $.ajax({
                url: '{{ asset('customer/companies/deleteImage') }}/'+id,
                type: 'get',
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    $('#'+id).remove();
                },
                error: function (data) {
                    $('#'+id).remove();
                    console.log("error", data);
                }
            });
        }
        $image_crop=null
        function croppi(id,image) {
            var vEl = document.getElementById(id);
            this.$image_crop = $('#'+id).croppie({
                enableExif:true,
                viewport:{
                    width:320,
                    height:400,
                },
                boundary:{
                    width:320,
                    height:400
                },
                url: image,
                showZoomer: true,
                //  enableResize: true,
                enableOrientation: true,
            });

        }
        $('.rotate').on('click', function() {
            console.log($image_crop)
            $image_crop.croppie('rotate', parseInt($(this).data('deg')));
        });
        function crop(e,id,new_crop) {
            e.preventDefault()
            this.$image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (response) {
                console.log(response)
                var _token = $('input[name=_token]').val();
                $.ajax({
                    url: '{{ asset('customer/updateImage') }}/'+id,
                    type: 'post',
                    data: {"image": response, _token: _token,"'company_id":{{$home->id}} },
                    dataType: "json",
                    success: function (data) {
                        console.log(data)
                        window.location.reload();
                    },
                    error: function (data) {
                        console.log("error", data);
                        swal(data);

                    }
                });

            });
        };
    </script>
@endpush

