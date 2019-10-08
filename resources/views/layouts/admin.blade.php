<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

   <link rel="stylesheet" href="{{ asset('vendor/fonts/fontawesome/css/fontawesome-all.css')}}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Righteous|Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('vendor/jquery/jquery-3.3.1.min.js')}}" ></script>
</head>
<body>

            @include('admin.includes.header')
            @include('admin.includes.adminHamburger')

            
            <div class="u-flex">
            @include('admin.includes.sidebar')
            <!-- ============================================================== -->
            <!-- end left sidebar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- wrapper  -->
            <!-- ============================================================== -->
            @yield('content')

            <!-- ============================================================== -->
            <!-- end wrapper  -->
            <!-- ============================================================== -->

            </div>
            @include('admin.includes.footer')




    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="{{ asset('js/custom.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.u-flash_message').slideDown('slow');

            setTimeout(function(){
                $('.u-flash_message').slideUp('slow');
            },5000);
        });

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
