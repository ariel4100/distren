<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
{{--    @dd($logos->text)--}}
    <title>Distren</title>
    <link rel="icon" href="{{ asset($logos->image ?? '') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script>
        document.__API_URL2 = '{{ url('/') }}';
    </script>
    <style>
        .distren-color{
            color: #8BBF40 !important;
        }
        .distren-fondo{
            background-color: #8BBF40 !important;
            color: white !important;
        }
        .distren-bold{
            font-family: 'Titillium Web', sans-serif;
        }
        .activo{
            border-bottom: 2px solid #8BBF40;
            color: #000000 !important;
        }
        .navbar.navbar-light .breadcrumb .nav-item .nav-link, .navbar.navbar-light .navbar-nav .nav-item .nav-link {
            color: #9FA3A5;
        }
        /*FOOTER*/
        .page-footer a{
            color: #DADAEA !important;
            font-size: 16px;
        }
        ::placeholder {
            color: #8BBF41 !important;
        }

        #sidebar ul li a {
            display: block;
            color: black;

        }

        /*CARRITO*/
        .table{
            color: unset;
        }
    </style>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @yield('style')
</head>
<body style="font-family: 'Titillium Web', sans-serif; color: #9FA3A5;">
<div id="app">
    @include('page.partials.header')
    <main class=" ">
        @yield('content')
    </main>
    @include('page.partials.footer')
</div>

<!-- Optional JavaScript -->
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/js/mdb.min.js"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script>
    new WOW().init();
</script>
@yield('script')
</body>
</html>