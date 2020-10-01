@extends('layouts.admin')

@section('content')

    <div class="container">
        @if (session('messg'))
        <div class="alert done bg-success alert-dismissible w-100" role="alert" style="color:#fff">


                    {{ session('messg') }}


            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('global.companies.create') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('companies.update',$company) }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="x" value="">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1">  <label for="customer">Customer</label></div>
                                    <div class="col-md-5">

                                        <input type="radio" name="com_type" class="form-control" id="customer" value="customer" placeholder="Name" {{$company->type=='Customer'?'checked':''}}></div>
                                    <div class="col-md-1">  <label for="customer">Company</label></div>
                                    <div class="col-md-5">
                                        <input type="radio" name="com_type" class="form-control" id="company" value="company" placeholder="Name" {{$company->type=='Company'?'checked':''}}>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="kvk1" style="{{$company->type=='Company'?'display: none':'display: block'}}">
                                <label for="exampleInputName1">KVK</label>
                                <input type="text" name="kvk" value="{{$company->kvk}}" class="form-control" id="exampleInputName1" placeholder="KVK">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Company Name</label>
                                <input type="text" value="{{$company->company_name}}" name="company_name" required class="form-control" id="exampleInputName1" placeholder="Company Name">
                                @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Phone</label>
                                <input type="text" name="phone"  value="{{$company->phone}}" class="form-control" id="exampleInputName1" placeholder="Phone">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Job</label>
                                <select  name="job[]" class="form-control js-example-disabled sel" multiple="multiple" id="sel" >
                                    @foreach($jobs as $key=>$job)
                                        <option value="{{$job->id}}"{{in_array($job->id, $company->job)?'selected':''}}>{{$job->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($company->image&&$company->image->getFullUrl()!=null)
                            <div class="card-body ">
                                <div class="col-12 image-item" data-order="" id="">
                                    <div class=" overlay">

                                        <img style="max-height: 300px" id="{{$company->image->id}}" class="image"  src="{{str_replace('storage','public/storage',$company->image->getFullUrl()) }}" />

                                        <div class="middle row ml-1" >

                                            <a class="fancybox-thumb btn btn-dark" rel="fancybox-thumb" href="{{ $company->image->getFullUrl() }}"  style="margin-top: 0.5em;"><i class="fa fa-eye"></i></a>
                                            <!--<a class=" btn btn-dark" data-toggle="modal" onclick="croppi('photo','{{$company->image->getFullUrl()}}')" data-target="#editImage" style="margin-top: 0.5em;color: #fff"><i class="fa fa-edit"></i></a>-->
                                            <a class=" btn btn-dark"  onclick="im_delete('{{$company->image->id}}')"   style="margin-top: 0.5em;color: #fff"><i class="fa fa-trash"></i></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="exampleInputName1">Main Image</label>
                                <div class="dropzone" id="main_photo"></div>
                            </div>
                            <div class="row">
                            @foreach($company->photos as $image)
                                <div class="col-4 image-item" data-order="" id="{{$image->id}}">
                                    <div class="overlay mx-3 my-3" style="width: 200px;height: 200px;">

                                        <img id="{{$image->id}}" class="image"  src="{{str_replace('storage','public/storage',$image->getFullUrl()) }}"  style="width: 200px;height: 200px;" />



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
                                <textarea   class="form-control" id="exampleInputName1" name="description">{{$company->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email address</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">@</div>
                                    </div>
                                    <input type="email" name="email" value="{{$company->email}}" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Email">
                                </div>
                            </div>
                @php $key=0@endphp
                @foreach($company->addresses as $address)
                                @php $key=$address->id@endphp
                    @include('customer.companies.components.edit_city_address',['address'=>$address])
                 @endforeach
                            <div class="form-group row mb-0 mt-2 mb-1">
                                <div class="col-md-12 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('button.general.save') }}
                                    </button>
                                <!--<a href="{{route('homes.index')}}" style="color: #fff!important"  class="btn btn-dark" type="submit">Back</a>-->
                                    <button type="button" id="add_address" class="btn btn-primary">
                                        Add New Address
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
        var add_address= $("#add_address");
        var x =0;
        $(add_address).click(function(e){
            e.preventDefault();

            $('.mb-1').before(
                @include('customer.companies.components.city_address')
            );
            $(".sel").select2({
                tags: true
            });
            x++;
            $('#x').val(x);
        });
        $(document).ready(function() {
            $(".sel").select2({
                tags: true
            });
        });

        function remove(e){ //user click on remove text
            e.preventDefault(); $('#address'+x).remove(); x--;
        }
        function delaccount(e,id){ //user click on remove text
            e.preventDefault();
            $.ajax({ url: '{{asset('customer/address/destroy/')}}/'+id, method: 'GET' })
                .then(function (data) {
                    $('#address'+id+'del').remove();
                });

        }
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
            url:"{{asset('customer/companies/upload_image/'.$company->id)}}",
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
                $.ajax({
                    dataType:'json',
                    type:'get',
                    url: '{{ asset('customer/companies/deleteImage') }}/'+file.fid,
                    // data:{_token:'{{ csrf_token() }}',id:file.fid}
                });
                var fmock;
                return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement):void 0;



            },
            init:function(){

                this.on("addedfile", function (file) {

                    if (this.files.length > 1) {
                        console.log(this.files)
                        alert("You can Select upto 1 Pictures for Venue Profile.", "error");
                        this.removeFile(this.files[0]);
                    }

                });
                {{--@php  $file=\Spatie\MediaLibrary\Models\Media::latest()->first() @endphp
                    @if(!empty($company->main_image))
                var mock = {name: '{{ $company->title }}',size: '',type: '' };
                this.emit('addedfile',mock);
                this.options.thumbnail.call(this,mock,'{{ url($company->main_image->getFullUrl()) }}');
                $('.dz-progress').remove();
                @endif--}}

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
            url:"{{asset('customer/companies/upload_others/'.$company->id)}}",
            paramName:'files',
            autoDiscover:false,
            uploadMultiple:false,
            maxFiles:5,
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


                    this.on('sending',function(file,xhr,formData){
                    formData.append('fid','');
                    file.fid = '';
                });

                this.on('success',function(file,response){
                    file.fid = response.id;
                    window.location.reload();
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
                    data: {"image": response, _token: _token,"'company_id":{{$company->id}} },
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

