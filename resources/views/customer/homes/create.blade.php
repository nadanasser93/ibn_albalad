@extends('layouts.admin')

@section('content')
    <style>
        .select2 {
            width: 100%!important;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('global.homes.create') }}</div>

                    <div class="card-body">


                        <form method="POST" action="{{ route('homes.store') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="home_id" value="{{$home->id}}">

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


                            <div class="card-body" id="addressdel" style="border: 1px lightgray">

                                <div class="form-group">
                                    <label for="exampleInputName1">City</label>
                                    <select  name="city" class="form-control js-example-disabled sel" >
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Street</label>
                                    <input type="text" name="street"  value="" class="form-control" id="exampleInputName1" placeholder="Street">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">House Number</label>
                                    <input type="text" name="house_number"  value="" class="form-control" id="exampleInputName1" placeholder="House Number">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Post Code</label>
                                    <input type="text" name="post_code"  value="" class="form-control" id="exampleInputName1" placeholder="Post Code">
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

@endsection
@push('footer-scripts')
<script>
    //var add_address= $("#add_address");
    var x =0;
    $(document).ready(function() {
        $("#sel").select2({
            tags: true
        });
        $(".sel").select2({
            tags: true
        });
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
</script>
@endpush

