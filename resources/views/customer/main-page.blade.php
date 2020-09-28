@extends('layouts.customer')

@section('content')
    <div class="container">
        <h1>Customer Profile</h1>
        <div class="row">
            <div class="col-md-12 mt-5">
                <h2>Customer Data</h2>
                <div id="stepper1" class="bs-stepper">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#test-l-1">
                            <button type="button" class="btn step-trigger">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">Complete Profile</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#test-l-2">
                            <button type="button" class="btn step-trigger">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">Select Service</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#test-l-3">
                            <button type="button" class="btn step-trigger">
                                <span class="bs-stepper-circle">3</span>
                                <span class="bs-stepper-label">Service Data</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#test-l-4">
                            <button type="button" class="btn step-trigger">
                                <span class="bs-stepper-circle">4</span>
                                <span class="bs-stepper-label">Paymenyt Data</span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <div id="test-l-1" class="content">
                           @include('customer.profile')
                            <!--<button class="btn btn-primary" onclick="stepper1.next()">Next</button>-->
                        </div>
                        <div id="test-l-2" class="content">
                            <div class="form-group">
<div class="row mx-auto" style="margin-left: 7em!important;color: #fff">
                              <div class="col-md-4">
                                  <button class="btn btn-primary" style="margin-top: 3em" value="Your Company" onclick="createCompany();selectService(1);stepper1.next()">Your Company</button>
                                 </div>
                                  <div class="col-md-4">
                                      <button class="btn btn-primary" style="margin-top: 3em" value="Your Employee" onclick="createEmployee();selectService(2);stepper1.next()">Your Employee</button>
                              </div>
                                  <div class="col-md-4">
                                      <button class="btn btn-primary" style="margin-top: 3em" value="Your Home" onclick="createHome();selectService(3);stepper1.next()">Your Home</button>

                            </div>
</div>
                            </div>
                            <!--<button class="btn btn-primary" onclick="stepper1.next()">Next</button>-->
                        </div>

                        <div id="test-l-3" class="content">
                            <div  id="company11">
                                @include('customer.companies.create')
                            </div>
                            <div  id="employee">
                                @include('customer.employees.create')
                            </div>
                            <div id="home">
                                @include('customer.homes.create')
                            </div>
                            <!--<button class="btn btn-primary" onclick="stepper1.next()">Next</button>-->

                        </div>
                        <div id="test-l-4" class="content">
                        @include('customer.payment')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@push('footer-scripts')
<script>
    var stepper1Node = document.querySelector('#stepper1')
    var stepper1 = new Stepper(document.querySelector('#stepper1'))

    stepper1Node.addEventListener('show.bs-stepper', function (event) {
        console.warn('show.bs-stepper', event)
    })
    stepper1Node.addEventListener('shown.bs-stepper', function (event) {
        console.warn('shown.bs-stepper', event)
    })

    var stepper2 = new Stepper(document.querySelector('#stepper2'), {
        linear: false,
        animation: true
    })
    var stepper3 = new Stepper(document.querySelector('#stepper3'), {
        animation: true
    })
    var stepper4 = new Stepper(document.querySelector('#stepper4'))
    function selectService(x){
        $('form')[1].reset()
        $('form')[2].reset()
        $('form')[3].reset()
        if(this.x>0)
        {
            for(i=0;i<this.x;i++)
                 $('#address'+i).remove();
        }
        if(x===1)
        {
            console.log(x)
            $('#employee').hide()
            $('#home').hide()
            $('#company11').show()

        }
        else if(x===2) {
            console.log(x)
            $('#company11').hide()
            $('#home').hide()
            $('#employee').show()

        }
        else if(x===3) {
            console.log(x)
            $('#company11').hide()
            $('#employee').hide()
            $('#home').show()


        }

    }
    var company_id,employee_id,home_id;
    function createCompany() {
        $.ajax({
            url: '{{asset("customer/companies/create")}}',
            type: 'get',
            success: function (response) {
                company_id=response
                $('#company_id').val(company_id)
                $('#main_photo').dropzone({
                    url:"{{asset('customer/companies/upload_image')}}/"+company_id,
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
                $('#dropzonefileupload').dropzone({
                    url:"{{asset('customer/companies/upload_others/')}}/"+company_id,
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
                        });


                    }
                });
            }
        });
    }
    function createEmployee() {
        $.ajax({
            url: '{{asset("customer/employees/create")}}',
            type: 'get',
            success: function (response) {
                employee_id=response
                $('#employee_id').val(employee_id)
                $('#main_photo1').dropzone({
                    url:"{{asset('customer/employees/upload_image')}}/"+home_id,
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
            }
        });
    }
    function createHome() {
        $.ajax({
            url: '{{asset("customer/homes/create")}}',
            type: 'get',
            success: function (response) {
                console.log(response)
                home_id=response
                $('#home_id').val(home_id)
                $('#main_photo2').dropzone({
                    url:"{{asset('customer/homes/upload_image/')}}/"+home_id,
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
                $('#dropzonefileupload2').dropzone({
                    url:"{{asset('customer/homes/upload_others/')}}/"+home_id,
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
            }
        });
    }
</script>
@endpush
