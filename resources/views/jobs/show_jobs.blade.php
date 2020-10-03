@extends('layouts.main')

@section('content')
	<div class="wrapper preloader" id="site-home">

    <!-- NAVIGATION AND SLIDER HOLDER -->
    <section class="site-holder" role="banner">
		<header class="site-header">
			<div class="Job_div">
            <h2>SERCH BY CITY</h2>
            @forelse($jobs as $job)
            <a href="{{ route('job.jobs', $job->id) }}" class="btn btn_city animate__animated animate__bounceInDown animate__delay-1s">
            {{ $job->name }}
            </a>
            @empty
                <p>No entries found.</p>
            @endforelse
			</div>
		</header>
	</section>
    @endsection