@extends('layouts.admin')

@section('content')

    <div class="col-md-8 mx-auto  grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Customer Profile</h4>
                <form class="forms-sample" method="post" action="{{route('profile')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$user->id}}" name="user_id">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1">  <label for="customer">Customer</label></div>
                            <div class="col-md-5">

                                <input type="radio" name="type" class="form-control" id="customer" value="customer" placeholder="Name" checked></div>
                            <div class="col-md-1">  <label for="customer">Company</label></div>
                            <div class="col-md-5">
                                 <input type="radio" name="type" class="form-control" id="company" value="company" placeholder="Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="kvk" style="display: none">
                        <label for="exampleInputName1">KVK</label>
                        <input type="text" name="kvk" value="{{isset($customer)?$customer->kvk:''}}" class="form-control" id="exampleInputName1" placeholder="KVK">
                    </div>
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
                        <label for="exampleInputName1">City</label>
                        <select  name="city" class="form-control" id="exampleInputName1" >
                            @foreach($cities as $city)
                                <option value="{{$city->id}}" {{$customer->city_id==$city->id?'selected':''}}>{{$city->name}}</option>
                             @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Street</label>
                        <input type="text" name="street"  value="{{$customer->street}}" class="form-control" id="exampleInputName1" placeholder="Street">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">House Number</label>
                        <input type="text" name="house_number"  value="{{$customer->house_number}}" class="form-control" id="exampleInputName1" placeholder="House Number">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Post Code</label>
                        <input type="text" name="post_code"  value="{{$customer->post_code}}" class="form-control" id="exampleInputName1" placeholder="Post Code">
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
                        </div>
                    </div>
                   <!-- <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="image" class="form-control">
                    </div>-->
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>

                </form>
            </div>
        </div>
    </div>

@endsection
@push('footer-scripts')
    <script>
        $(document).ready(function(){
            $('input[type="radio"]').click(function(){
                var inputValue = $(this).attr("value");
                var target = $("#kvk");
                if(inputValue==='company')
                    target.css('display','block')
                else
                    target.css('display','none')
            });
        });
    </script>
    @stack('script-filter')
@endpush
