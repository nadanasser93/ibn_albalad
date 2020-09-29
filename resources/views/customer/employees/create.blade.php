
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


                        <form method="POST" id="employee_form" action="" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$customer!=null?$customer->id:''}}">

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
                                <div class="dropzone" id="main_photo1"></div>
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
                                    <button type="submit" class="btn btn-primary" onclick="">
                                        {{ __('button.general.save') }}
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

    $("#employee_form").submit(function(event){
        event.preventDefault();  // this prevents the form from submitting
     //   var post_url = $(this).attr("action"); //get form action url
        var post_url="{{asset('customer/employees/store/')}}/"+employee_id
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = $(this).serialize(); //Encode form elements for submission

        $.ajax({
            url : post_url,
            type: request_method,
            data : form_data
        }).done(function(response){ //
            newServ()
        });
    });
</script>
@endpush

