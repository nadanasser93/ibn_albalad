<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.head')
<style>
    .container {
        position: relative;

    }

    .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
        z-index: -1;
        background: #e67817;
    }

    .middle {
        opacity: 1;
        transition: .5s ease;
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        display: none!important;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;

    }
    i{
        color: #fff!important;
    }
    img:hover{
        opacity: 0.5;
    }
    .overlay:hover  {
        opacity: 0.5;
        background: #e67817;
        z-index: -1;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }
    .col-4:hover .middle{
        display: block!important;
    }
    .col-12:hover .middle{
        display: block!important;
    }
    .middle:hover .middle{
        display:block!important ;
    }
    .image-item{
        cursor:grab;
    }
    .white{
        color:#fff;
    }
    a.main_image i {
        color:yellow !important;
    }
    .image.main_image{
        box-shadow: 0 7px 16px rgba(0,0,0,.6);
        -webkit-box-shadow: 0 7px 16px rgba(0,0,0,.6);
        -moz-box-shadow: 0 7px 16px rgba(0,0,0,.6);
        -ms-box-shadow: 0 7px 16px rgba(0,0,0,.6);
        -o-box-shadow: 0 7px 16px rgba(0,0,0,.6);
    }

</style>
<body>
<div id="app">
    @stack('modals')

    @include('includes.admin.header')



    <main class="py-4">

        @yield('content')
    </main>
    @include('includes.footer')
</div>

@include('includes.admin.bottom')
<script>
    $(function () {

    });
</script>
@stack('footer-scripts')

</body>
</html>
