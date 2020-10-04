<div class="col-md-8 mx-auto  grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Customer Profile</h4>
                <div class="alert alert-danger" style="display:none"></div>
                <form class="forms-sample" method="post" id="my_form" action="{{route('profile_store')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$customer->id}}" name="user_id">
                    <input type="hidden" value="{{$order->id}}" name="order_id" id="order_id">
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" value="{{$customer->customer_name}}" name="customer_name" class="form-control" id="exampleInputName1" placeholder="Name">
                        @error('customer_name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Company Name</label>
                        <input type="text" value="{{$customer->company_name}}" name="company_name" class="form-control" id="exampleInputName1" placeholder="Company Name">
                        @error('company_name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Phone</label>
                        <input type="text" name="phone"  value="{{$customer->phone}}" class="form-control" id="exampleInputName1" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                            <input type="email" name="email" value="{{$customer->email}}" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                   <!-- <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="image" class="form-control">
                    </div>-->
                    <button type="submit" class="btn btn-primary mr-2" onclick="">Submit</button>

                </form>
            </div>
        </div>
    </div>

@push('footer-scripts')
    <script>
       /* $(document).ready(function(){
            $('input[type="radio"]').click(function(){
                var inputValue = $(this).attr("value");
                var target = $("#kvk");
                if(inputValue==='company')
                    target.css('display','block')
                else
                    target.css('display','none')
            });
        });*/
        $("#my_form").submit(function(event){
            event.preventDefault();  // this prevents the form from submitting
            var post_url = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data = $(this).serialize(); //Encode form elements for submission

            $.ajax({
                url : post_url,
                type: request_method,
                data : form_data,
                success:function(data) { //
                    console.log(data)
                    jQuery.each(data.errors, function (key, value) {
                        jQuery('.alert-danger').show();
                        jQuery('.alert-danger').append('<p>' + value + '</p>');
                    });
                    if (data.success == 'Success')
                        stepper1.next()

                },
                error:function (data) {
                    console.log(data)
                    jQuery.each(data.responseJSON.errors, function (key, value) {
                        jQuery('.alert-danger').show();
                        jQuery('.alert-danger').append('<p>' + value + '</p>');
                    });
                    if (data.responseJSON.errors.length == 0)
                        stepper1.next()
                }
            });
        });
    </script>
    @stack('script-filter')
@endpush
