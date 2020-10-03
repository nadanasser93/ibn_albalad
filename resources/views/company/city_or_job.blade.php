@extends('layouts.main')

@section('content')
	<div class="wrapper preloader" id="site-home">

    <!-- NAVIGATION AND SLIDER HOLDER -->
    <section class="site-holder" role="banner">
		<header class="site-header">
			<div class="city_job">
            <h2>SERCH BY</h2>
            <a href="/main/show_cities" class="btn btn_city animate__animated animate__bounceInDown animate__delay-1s">
            Cities
            </a>
            <a href="/main/show_Jobs" class="btn btn_city animate__animated animate__bounceInDown animate__delay-1s">
            Jobs
            </a>
			</div>
		</header>
	</section>
    @endsection