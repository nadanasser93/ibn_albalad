<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" href="{{asset('frontend/images/Logo.png')}}" type="image/x-icon"/>
    <title>{{ config('app.name', 'Ibn Albalad') }}</title>

    <!-- Scripts -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    {{--  <link href="{{ mix('css/datatables.css') }}" rel="stylesheet">  --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    @stack('styles')
    <style>
        .error{
            color:red;
        }
        .img-container {
            position: relative;
            margin-bottom: 15px;
            /*Desired Aspect Ratio*/
        }

        .img-container:before {
            display: block;
            content: "";
            width: 100%;
            padding-top: 56.25%;
        }

        .img-container>.content {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

    </style>

</head>

