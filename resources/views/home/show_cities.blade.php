@extends('layouts.main')

@section('content')
    <!-- NAVIGATION AND SLIDER HOLDER -->
    <section role="banner " style="height: 100% !important ;">
			<div class="city_div">
            <!-- <img class="img_icon animate__animated animate__bounceInLeft animate__delay-2s animate__slow" src="{{ asset('images/homeicon.png') }}"> -->
            <h2 class="animate__animated animate__bounceInLeft animate__delay-2s">SEARCH BY CITY</h2>
            <br><br>
            @forelse($cities as $city)
            <a href="{{ route('home.homes', $city->id) }}">
            <button class="btn_city animate__animated animate__bounceInDown animate__delay-3s  animate__slow">
            {{ $city->name }}
            </button>
            </a>
            @empty
                <p>No entries found.</p>
            @endforelse
			</div>
	</section>
    @endsection