<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>NyansSearchppp</title>

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('vendor/slick/slick.min.js') }}"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Righteous|Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kosugi+Maru|Sawarabi+Gothic&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/slick/slick-theme.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">



</head>
<body>
    @include('admin.includes.header')
    @yield('content')



    @include('includes.hamburger')

   @include('admin.includes.footer')
   <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
   <script>
       $(function(){
            $('.js-toggle-sp-menu').on('click', function () {
                $(this).toggleClass('active');
                $('.js-toggle-sp-menu-target').toggleClass('active');
            });

            $('.js-nav-close').on('click', function(){
               $('.js-toggle-sp-menu').toggleClass('active');
               $('.js-toggle-sp-menu-target').toggleClass('active');
            });
       });

   </script>
</body>
</html>
