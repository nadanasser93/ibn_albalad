@extends('layouts.main')

@section('content')
    <!-- NAVIGATION AND SLIDER HOLDER -->
    <section class="site-holder" role="banner" style="height: 100% !important ;">
			<div class="Home_div">
            <h2 class="pageHeaderTitle animate__animated animate__bounceInLeft animate__delay-2s">Houses in  {{ $city->name }}</h2> 
            @forelse($homes as $home)
            <article class="postcard blue animate__animated animate__bounceInDown animate__delay-3s  animate__slow">
                <img class="postcard__img" src="https://picsum.photos/1000/1000" alt="Image Title" />
                <div class="postcard__text">
                    <h1 class="postcard__title blue"><a href="{{ route('home.home_details', $home->id) }}">{{ $home->house_number }}</a></h1>
                    <div class="postcard__subtitle small">
                        <time datetime="2020-05-25 12:00:00">
                            <i class="fas fa-calendar-alt mr-2"></i>{{ $home->street }} - {{ $home->post_code }}
                        </time>
                    </div>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">{{ $home->description }}</div>
                    <ul class="postcard__tagbox">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>{{ $home->house_type }}</li>
                        <li class="tag__item"><i class="fas fa-clock mr-2"></i>{{ $city->name }}</li>
                        <li class="tag__item play blue">
                            <a href="{{ route('home.home_details', $home->id) }}"><i class="fas fa-play mr-2"></i>SHOW MORE</a>
                        </li>
                    </ul>
                </div>
            </article><!-- 
            <p>{{ $home->street }}</p>
            <p>{{ $home->house_type }}</p> -->
            @empty
                <p>No entries found.</p>
            @endforelse
			</div>
	</section>
    @endsection