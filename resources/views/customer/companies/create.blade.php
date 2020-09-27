@extends('layouts.admin')

@section('content')
    <style>
        .select2 {
            width: 100%!important;
        }
    </style>

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


                        <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="customer_id" value="{{$customer->id}}">
                            <input type="hidden" name="company_id" value="{{$company->id}}">
                            <input type="hidden" name="x" value="">
                            <div class="form-group">
                                <label for="exampleInputName1">Company Name</label>
                                <input type="text" value="{{$customer->company_name}}" required name="company_name" class="form-control" id="exampleInputName1" placeholder="Company Name">
                                @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           <!-- <div class="form-group" id="kvk">
                                <label for="exampleInputName1">KVK</label>
                                <input type="text" name="kvk" value="" class="form-control" id="exampleInputName1" placeholder="KVK">
                            </div>-->

                            <div class="form-group">
                                <label for="exampleInputName1">Phone</label>
                                <input type="text" name="phone"  value="" class="form-control" id="exampleInputName1" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Job</label>
                                <select  name="job[]" class="form-control js-example-basic-multiple js-states sel" multiple="multiple" id="sel" >
                                    @foreach($jobs as $job)
                                        <option value="{{$job->id}}">{{$job->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Main Image</label>
                                <div class="dropzone" id="main_photo"></div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Other Image</label>
                                <div class="dropzone" id="dropzonefileupload"></div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Description</label>
                                <textarea   class="form-control" id="exampleInputName1" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email address</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">@</div>
                                    </div>
                                    <input type="email" name="email" value="" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Email">
                                </div>
                            </div>

                            <div class="card-body" id="addressdel" style="border: 1px lightgray">
                                <input type="hidden" name="address_id" value="">
                                <div class="form-group">
                                    <label for="exampleInputName1">City</label>
                                    <select  name="city[]" class="form-control js-example-disabled sel" >
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                               <!-- <div class="form-group">
                                    <label for="exampleInputName1">Job</label>
                                    <select  name="job[]" class="form-control js-example-disabled sel" id="sel1" >
                                        @foreach($jobs as $job)
                                            <option value="{{$job->id}}">{{$job->name}}</option>
                                        @endforeach
                                    </select>
                                </div>-->
                                <div class="form-group">
                                    <label for="exampleInputName1">Street</label>
                                    <input type="text" name="street[]"  value="" class="form-control" id="exampleInputName1" placeholder="Street">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">House Number</label>
                                    <input type="text" name="house_number[]"  value="" class="form-control" id="exampleInputName1" placeholder="House Number">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Post Code</label>
                                    <input type="text" name="post_code[]"  value="" class="form-control" id="exampleInputName1" placeholder="Post Code">
                                </div>
                            </div>
                            <div class="form-group row mb-0 mt-2 mb-1">
                                <div class="col-md-12 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('button.general.save') }}
                                    </button>
                                    <!--<a href="{{route('homes.index')}}" style="color: #fff!important"  class="btn btn-dark" type="submit">Back</a>-->
                                    <button type="button" id="add_address" class="btn btn-primary">
                                        Add New Address
                                    </button>
                                   <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                        Add Any Images
                                    </button>-->

                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--@include('customer.companies.components.images',['company'=>null])--}}
@endsection
@push('footer-scripts')
<script>
    //var add_address= $("#add_address");
    var x =0;
    $("#add_address").click(function(e){
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
        $("#sel").select2({
            tags: true
        });
        $(".sel").select2({
            tags: true
        });
    });
    function remove(e){ //user click on remove text
        e.preventDefault(); $('#address'+x).remove(); x--;
    }
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
</script>
@endpush

