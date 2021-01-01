<!DOCTYPE HTML>
<html lang="en">

    <head>
        <title>@yield('title'){{ config('app.name', 'Laravel') }}</title>
        <meta http-equiv="X-UA-Compatible"
            content="IE=edge">
        <meta name="viewport"
            content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">


        <!-- Font -->

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500"
            rel="stylesheet">


        <!-- Stylesheets -->

        <link href="{{ asset('assets/fontend') }}/common-css/bootstrap.css"
            rel="stylesheet">

        <link href="{{ asset('assets/fontend') }}/common-css/swiper.css"
            rel="stylesheet">

        <link href="{{ asset('assets/fontend') }}/common-css/ionicons.css"
            rel="stylesheet">

        @stack('css')

    </head>

    <body>

        @include('layouts.fontend.partial.header')

        @yield('content')

        @include('layouts.fontend.partial.footer')

        <!-- SCIPTS -->

        <script src="{{ asset('assets/fontend') }}/common-js/jquery-3.1.1.min.js"></script>

        <script src="{{ asset('assets/fontend') }}/common-js/tether.min.js"></script>

        <script src="{{ asset('assets/fontend') }}/common-js/bootstrap.js"></script>

        <script src="{{ asset('assets/fontend') }}/common-js/swiper.js"></script>

        <script src="{{ asset('assets/fontend') }}/common-js/scripts.js"></script>

    </body>

</html>
