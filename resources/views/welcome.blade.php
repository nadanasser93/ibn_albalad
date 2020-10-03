@extends('layouts.main')

@section('content')
    <!-- <div class="flex-center position-ref">
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <a href="{{ url('/home') }}">Home</a>
                            @else
                                <a href="{{ route('login') }}">{{ trans('labels.frontend.header.login_as') }} </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
        </div> -->
        <!-- WRAPPER -->    <!-- Preloader -->
        <div class="wrapper preloader" id="site-home">

            <!-- NAVIGATION AND SLIDER HOLDER -->
            <section class="site-holder" role="banner">
            
                <!-- HEADER -->
                <header class="site-header">

                    <!-- STICKY HEADER -->
                    <div class="sticky-header" id="sticky-header">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-8 col-sm-3">

                                    <!-- LOGO -->
                                    <div class="site-logo">
                                        <a href="index.html">
                                            <img src="images/logo.png" alt="Logo">
                                            <span>DALILAK</span>
                                            <div class="flex-center position-ref">
                                                        @if (Route::has('login'))
                                                            <div class="top-right links">
                                                                @auth
                                                                    <a href="{{ url('/home') }}">Home</a>
                                                                @else
                                                                    <a href="{{ route('login') }}">{{ trans('labels.frontend.header.login_as') }} </a>

                                                                    @if (Route::has('register'))
                                                                        <a href="{{ route('register') }}">{{ trans('labels.frontend.header.logout') }}</a>
                                                                    @endif
                                                                @endauth
                                                            </div>
                                                        @endif
                                            </div>
                                        </a>
                                    </div>
                                    <!-- END LOGO -->

                                </div>
                                <div class="col-xs-4 col-sm-9">

                                    <!-- NAVIGATION -->
                                    <nav class="site-nav" id="site-nav" role="navigation">
                                        <!-- MOBILE VIEW BUTTON -->
                                        <div class="nav-mobile">
                                            <i class="fa fa-bars show"></i>
                                            <i class="fa fa-close hide"></i>
                                        </div>
                                        <!-- LINKS -->
                                        <ul class="nav-off-canvas">
                                            <!-- ACTIVE ITEM -->
                                            <li class="active"><a href="#site-home">{{ trans('main_page.main.header.home') }}</a></li>
                                            <li><a href="#amazing-features">{{ trans('main_page.main.header.features') }}</a></li>
                                            <li><a href="#site-download">{{ trans('main_page.main.header.download') }} <i class="fa fa-angle-down"></i> </a>

                                                <!-- SUB MENU -->
                                                <ul class="site-sub-menu">
                                                    <li><a href="#how-it-works">HOW IT WORKS</a></li>
                                                    <li><a href="#site-more-features">MORE FEATURES</a></li>
                                                    <li><a href="#site-accordion">ACCORDION</a></li>
                                                    <li><a href="#site-testimonial">TESTIMONIAL</a></li>
                                                    <li><a href="#quick-support">QUICK SUPPORT</a></li>
                                                </ul>

                                            </li>
                                            <li><a href="#site-quick-view">{{ trans('main_page.main.header.screens') }}</a></li>
                                            <li><a href="#site-team">{{ trans('main_page.main.header.team') }}</a></li>
                                            <li><a href="#site-packages">{{ trans('main_page.main.header.pricing') }}</a></li>
                                            
                                        </ul>
                                    </nav>
                                    <!-- END NAVIGATION -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--main buttons -->
                    <div class="radial-gradient">
                    <div class="head_first text-center">
                        <!-- <p class="head_title" aria-label="CodePen">
						  <span class="animate__animated animate__zoomInUp" data-text="D">D</span>
						  <span class="animate__animated animate__zoomInUp" data-text="A">A</span>
						  <span class="animate__animated animate__zoomInUp" data-text="L">L</span>
						  <span class="animate__animated animate__zoomInUp animate__slow" data-text="E">E</span>
						  <span class="animate__animated animate__zoomInUp animate__slow" data-text="L">L</span>
						  <span class="animate__animated animate__zoomInUp animate__slower" data-text="A">A</span>
						  <span class="animate__animated animate__zoomInUp animate__slower" data-text="K">K</span>
						</p> -->
                        </div>
                        
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4 col_left">
                                    <a href="/home/show_cities">
									<img class="animate__animated animate__bounceInLeft animate__delay-2s animate__slow" src="images/homeicon.png">
                                    <h3 class="animate__animated animate__bounceInLeft animate__delay-2s animate__slower">Find Home</h3>
                                    <p class="animate__animated animate__bounceInLeft animate__delay-2s animate__slower">Find a special home to replace yours</p>
                                    </a>
                                </div>
                                <div class="col-sm-4 col_center">
                                   <a href="">
                                    <img class="animate__animated animate__bounceInDown animate__delay-1s animate__slow" src="images/jobicon.png">
                                    <h3 class="animate__animated animate__bounceInDown animate__delay-1s animate__slower">Find Job</h3>
                                    <p class="animate__animated animate__bounceInDown animate__delay-1s animate__slower">Find the Job that you need</p>
                                    </a>
                                </div>
                                <div class="col-sm-4 col_right">
                                    <a href="">
									 <img class="animate__animated animate__bounceInRight animate__delay-3s animate__slow" src="images/serviceicon.png">
                                    <h3 class="animate__animated animate__bounceInRight animate__delay-3s animate__slower">Find Service</h3>
                                    <p class="animate__animated animate__bounceInRight animate__delay-3s animate__slower">Find all the services you need</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- START SLIDER -->
                    <div id="header-slider" class="header-slider">
                        <ul class="seq-canvas">

                            <!-- SLIDE 1 -->
                            <li class="step1 slides">

                                <!-- MAIN IMAGE -->
                                <div class="bg-img" style="background-image: url(images/header-slide-1.png)"></div>

                                <!-- Caption -->
                                <div class="slide-caption">

                                    <!-- H1 Heading -->
                                    <h1>Start Amazing App
                                        Best for business</h1>

                                    <!-- H2 Heading -->
                                    <h2>Innovativ with great innovtion</h2>

                                    <!-- Paragraph -->
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting indus
                                        orem Ipsum has been the industry's standard dummy text ever since the
                                        when an own printer took a galley of type and scrambled it to make.
                                    </p>

                                    <!-- Buttons -->
                                    <a href="#" class="slide-button">Download now</a>

                                    <!-- Button -->
                                    <a href="#" class="slide-button">Learn more</a>

                                </div>

                            </li>

                            <!-- SLIDE 2 -->
                            <li class="step2 slides">

                                <!-- MAIN IMAGE -->
                                <div class="bg-img" style="background-image: url(images/header-slide-2.png)"></div>

                                <!-- Caption -->
                                <div class="slide-caption">

                                    <!-- H1 Heading -->
                                    <h1>Start Amazing App
                                        Best for business</h1>

                                    <!-- H2 Heading -->
                                    <h2>Innovativ with great innovtion</h2>

                                    <!-- Paragraph -->
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting indus
                                        orem Ipsum has been the industry's standard dummy text ever since the
                                        when an own printer took a galley of type and scrambled it to make.
                                    </p>

                                    <!-- Buttons -->
                                    <a href="#" class="slide-button">Download now</a>

                                    <!-- Button -->
                                    <a href="#" class="slide-button">Learn more</a>

                                </div>

                            </li>

                            <!-- SLIDE 3 -->
                            <li class="step3 slides">

                                <!-- MAIN IMAGE -->
                                <div class="bg-img" style="background-image: url(images/header-slide-1.png)"></div>

                                <!-- Caption -->
                                <div class="slide-caption">

                                    <!-- H1 Heading -->
                                    <h1>Start Amazing App
                                        Best for business</h1>

                                    <!-- H2 Heading -->
                                    <h2>Innovativ with great innovtion</h2>

                                    <!-- Paragraph -->
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting indus
                                        orem Ipsum has been the industry's standard dummy text ever since the
                                        when an own printer took a galley of type and scrambled it to make.
                                    </p>

                                    <!-- Buttons -->
                                    <a href="#" class="slide-button">Download now</a>

                                    <!-- Button -->
                                    <a href="#" class="slide-button">Learn more</a>

                                </div>

                            </li>

                            <!-- SLIDE 4 -->
                            <li class="step4 slides">

                                <!-- MAIN IMAGE -->
                                <div class="bg-img" style="background-image: url(images/header-slide-2.png)"></div>

                                <!-- Caption -->
                                <div class="slide-caption">

                                    <!-- H1 Heading -->
                                    <h1>Start Amazing App
                                        Best for business</h1>

                                    <!-- H2 Heading -->
                                    <h2>Innovativ with great innovtion</h2>

                                    <!-- Paragraph -->
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting indus
                                        orem Ipsum has been the industry's standard dummy text ever since the
                                        when an own printer took a galley of type and scrambled it to make.
                                    </p>

                                    <!-- Buttons -->
                                    <a href="#" class="slide-button">Download now</a>

                                    <!-- Button -->
                                    <a href="#" class="slide-button">Learn more</a>

                                </div>

                            </li>

                        </ul>

                        <!-- PAGINATION -->
                        <ul class="seq-pagination">
                            <li>01</li>
                            <li>02</li>
                            <li>03</li>
                            <li>04</li>
                        </ul>

                        <!-- NAVIGATION -->
                        <button type="button" class="seq-next"><span class="icon-play"></span></button>
                        <button type="button" class="seq-prev"><span class="icon-play-flip"></span></button>

                    </div>

                </header>
                <!-- END HEADER -->

            </section>

            <!-- STORE ICONS -->
            <section class="site-store-icons">
                <div class="align-center">

                    <!-- BUTTON 1 -->
                    <a href="#">
                        <!-- FIGURE -->
                        <figure><i class="fa fa-mobile"></i></figure>
                        <!-- h6 heading -->
                        <h6>Available on the</h6>
                        <!-- h5 -->
                        <h5>iOS App Store</h5>
                    </a>

                    <!-- BUTTON 2 -->
                    <a href="#">
                        <!-- FIGURE -->
                        <figure><img src="images/store-google-icon.png" alt="store icon"></figure>
                        <!-- h6 heading -->
                        <h6>Available on the</h6>
                        <!-- h5 -->
                        <h5>Google Store</h5>
                    </a>

                    <!-- BUTTON 3 -->
                    <a href="#">
                        <!-- FIGURE -->
                        <figure><i class="fa fa-windows adjust"></i></figure>
                        <!-- h6 heading -->
                        <h6>Available on the</h6>
                        <!-- h5 -->
                        <h5>Windows Store</h5>
                    </a>

                </div>
            </section>

            <!-- AMAZING FEATURES -->
            <section id="amazing-features" class="site-amazing-features section-white">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">

                            <!-- H1 HEADING -->
                            <h1>Amazing <strong>Features</strong></h1>

                            <div class="row">
                                <div class="col-xs-12 col-sm-4">

                                    <!-- FEATURE 1 -->
                                    <div class="features move">
                                        <!-- ICON -->
                                        <figure><span class="icon-edit"></span></figure>
                                        <!-- H5 HEADING -->
                                        <h5>Easy to Use</h5>
                                        <!-- PARAGRAPH -->
                                        <p>Lorem Ipsum is simply dummy text of the printing and typeseing industry</p>
                                    </div>

                                </div>
                                <div class="col-xs-12 col-sm-4">

                                    <!-- FEATURE 1 -->
                                    <div class="features">
                                        <!-- ICON -->
                                        <figure><span class="icon-like"></span></figure>
                                        <!-- H5 HEADING -->
                                        <h5>Beautyful Design</h5>
                                        <!-- PARAGRAPH -->
                                        <p>Lorem Ipsum is simply dummy text of the printing and typeseing industry</p>
                                    </div>

                                </div>
                                <div class="col-xs-12 col-sm-4">

                                    <!-- FEATURE 1 -->
                                    <div class="features move">
                                        <!-- ICON -->
                                        <figure><span class="icon-sun"></span></figure>
                                        <!-- H5 HEADING -->
                                        <h5>Unlimited app store</h5>
                                        <!-- PARAGRAPH -->
                                        <p>Lorem Ipsum is simply dummy text of the printing and typeseing industry</p>
                                    </div>

                                </div>
                                <div class="col-xs-12">

                                    <!-- Mobile PICTURE -->
                                    <figure class="device">
                                        <img src="images/features-mobile.png" alt="Device">
                                    </figure>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <!-- HOW IT WORKS -->
            <section class="site-how-it-works section-blue" id="how-it-works">
                <div class="container-fluid wide">
                    <div class="row">
                        <div class="col-xs-12">

                            <!-- H1 HEADING -->
                            <h1>How it <strong>Works?</strong></h1>

                            <!-- START SLIDER -->

                            <!-- Slider main container -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-11 col-sm-offset-1">
                                        <div class="swiper-container" id="how-it-works-slider">
                                            <!-- Additional required wrapper -->
                                            <ul class="swiper-wrapper">
                                                <!-- Slides -->
                                                <!-- SLIDE 1 -->
                                                <li class="swiper-slide">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-6">

                                                            <!-- H5 HEADING -->
                                                            <h3>First tab title - How to install ?</h3>
                                                            <!-- PARAGRAPH -->
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typeseing indus
                                                                try Lorem Ipsum has been the industry's standard dummy text Lorem
                                                                is simply dummy text of the printing and typeseing industry.</p>

                                                            <!-- BOX -->
                                                            <div class="section first">
                                                                <!-- FIGURE -->
                                                                <figure><span class="icon-config"></span></figure>
                                                                <!-- H4 HEADING -->
                                                                <h4>Confing your mobile</h4>
                                                                <!-- PARAGRAPH -->
                                                                <p> Lorem Ipsum is simply dummy text of the printing and typing
                                                                    indus try Lorem Ipsum has been the indus. </p>
                                                            </div>

                                                            <!-- BOX -->
                                                            <div class="section">
                                                                <!-- FIGURE -->
                                                                <figure><span class="icon-refresh"></span></figure>
                                                                <!-- H4 HEADING -->
                                                                <h4>Refresh setup</h4>
                                                                <!-- PARAGRAPH -->
                                                                <p>Simply dummy text of the printing and typing indus try Lorem
                                                                    Ipsum has been the indus try's standard.</p>
                                                            </div>

                                                            <!-- BOX -->
                                                            <div class="section">
                                                                <!-- FIGURE -->
                                                                <figure><span class="icon-comment"></span></figure>
                                                                <!-- H4 HEADING -->
                                                                <h4>Chat with your love</h4>
                                                                <!-- PARAGRAPH -->
                                                                <p>Ipsum is simply dummy text of the printing and typing indus
                                                                    try Lorem Ipsum has been the indus standard.</p>
                                                            </div>

                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6">

                                                            <!-- DEVICE -->
                                                            <figure class="device">
                                                                <img src="images/how-it-works-device.png" alt="Device">
                                                            </figure>

                                                        </div>
                                                    </div>
                                                </li>

                                                <!-- SLIDE 2 -->
                                                <li class="swiper-slide">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-6">

                                                            <!-- H5 HEADING -->
                                                            <h3>First tab title - How to install ?</h3>
                                                            <!-- PARAGRAPH -->
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typeseing indus
                                                                try Lorem Ipsum has been the industry's standard dummy text Lorem
                                                                is simply dummy text of the printing and typeseing industry.</p>

                                                            <!-- BOX -->
                                                            <div class="section first">
                                                                <!-- FIGURE -->
                                                                <figure><span class="icon-config"></span></figure>
                                                                <!-- H4 HEADING -->
                                                                <h4>Confing your mobile</h4>
                                                                <!-- PARAGRAPH -->
                                                                <p> Lorem Ipsum is simply dummy text of the printing and typing
                                                                    indus try Lorem Ipsum has been the indus. </p>
                                                            </div>

                                                            <!-- BOX -->
                                                            <div class="section">
                                                                <!-- FIGURE -->
                                                                <figure><span class="icon-refresh"></span></figure>
                                                                <!-- H4 HEADING -->
                                                                <h4>Refresh setup</h4>
                                                                <!-- PARAGRAPH -->
                                                                <p>Simply dummy text of the printing and typing indus try Lorem
                                                                    Ipsum has been the indus try's standard.</p>
                                                            </div>

                                                            <!-- BOX -->
                                                            <div class="section">
                                                                <!-- FIGURE -->
                                                                <figure><span class="icon-comment"></span></figure>
                                                                <!-- H4 HEADING -->
                                                                <h4>Chat with your love</h4>
                                                                <!-- PARAGRAPH -->
                                                                <p>Ipsum is simply dummy text of the printing and typing indus
                                                                    try Lorem Ipsum has been the indus standard.</p>
                                                            </div>

                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6">

                                                            <!-- DEVICE -->
                                                            <figure class="device">
                                                                <img src="images/how-it-works-device.png" alt="Device">
                                                            </figure>

                                                        </div>
                                                    </div>
                                                </li>

                                                <!-- SLIDE 3 -->
                                                <li class="swiper-slide">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-6">

                                                            <!-- H5 HEADING -->
                                                            <h3>First tab title - How to install ?</h3>
                                                            <!-- PARAGRAPH -->
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typeseing indus
                                                                try Lorem Ipsum has been the industry's standard dummy text Lorem
                                                                is simply dummy text of the printing and typeseing industry.</p>

                                                            <!-- BOX -->
                                                            <div class="section first">
                                                                <!-- FIGURE -->
                                                                <figure><span class="icon-config"></span></figure>
                                                                <!-- H4 HEADING -->
                                                                <h4>Confing your mobile</h4>
                                                                <!-- PARAGRAPH -->
                                                                <p> Lorem Ipsum is simply dummy text of the printing and typing
                                                                    indus try Lorem Ipsum has been the indus. </p>
                                                            </div>

                                                            <!-- BOX -->
                                                            <div class="section">
                                                                <!-- FIGURE -->
                                                                <figure><span class="icon-refresh"></span></figure>
                                                                <!-- H4 HEADING -->
                                                                <h4>Refresh setup</h4>
                                                                <!-- PARAGRAPH -->
                                                                <p>Simply dummy text of the printing and typing indus try Lorem
                                                                    Ipsum has been the indus try's standard.</p>
                                                            </div>

                                                            <!-- BOX -->
                                                            <div class="section">
                                                                <!-- FIGURE -->
                                                                <figure><span class="icon-comment"></span></figure>
                                                                <!-- H4 HEADING -->
                                                                <h4>Chat with your love</h4>
                                                                <!-- PARAGRAPH -->
                                                                <p>Ipsum is simply dummy text of the printing and typing indus
                                                                    try Lorem Ipsum has been the indus standard.</p>
                                                            </div>

                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6">

                                                            <!-- DEVICE -->
                                                            <figure class="device">
                                                                <img src="images/how-it-works-device.png" alt="Device">
                                                            </figure>

                                                        </div>
                                                    </div>
                                                </li>

                                                <!-- SLIDE 4 -->
                                                <li class="swiper-slide">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-6">

                                                            <!-- H5 HEADING -->
                                                            <h3>First tab title - How to install ?</h3>
                                                            <!-- PARAGRAPH -->
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typeseing indus
                                                                try Lorem Ipsum has been the industry's standard dummy text Lorem
                                                                is simply dummy text of the printing and typeseing industry.</p>

                                                            <!-- BOX -->
                                                            <div class="section first">
                                                                <!-- FIGURE -->
                                                                <figure><span class="icon-config"></span></figure>
                                                                <!-- H4 HEADING -->
                                                                <h4>Confing your mobile</h4>
                                                                <!-- PARAGRAPH -->
                                                                <p> Lorem Ipsum is simply dummy text of the printing and typing
                                                                    indus try Lorem Ipsum has been the indus. </p>
                                                            </div>

                                                            <!-- BOX -->
                                                            <div class="section">
                                                                <!-- FIGURE -->
                                                                <figure><span class="icon-refresh"></span></figure>
                                                                <!-- H4 HEADING -->
                                                                <h4>Refresh setup</h4>
                                                                <!-- PARAGRAPH -->
                                                                <p>Simply dummy text of the printing and typing indus try Lorem
                                                                    Ipsum has been the indus try's standard.</p>
                                                            </div>

                                                            <!-- BOX -->
                                                            <div class="section">
                                                                <!-- FIGURE -->
                                                                <figure><span class="icon-comment"></span></figure>
                                                                <!-- H4 HEADING -->
                                                                <h4>Chat with your love</h4>
                                                                <!-- PARAGRAPH -->
                                                                <p>Ipsum is simply dummy text of the printing and typing indus
                                                                    try Lorem Ipsum has been the indus standard.</p>
                                                            </div>

                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6">

                                                            <!-- DEVICE -->
                                                            <figure class="device">
                                                                <img src="images/how-it-works-device.png" alt="Device">
                                                            </figure>

                                                        </div>
                                                    </div>
                                                </li>

                                                <!-- SLIDE 5 -->
                                                <li class="swiper-slide">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-6">

                                                            <!-- H5 HEADING -->
                                                            <h3>First tab title - How to install ?</h3>
                                                            <!-- PARAGRAPH -->
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typeseing indus
                                                                try Lorem Ipsum has been the industry's standard dummy text Lorem
                                                                is simply dummy text of the printing and typeseing industry.</p>

                                                            <!-- BOX -->
                                                            <div class="section first">
                                                                <!-- FIGURE -->
                                                                <figure><span class="icon-config"></span></figure>
                                                                <!-- H4 HEADING -->
                                                                <h4>Confing your mobile</h4>
                                                                <!-- PARAGRAPH -->
                                                                <p> Lorem Ipsum is simply dummy text of the printing and typing
                                                                    indus try Lorem Ipsum has been the indus. </p>
                                                            </div>

                                                            <!-- BOX -->
                                                            <div class="section">
                                                                <!-- FIGURE -->
                                                                <figure><span class="icon-refresh"></span></figure>
                                                                <!-- H4 HEADING -->
                                                                <h4>Refresh setup</h4>
                                                                <!-- PARAGRAPH -->
                                                                <p>Simply dummy text of the printing and typing indus try Lorem
                                                                    Ipsum has been the indus try's standard.</p>
                                                            </div>

                                                            <!-- BOX -->
                                                            <div class="section">
                                                                <!-- FIGURE -->
                                                                <figure><span class="icon-comment"></span></figure>
                                                                <!-- H4 HEADING -->
                                                                <h4>Chat with your love</h4>
                                                                <!-- PARAGRAPH -->
                                                                <p>Ipsum is simply dummy text of the printing and typing indus
                                                                    try Lorem Ipsum has been the indus standard.</p>
                                                            </div>

                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6">

                                                            <!-- DEVICE -->
                                                            <figure class="device">
                                                                <img src="images/how-it-works-device.png" alt="Device">
                                                            </figure>

                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- If we need navigation buttons -->
                            <div id="how-it-works-prev" class="swiper-button-prev"><i class="fa fa-angle-up hidden-xs"></i><span class="icon-play-flip visible-xs"></span></div>
                            <div id="how-it-works-next" class="swiper-button-next"><i class="fa fa-angle-down hidden-xs"></i><span class="icon-play visible-xs"></span></div>

                            <!-- If we need pagination -->
                            <div id="how-it-works-paging" class="swiper-pagination" data-icons='[
                                "fa fa-mobile",
                                "icon-config",
                                "icon-help",
                                "fa fa-shopping-basket",
                                "icon-unlock",
                                "icon-shopbag"
                                ]'></div>

                        </div>
                    </div>
                </div>
            </section>

            <!-- MORE FEATURES -->
            <div class="site-more-features section-white" id="site-more-features">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-12">
                            <!-- heading -->
                            <h1>More <strong>Features</strong></h1>
                        </div>

                        <!-- clearfix -->
                        <div class="clearfix"></div>

                        <div class="col-xs-12 col-sm-12 col-md-4 col-md-push-4">

                            <!-- mobile image -->
                            <figure class="featured-img">
                                <img src="images/accordion-2.png" alt="Image">
                            </figure>
                            <!-- end -->

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-4 col-md-pull-4">

                            <!-- feature 1 -->
                            <div class="feature align-right">
                                <h5>Application records</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typeseing</p>
                                <figure>
                                    <span class="icon-micro"></span>
                                </figure>
                            </div>

                            <!-- feature 2 -->
                            <div class="feature align-right move">
                                <h5>Best for business</h5>
                                <p>Lorem Ipsum is simply dummyof the printing and typeseing</p>
                                <figure>
                                    <span class="icon-portfolio"></span>
                                </figure>
                            </div>

                            <!-- feature 3 -->
                            <div class="feature align-right">
                                <h5>Full free chat</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typeseing</p>
                                <figure>
                                    <span class="icon-chat"></span>
                                </figure>
                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-4">

                            <!-- feature 1 -->
                            <div class="feature align-left">
                                <h5>Retina ready</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typeseing</p>
                                <figure>
                                    <span class="icon-albums"></span>
                                </figure>
                            </div>

                            <!-- feature 2 -->
                            <div class="feature align-left move">
                                <h5>Secure extra</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and.</p>
                                <figure>
                                    <span class="icon-lock"></span>
                                </figure>
                            </div>

                            <!-- feature 3 -->
                            <div class="feature align-left">
                                <h5>Night vision</h5>
                                <p>Lorem Ipsum is simply dummy of the printing and industry.</p>
                                <figure>
                                    <span class="icon-moon"></span>
                                </figure>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

            <!-- DOWNLOAD -->
            <section id="site-download" class="site-download section-blue">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">

                            <!-- H1 HEADING -->
                            <h1>Start <strong>Download</strong></h1>

                        </div>
                    </div>
                </div>
            </section>

            <!-- DOWNLOAD ICONS -->
            <section class="site-download-icons">
                <div class="align-center">

                    <!-- BUTTON 1 -->
                    <a href="#">
                        <!-- FIGURE -->
                        <figure><i class="fa fa-mobile"></i></figure>
                        <!-- h6 heading -->
                        <h6>Available on the</h6>
                        <!-- h5 -->
                        <h5>iOS App Store</h5>
                    </a>

                    <!-- BUTTON 2 -->
                    <a href="#">
                        <!-- FIGURE -->
                        <figure><img src="images/store-google-icon.png" alt="store icon"></figure>
                        <!-- h6 heading -->
                        <h6>Available on the</h6>
                        <!-- h5 -->
                        <h5>Google Store</h5>
                    </a>

                    <!-- BUTTON 3 -->
                    <a href="#">
                        <!-- FIGURE -->
                        <figure><i class="fa fa-windows adjust"></i></figure>
                        <!-- h6 heading -->
                        <h6>Available on the</h6>
                        <!-- h5 -->
                        <h5>Windows Store</h5>
                    </a>

                </div>
            </section>

            <!-- QUICK VIEW -->
            <section class="site-quick-view section-white" id="site-quick-view">
                <div class="container-fluid wide">
                    <div class="row">
                        <div class="col-sm-12">

                            <!-- heading -->
                            <h1>Quick <strong>View</strong></h1>

                            <!-- Slider main container -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="swiper-container" id="quick-view-slider">

                                            <!-- Additional required wrapper -->
                                            <ul class="swiper-wrapper">

                                                <!-- slide 1 -->
                                                <li class="swiper-slide">
                                                    <!-- box URL -->
                                                    <a href="#" class="box">
                                                        <!-- image -->
                                                        <figure>
                                                            <img src="images/quick-view-1.png" alt="Image">
                                                        </figure>
                                                    </a>
                                                </li>

                                                <!-- slide 2 -->
                                                <li class="swiper-slide">
                                                    <!-- box URL -->
                                                    <a href="#" class="box">
                                                        <!-- image -->
                                                        <figure>
                                                            <img src="images/quick-view-2.png" alt="Image">
                                                        </figure>
                                                    </a>
                                                </li>

                                                <!-- slide 3 -->
                                                <li class="swiper-slide">
                                                    <!-- box URL -->
                                                    <a href="#" class="box">
                                                        <!-- image -->
                                                        <figure>
                                                            <img src="images/quick-view-3.png" alt="Image">
                                                        </figure>
                                                    </a>
                                                </li>

                                                <!-- slide 4 -->
                                                <li class="swiper-slide">
                                                    <!-- box URL -->
                                                    <a href="#" class="box">
                                                        <!-- image -->
                                                        <figure>
                                                            <img src="images/quick-view-4.png" alt="Image">
                                                        </figure>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- If we need navigation buttons -->
                            <div id="quick-view-prev" class="swiper-button-prev"><span class="icon-play-flip"></span></div>
                            <div id="quick-view-next" class="swiper-button-next"><span class="icon-play"></span></div>

                            <!-- If we need pagination -->
                            <div id="quick-view-paging" class="swiper-pagination visible-xs"></div>

                        </div>
                    </div>
                </div>
            </section>

            <!-- ACCORDION -->
            <section id="site-accordion" class="site-accordion section-blue">
                <div class="container">
                    <div class="row">

                        <div class="col-xs-12 col-md-6 col-md-push-6">

                            <!-- mobile image -->
                            <figure class="accordion-img">
                                <img src="images/accordion-5.png" alt="Image">
                            </figure>
                            <!-- end -->

                        </div>
                        <div class="col-xs-12 col-md-6 col-md-pull-6">

                            <!-- accordion -->
                            <div class="panel-group" id="accordion">

                                <!-- section 1 -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="collapsed">
                                                What is the Start App ?
                                                <span>icon</span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse">
                                        <div class="panel-body-container">
                                            <div class="panel-body">
                                                Lorem Ipsum is simply dummy text of the printing and typeseing
                                                industry Lorem Ipsum has been the industry's standard dummy
                                                text ever since the when an Lorem Ipsum is simply.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- section 2 -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title active">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                                Where can i download this app ?
                                                <span>icon</span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse2" class="panel-collapse collapse in">
                                        <div class="panel-body-container">
                                            <div class="panel-body">
                                                Lorem Ipsum is simply dummy text of the printing and typeseing
                                                industry Lorem Ipsum has been the industry's standard dummy
                                                text ever since the when an Lorem Ipsum is simply.
                                                Lorem Ipsum is simply dummy text of the printing and typeseing
                                                industry Lorem Ipsum has been the industry's standard dummy
                                                text ever since the when an Lorem Ipsum is simply.
                                                Lorem Ipsum is simply dummy text of the printing and typeseing
                                                industry Lorem Ipsum has been the industry's standard dummy
                                                text ever since the when an Lorem Ipsum is simply.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- section 3 -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="collapsed">
                                                How to install this app ?
                                                <span>icon</span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse3" class="panel-collapse collapse">
                                        <div class="panel-body-container">
                                            <div class="panel-body">
                                                Lorem Ipsum is simply dummy text of the printing and typeseing
                                                industry Lorem Ipsum has been the industry's standard dummy
                                                text ever since the when an Lorem Ipsum is simply.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- section 4 -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="collapsed">
                                                Is this app useful for business purpose ?
                                                <span>icon</span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse4" class="panel-collapse collapse">
                                        <div class="panel-body-container">
                                            <div class="panel-body">
                                                Lorem Ipsum is simply dummy text of the printing and typeseing
                                                industry Lorem Ipsum has been the industry's standard dummy
                                                text ever since the when an Lorem Ipsum is simply.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end -->

                        </div>

                    </div>
                </div>
            </section>

            <!-- TEAM -->
            <section class="site-team section-white" id="site-team">
                <div class="container-fluid wide">
                    <div class="row">
                        <div class="col-sm-12">

                            <!-- heading -->
                            <h1>Innovative <strong>Team</strong></h1>

                            <!-- Slider main container -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="swiper-container" id="team-slider">

                                            <!-- Additional required wrapper -->
                                            <ul class="swiper-wrapper">

                                                <!-- slide 1 -->
                                                <li class="swiper-slide">
                                                    <!-- box -->
                                                    <div class="site-box">
                                                        <!-- image -->
                                                        <figure>
                                                            <img src="images/team-1.png" alt="User">
                                                        </figure>
                                                        <!-- heading -->
                                                        <h5>Jhon Due Stive</h5>
                                                        <!-- description -->
                                                        <h6>Founder & CEO</h6>
                                                        <!-- paragraph -->
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typeseing industry</p>
                                                        <!-- social icons -->
                                                        <div class="site-social-icons">
                                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                                        </div>
                                                    </div>
                                                </li>

                                                <!-- slide 2 -->
                                                <li class="swiper-slide">
                                                    <!-- box -->
                                                    <div class="site-box">
                                                        <!-- image -->
                                                        <figure>
                                                            <img src="images/team-2.png" alt="User">
                                                        </figure>
                                                        <!-- heading -->
                                                        <h5>Mark Denial</h5>
                                                        <!-- description -->
                                                        <h6>Chief Developer</h6>
                                                        <!-- paragraph -->
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typeseing industry</p>
                                                        <!-- social icons -->
                                                        <div class="site-social-icons">
                                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                                        </div>
                                                    </div>
                                                </li>

                                                <!-- slide 3 -->
                                                <li class="swiper-slide">
                                                    <!-- box -->
                                                    <div class="site-box">
                                                        <!-- image -->
                                                        <figure>
                                                            <img src="images/team-3.png" alt="User">
                                                        </figure>
                                                        <!-- heading -->
                                                        <h5>Worner Smith</h5>
                                                        <!-- description -->
                                                        <h6>UI Designer</h6>
                                                        <!-- paragraph -->
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typeseing industry</p>
                                                        <!-- social icons -->
                                                        <div class="site-social-icons">
                                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                                        </div>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- If we need navigation buttons -->
                            <div id="team-prev" class="swiper-button-prev hidden-lg"><span class="icon-play-flip"></span></div>
                            <div id="team-next" class="swiper-button-next hidden-lg"><span class="icon-play"></span></div>

                            <!-- If we need pagination -->
                            <div id="team-paging" class="swiper-pagination visible-xs"></div>

                        </div>
                    </div>
                </div>
            </section>

            <!-- TESTIMONIAL -->
            <section class="site-testimonial section-blue" id="site-testimonial">
                <div class="container-fluid wide">
                    <div class="row">
                        <div class="col-sm-12">

                            <!-- quote -->
                            <div class="testimonial-quote">
                                <span>“</span>
                            </div>

                            <!-- Slider main container -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                                        <div class="swiper-container" id="testimonial-slider">

                                            <!-- Additional required wrapper -->
                                            <ul class="swiper-wrapper">

                                                <!-- slide 1 -->
                                                <li class="swiper-slide">
                                                    <!-- image -->
                                                    <figure>
                                                        <img src="images/testimonial-user.png" alt="User">
                                                    </figure>

                                                    <!-- paragraph -->
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typing indus
                                                        try Lorem Ipsum has been the indus try's standard dummy text Lorem
                                                        is simply dummy text of the printing and typeseing industry. Lorem
                                                        Ipsum has been the industry's standard
                                                    </p>

                                                    <!-- user name -->
                                                    <h5>- Devil Shohe</h5>
                                                </li>
                                                <!-- slide 2 -->
                                                <li class="swiper-slide">
                                                    <!-- image -->
                                                    <figure>
                                                        <img src="images/testimonial-user.png" alt="User">
                                                    </figure>

                                                    <!-- paragraph -->
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typing indus
                                                        try Lorem Ipsum has been the indus try's standard dummy text Lorem
                                                        is simply dummy text of the printing and typeseing industry. Lorem
                                                        Ipsum has been the industry's standard
                                                    </p>

                                                    <!-- user name -->
                                                    <h5>- Devil Shohe</h5>
                                                </li>
                                                <!-- slide 3 -->
                                                <li class="swiper-slide">
                                                    <!-- image -->
                                                    <figure>
                                                        <img src="images/testimonial-user.png" alt="User">
                                                    </figure>

                                                    <!-- paragraph -->
                                                    <p>
                                                        Lorem Ipsum is simply dummy text of the printing and typing indus
                                                        try Lorem Ipsum has been the indus try's standard dummy text Lorem
                                                        is simply dummy text of the printing and typeseing industry. Lorem
                                                        Ipsum has been the industry's standard
                                                    </p>

                                                    <!-- user name -->
                                                    <h5>- Devil Shohe</h5>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- If we need navigation buttons -->
                            <div id="testimonial-prev" class="swiper-button-prev hidden-lg"><span class="icon-play-flip"></span></div>
                            <div id="testimonial-next" class="swiper-button-next hidden-lg"><span class="icon-play"></span></div>

                            <!-- If we need pagination -->
                            <div id="testimonial-paging" class="swiper-pagination"></div>

                        </div>
                    </div>
                </div>
            </section>

            <!-- PACKAGES -->
            <section class="site-packages section-white" id="site-packages">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-12">

                            <!-- h1 heading -->
                            <h1>Our Best <strong>Pricing</strong></h1>
                        </div>

                        <div class="col-xs-12 col-sm-4">

                            <!-- plan -->
                            <div class="box">
                                <!-- price -->
                                <div class="price">$199</div>
                                <!-- heading -->
                                <h4 class="heading">Basic Plan</h4>
                                <!-- options -->
                                <ul class="options">
                                    <li><span> <i class="fa fa-check"></i> Limited Indtall</span></li>
                                    <li><span> <i class="fa fa-check"></i> Unlimited Downlaod</span></li>
                                    <li><span> <i class="fa fa-check"></i> Free One Year Support</span></li>
                                    <li><span> <i class="fa fa-close"></i> Free 15GB Linux Hosing</span></li>
                                    <li><span> <i class="fa fa-close"></i> 30GB Storage</span></li>
                                    <li><span> <i class="fa fa-close"></i> Unlimited Data</span></li>
                                </ul>
                                <!-- button -->
                                <a href="#">Order Now</a>
                            </div>
                            <!-- end -->

                        </div>

                        <div class="col-xs-12 col-sm-4">

                            <!-- plan active -->
                            <div class="box active">
                                <!-- price -->
                                <div class="price">$200</div>
                                <!-- heading -->
                                <h4 class="heading">Premium Plan</h4>
                                <!-- options -->
                                <ul class="options">
                                    <li><span><i class="fa fa-check"></i> Limited Indtall</span></li>
                                    <li><span><i class="fa fa-check"></i> Unlimited Downlaod</span></li>
                                    <li><span><i class="fa fa-check"></i> Free One Year Support</span></li>
                                    <li><span><i class="fa fa-check"></i> Free 15GB Linux Hosing</span></li>
                                    <li><span><i class="fa fa-close"></i> 30GB Storage</span></li>
                                    <li><span><i class="fa fa-close"></i> Unlimited Data</span></li>
                                </ul>
                                <!-- button -->
                                <a href="#">Order Now</a>
                            </div>
                            <!-- end -->

                        </div>

                        <div class="col-xs-12 col-sm-4">

                            <!-- plan -->
                            <div class="box">
                                <!-- price -->
                                <div class="price">$399</div>
                                <!-- heading -->
                                <h4 class="heading">Advanced Plan</h4>
                                <!-- options -->
                                <ul class="options">
                                    <li><span><i class="fa fa-check"></i> Limited Indtall</span></li>
                                    <li><span><i class="fa fa-check"></i> Unlimited Downlaod</span></li>
                                    <li><span><i class="fa fa-check"></i> Free One Year Support</span></li>
                                    <li><span><i class="fa fa-check"></i> Free 15GB Linux Hosing</span></li>
                                    <li><span><i class="fa fa-check"></i> 30GB Storage</span></li>
                                    <li><span><i class="fa fa-check"></i> Unlimited Data</span></li>
                                </ul>
                                <!-- button -->
                                <a href="#">Order Now</a>
                            </div>
                            <!-- end -->

                        </div>

                    </div>
                </div>
            </section>

            <!-- STATISTIC -->
            <section class="site-statistic section-white" id="site-statistic">
                <div class="container">
                    <div class="row">

                        <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-3 col-md-offset-0">
                            <!-- number -->
                            <div class="site-number">
                                <!-- icon -->
                                <i class="fa fa-cloud-download"></i>
                                <!-- h5 heading -->
                                <h5 class="counter-count">200 <span>K</span></h5>
                                <!-- paragraph -->
                                <p>App Download</p>
                            </div>
                            <!-- end -->
                        </div>
                        <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-3 col-md-offset-0">
                            <!-- number -->
                            <div class="site-number">
                                <!-- icon -->
                                <i class="fa fa-thumbs-up"></i>
                                <!-- h5 heading -->
                                <h5 class="counter-count">50 <span>K</span></h5>
                                <!-- paragraph -->
                                <p>Free Download</p>
                            </div>
                            <!-- end -->
                        </div>
                        <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-3 col-md-offset-0">
                            <!-- number -->
                            <div class="site-number">
                                <!-- icon -->
                                <i class="fa fa-users"></i>
                                <!-- h5 heading -->
                                <h5 class="counter-count">95 <span>%</span></h5>
                                <!-- paragraph -->
                                <p>Return Customers</p>
                            </div>
                            <!-- end -->
                        </div>
                        <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-3 col-md-offset-0">
                            <!-- number -->
                            <div class="site-number">
                                <!-- icon -->
                                <i class="fa fa-trophy"></i>
                                <!-- h5 heading -->
                                <h5 class="counter-count">10 <span>+</span></h5>
                                <!-- paragraph -->
                                <p>Best Awards</p>
                            </div>
                            <!-- end -->
                        </div>

                    </div>
                </div>
            </section>

            <!-- TWITTER -->
            <section class="site-twitter section-blue" id="site-twitter">
                <div class="container-fluid wide">
                    <div class="row">
                        <div class="col-xs-12">

                            <!--  H1 HEADING-->
                            <h1 class="heading-inverse">Tweet @ <strong>Start</strong></h1>

                            <!-- Slider main container -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                                        <div class="swiper-container" id="tweet-slider">

                                            <!-- Tweets -->
                                            <ul class="swiper-wrapper tweet"></ul>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- If we need navigation buttons -->
                            <div id="tweet-prev" class="swiper-button-prev hidden-lg"><span class="icon-play-flip"></span></div>
                            <div id="tweet-next" class="swiper-button-next hidden-lg"><span class="icon-play"></span></div>

                            <!-- If we need pagination -->
                            <div id="tweet-paging" class="swiper-pagination"></div>

                        </div>
                    </div>
                </div>
            </section>

            <!-- QUICK SUPPORT -->
            <section id="quick-support" class="site-quick-support section-white">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">

                            <!-- H1 HEADING -->
                            <h1>Quick <strong>Support</strong></h1>

                            <!-- INFO -->
                            <div class="site-info">

                                <!-- BOX -->
                                <a href="tel:+91 123 456 7890" class="site-box">
                                    <!-- ICON -->
                                    <figure><i class="fa fa-phone"></i></figure>
                                    <!-- PARAGRAPH -->
                                    <p>+91 123 456 7890</p>
                                </a>

                                <!-- BOX -->
                                <a target="_blank" href="http://maps.google.com/?q=Location, 125 Business Evenue, Huston, USA" class="site-box">
                                    <!-- ICON -->
                                    <figure><i class="fa fa-map-marker"></i></figure>
                                    <!-- ADDRESS -->
                                    <address>Location, 125 Business Evenue, Huston, USA</address>
                                </a>

                                <!-- BOX -->
                                <a href="mailto:support@gmail.com" class="site-box last">
                                    <!-- ICON -->
                                    <figure><i class="fa fa-envelope"></i></figure>
                                    <!-- Mail -->
                                    <p>support@gmail.com</p>
                                </a>

                            </div>

                            <!-- CONTACT FORM -->
                            <form action="php/form.php" method="post" class="site-contact-form" id="myForm">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td width="380">
                                            <label>
                                                <input class="app-btn value-clear" type="text" name="app_name" placeholder="Name" required="required">
                                            </label>
                                        </td>
                                        <td width="380">
                                            <label>
                                                <input class="app-btn value-clear" type="email" name="app_email" placeholder="Email" required="required">
                                            </label>
                                        </td>
                                        <td rowspan="2" width="380">
                                            <label class="last">
                                                <textarea class="app-btn value-clear" name="app_message" placeholder="Message" required="required"></textarea>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="380">
                                            <label>
                                                <input class="app-btn value-clear" type="tel" name="app_phone" placeholder="Phone" required="required">
                                            </label>
                                        </td>
                                        <td width="380">
                                            <label>
                                                <input class="app-btn value-clear" type="url" name="app_website" placeholder="Website">
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <label class="move">
                                                <button id="form-submit-btn" class="app-btn" type="submit">Submit <i class="fa fa-spin fa-spinner"></i></button>
                                            </label>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>

                        </div>
                    </div>
                </div>
            </section>

            <!-- SUBSCRIBE -->
            <section class="site-subscribe">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">

                            <!-- BOX -->
                            <div class="site-box">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 no-space">

                                        <!-- PARAGRAPH -->
                                        <p>Subscribe to our Newsletter to get first Gift voucher by Start</p>
                                        <!-- END PARAGRAPH -->

                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 no-space">

                                        <!-- FORM -->
                                        <form action="#" method="post" class="site-form">
                                            <label>
                                                <input type="email" placeholder="" required="required">
                                            </label>
                                            <input type="submit" value="SUBMIT">
                                        </form>
                                        <!-- END FORM -->


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            @endsection
