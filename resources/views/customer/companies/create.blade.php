
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
                    <div class="alert alert-danger job-error" style="display:none"></div>
                    <div class="card-body">
                        <form method="POST" id="company_form" action="" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="customer_id" value="{{$customer->id}}">

                            <input type="hidden" name="x" value="">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1">  <label for="customer">Customer</label></div>
                                    <div class="col-md-5">

                                        <input type="radio" name="com_type" class="form-control" id="customer" value="customer" placeholder="Name" {{$customer->customer_type==1?'checked':''}}></div>
                                    <div class="col-md-1">  <label for="customer">Company</label></div>
                                    <div class="col-md-5">
                                        <input type="radio" name="com_type" class="form-control" id="company" value="company" placeholder="Name" {{$customer->customer_type==2?'checked':''}}>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="kvk1" style="{{$customer->customer_type==1?'display: none':'display: block'}}">
                                <label for="exampleInputName1">KVK</label>
                                <input type="text" name="kvk" value="{{$customer->kvk}}" class="form-control" id="exampleInputName1" placeholder="KVK">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Company Name</label>
                                <input type="text" value="{{$customer->company_name}}" required name="company_name" class="form-control" id="exampleInputName1" placeholder="Company Name">
                                @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


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
                            <div class="companysubscription row">

                            </div>
                            <div class="form-group row mb-0 mt-2 mb-1 address">
                                <div class="col-md-12 offset-md-4">
                                    <button type="submit" class="btn btn-primary" onclick="">
                                        {{ __('button.general.save') }}
                                    </button>

                                    <!--<a href="{{route('homes.index')}}" style="color: #fff!important"  class="btn btn-dark" type="submit">Back</a>-->
                                    <button type="button" id="add_address" class="btn btn-primary">
                                        Add New Address
                                    </button>
                                    <!--<button class="btn btn-primary" onclick="stepper1.next()">Pay</button>-->

                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--@include('customer.companies.components.images',['company'=>null])--}}

@push('footer-scripts')
<script>
    $(document).ready(function(){
        $('input[name="com_type"]').click(function(){
            var inputValue = $(this).attr("value");
            var target = $("#kvk1");
            if(inputValue==='company')
                target.css('display','block')
            else
                target.css('display','none')
        });
    });
    //var add_address= $("#add_address");
    var x =0;
    $("#add_address").click(function(e){
        e.preventDefault();

        $('.address').before(
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

    $("#company_form").submit(function(event){
        event.preventDefault();  // this prevents the form from submitting
       // var post_url = $(this).attr("action"); //get form action url
        var post_url="{{asset('customer/companies/store/')}}/"+company_id
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = $(this).serialize(); //Encode form elements for submission

        $.ajax({
            url : post_url,
            type: request_method,
            data : form_data,
            success:function(data) { //
                console.log(data)
                if(data.errors!=undefined) {
                    jQuery('.job-error').show();
                    jQuery('.job-error').append('<p>' + data.errors + '</p>');
                }
                else
                newServ();
            },
            error:function (data) {
                console.log(data)
                jQuery.each(data.responseJSON.errors, function (key, value) {
                    jQuery('.job-error').show();
                    jQuery('.job-error').append('<p>' + value + '</p>');
                });
                //if (data.responseJSON.errors.length == 0)
                //    stepper1.next()
            }
        });
    });
</script>
@endpush

