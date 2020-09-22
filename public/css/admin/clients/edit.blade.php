@extends('layouts.admin')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class=" card">
             <div class="card-header">

            <h5 class="card-title">Edit Client</h5>
          </div>
                <div class="card-body">
            <form class="" action="{{ route('client.update', $client->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')


                        <div class="form-row">

                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Voornaam</label>
                                <input type="text" name="first_name" class="form-control" id="validationCustom01" placeholder="First name" value="{{$client->first_name}}" required>

                                @error('first_name')
                                <span class="" style="color:#f8b5b4" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="{{$client->client_type!=null&&$client->client_type->id==3?'col-md-4':'col-md-3'}} mb-3">
                                <label for="validationCustom02">Achternaam</label>
                                <input type="text" class="form-control" name="last_name" id="validationCustom02" placeholder="Achternaam" value="{{$client->last_name}}" required>

                                @error('last_name')
                                <span class="" style="color:#f8b5b4" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Geboorteplaats</label>
                                <input type="text" name="place_of_birth" class="form-control" id="validationCustom01" placeholder="Geboorteplaats" value="{{$client->place_of_birth}}">

                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="client_number">Company Number</label>
                                <input type="text" class="form-control" name="client_number" id="client_number" placeholder="Achternaam" value="{{$client->client_number}}" >
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="nationalitie">Nationalities</label>
                                <input type="text" class="form-control" name="nationalities" id="nationalitie" placeholder="Achternaam" value="{{$client->nationalities}}" >
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="date_of_birth">Geboortedatum</label>
                                <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Geboortedatum" value="{{isset($client->date_of_birth)?$client->date_of_birth->format('Y-m-d'):''}}" >
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom03">Telefoonnummer Mobiel</label>
                                <input type="text" name="phone_number" value="{{$client->phone_number}}" class="form-control" id="validationCustom03" placeholder="Telefoonnummer" required>

                                @error('phone_number')
                                <span class="" style="color:#f8b5b4" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror.

                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationCustomUsername">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    </div>
                                    <input type="text" name="email" value="{{$client->email}}" class="form-control" id="validationCustomUsername" placeholder="Email" aria-describedby="inputGroupPrepend" >

                                    @error('email')
                                    <span class="" style="color:#f8b5b4" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom04">Post Code</label>
                                <input type="text" value="{{$client->post_code}}" name="post_code" class="form-control" id="" placeholder="Post Code">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom05">Straat</label>
                                <input type="text" name="street" value="{{$client->street}}" class="form-control" id="validationCustom05" placeholder="Straat">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom05">Huisnummer</label>
                                <input type="text" name="house_number" value="{{$client->house_number}}" class="form-control" id="validationCustom05" placeholder="Huisnummer">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom05">kvk</label>
                                <input type="text" name="kvk" value="{{$client->kvk}}" class="form-control" id="validationCustom05" placeholder="kvk">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom05">btw</label>
                                <input type="text" name="btw" {{$client->btw}} class="form-control" id="validationCustom05" placeholder="btw">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="bsn">Bsn</label>
                                <input type="text" value="{{$client->bsn}}" name="bsn" class="form-control" id="validationCustom05" placeholder="bsn">
                            </div>


                        </div>


                <div class="card-footer mb-2">
                    <button class="btn btn-primary"  type="submit">Edit</button>
                </div>

            </form>


        </div>
            </div>
    </div>
        </div>
    </div>
@endsection

