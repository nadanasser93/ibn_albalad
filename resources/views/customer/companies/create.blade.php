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
                    <div class="card-header">{{ __('global.companies.create') }}</div>

                    <div class="card-body">


                        <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="customer_id" value="{{$customer->id}}">
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
                                <input type="file" name="image"  value="" class="form-control" id="exampleInputName1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Other Image</label>
                                <input type="file" class="form-control" name="photos" multiple>
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


</script>
@endpush

