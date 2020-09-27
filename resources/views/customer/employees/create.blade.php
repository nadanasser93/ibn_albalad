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
                    <div class="card-header">{{ __('global.employees.create') }}</div>

                    <div class="card-body">


                        <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <input type="hidden" name="employee_id" value="{{$employee->id}}">
                            <div class="form-group">
                                <label for="exampleInputName1">Title</label>
                                <input type="text" name="title"  value="" class="form-control" id="exampleInputName1" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Phone</label>
                                <input type="text" name="phone"  value="" class="form-control" id="exampleInputName1" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Email</label>
                                <input type="text" name="email"  value="" class="form-control" id="exampleInputName1" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Contacter Name</label>
                                <input type="text" name="contactor_name"  value="" class="form-control" id="exampleInputName1" placeholder="Contacter Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Main Image</label>
                                <div class="dropzone" id="main_photo"></div>
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
        url:"{{asset('customer/employees/upload_image/'.$employee->id)}}",
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

