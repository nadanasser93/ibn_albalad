<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no"/>
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Laravel</title>

        <!-- Fonts 
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        -->
        <!-- main -->
        
        <meta name="description" content="App Landing Page">
        <meta name="author" content="">
        <title>App Landing Page</title>

        <!---------------------------------------------------------------------------------------------- STYLESHEETS -->
        <link rel="icon" href="{{ asset('images/logo.png') }}">                                <!-- Browser Tab Icon -->
        <link href="{{ asset('css/main/bootstrap.min.css') }}" rel="stylesheet">                    <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('css/main/font-awesome.min.css') }}">                 <!-- Font-Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('css/main/icomoon.min.css') }}">                      <!-- iconmoon Icons -->
        <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main/swiper.min.css') }}">                       <!-- Carousel slider -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">                            <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('css/main/google-fonts.css') }}">                     <!-- Google font (Poppins) font face -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>   <!-- Google font Montserrat -->
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>      <!-- Google font Source Sans Pro -->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Styles -->
        <style>
            
        </style>
    </head>
    <body>
    @yield('content')
            <!-- FOOTER -->
            <footer class="site-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">

                            <!-- LOGO -->
                            <div class="site-logo">
                                <a href="index.html">
                                    <img src="images/logo.png" alt="Logo">
                                    <span>Start</span>
                                </a>
                            </div>
                            <!-- END LOGO -->

                            <!-- SOCIAL ICONS -->
                            <div class="site-social-icons">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                            <!-- END SOCIAL ICONS -->

                            <!-- COPYRIGHT -->
                            <div class="site-copyright">
                                <p>© Copyright 2016 Start. Designed by Kalanidhi Themes</p>
                            </div>

                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <!-- END WRAPPER -->
        <script src="{{ asset('js/app.js') }}"></script>
        <!-------------------------------------------------------------------------- SCRIPTS -->
        <script src="{{ asset('js/main/jquery-1.12.4.min.js') }}"></script>                         <!-- JQuery -->
        <script src="{{ asset('js/main/loadingoverlay.min.js') }}"></script>                        <!-- Preloader -->
        <script src="{{ asset('js/main/swiper.jquery.min.js') }}"></script>                         <!-- Carousel slider -->
        <script src="{{ asset('js/main/jquery.mCustomScrollbar.concat.min.js') }}"></script>        <!-- Custom scroll bar -->
        <script src="{{ asset('js/main/modernizr-custom.min.js') }}"></script>                      <!-- Modernizr -->
        <script src="{{ asset('js/main/imagesloaded.pkgd.min.js') }}"></script>                     <!-- Header Slider -->
        <script src="{{ asset('js/main/hammer.min.js') }}"></script>                                <!-- Header Slider -->
        <script src="{{ asset('js/main/sequence.min.js') }}"></script>                              <!-- Header Slider -->
        <script src="{{ asset('js/main/tweetie.min.js') }}"></script>                               <!-- Twitter Feed -->
        <script src="{{ asset('js/main/jquery.countimator.min.js') }}"></script>                    <!-- Counter -->
        <script src="{{ asset('js/main/bootstrap.min.js') }}"></script>                             <!-- Bootstrap -->
        <script src="{{ asset('js/main/jquery.sticky.min.js') }}"></script>                         <!-- Sticky Header -->
        <script src="{{ asset('js/main/jquery.scrollUp.min.js') }}"></script>                       <!-- scroll top -->
        <script src="{{ asset('js/main/style.js') }}"></script>                                     <!-- Template Changeable Plugin Options -->
        <script>
                $(document).mousemove(function(event) {
            windowWidth = $(window).width();
            windowHeight = $(window).height();
            
            mouseXpercentage = Math.round(event.pageX / windowWidth * 100);
            mouseYpercentage = Math.round(event.pageY / windowHeight * 100);
            
            $('.radial-gradient').css('background', 'radial-gradient(at ' + mouseXpercentage + '% ' + mouseYpercentage + '%, rgba(52, 152, 219, 0.78) 5%, rgba(32, 62, 81, 0) 35%)');
            });
        </script>
        </body>
</html>