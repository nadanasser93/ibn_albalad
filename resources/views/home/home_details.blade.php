@extends('layouts.main')

@section('content')
	<div class="wrapper preloader" id="site-home">

    <!-- NAVIGATION AND SLIDER HOLDER -->
    <section class="site-holder" role="banner">
		<header class="site-header">
			<div class="detail_div">
            <main> 
                <div class="container">
                    <div class="grid second-nav">
                    <div class="column-xs-12">
                        <nav>
                        <ol class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Home one</a></li>
                            <li class="breadcrumb-item active">city name</li>
                        </ol>
                        </nav>
                    </div>
                    </div>
                    <div class="grid product">
                    <div class="column-xs-12 column-md-7">
                        <div class="product-gallery">
                        <div class="product-image">
                            <img class="active animate__animated animate__bounceInDown animate__delay-1s" src="https://source.unsplash.com/W1yjvf5idqA">
                        </div>
                        <ul class="image-list">
                            <li class="image-item animate__animated animate__bounceInDown animate__delay-2s"><img src="https://source.unsplash.com/W1yjvf5idqA"></li>
                            <li class="image-item animate__animated animate__bounceInDown animate__delay-2s"><img src="https://source.unsplash.com/VgbUxvW3gS4"></li>
                            <li class="image-item animate__animated animate__bounceInDown animate__delay-2s"><img src="https://source.unsplash.com/5WbYFH0kf_8"></li>
                        </ul>
                        </div>
                    </div>
                    <div class="column-xs-12 column-md-5 animate__animated animate__bounceInDown animate__delay-3s">
                        <h1>{{ $home->street }} - {{ $home->post_code }}</h1>
                        <h2>house_number - {{ $home->house_number }}</h2>
                        <h4>house_type - {{ $home->house_type }}</h4>
                        <div class="description">
                        <p>{{ $home->description }}</p>
                        </div>
                        <button class="add-to-cart">Call Owner</button>
                    </div>
                    </div>
                <!-- <div class="grid related-products">
                    <div class="column-xs-12">
                        <h3>You may also like</h3>
                    </div>
                    <div class="column-xs-12 column-md-4">
                        <img src="https://source.unsplash.com/miziNqvJx5M">
                        <h4>Succulent</h4>
                        <p class="price">$19.99</p>
                    </div>
                    <div class="column-xs-12 column-md-4">
                        <img src="https://source.unsplash.com/2y6s0qKdGZg">
                        <h4>Terranium</h4>
                        <p class="price">$19.99</p>
                    </div>
                    <div class="column-xs-12 column-md-4">
                        <img src="https://source.unsplash.com/6Rs76hNbIWE">
                        <h4>Cactus</h4>
                        <p class="price">$19.99</p>
                    </div>
                    </div>
                </div> -->
                </main>
			</div>
		</header>
	</section>
    @endsection