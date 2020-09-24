@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('global.companies.create') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('companies.update',$company) }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="x" value="">
                            <div class="form-group">
                                <label for="exampleInputName1">Company Name</label>
                                <input type="text" value="{{$company->company_name}}" name="company_name" class="form-control" id="exampleInputName1" placeholder="Company Name">
                                @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group" id="kvk">
                                <label for="exampleInputName1">KVK</label>
                                <input type="text" name="kvk" value="{{$company->kvk}}" class="form-control" id="exampleInputName1" placeholder="KVK">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Phone</label>
                                <input type="text" name="phone"  value="{{$company->phone}}" class="form-control" id="exampleInputName1" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Main Image</label>
                                <input type="file" name="image"  value="" class="form-control" id="exampleInputName1" placeholder="Phone">
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

    </script>
@endpush

