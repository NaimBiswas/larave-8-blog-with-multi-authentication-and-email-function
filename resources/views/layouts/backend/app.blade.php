<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible"
            content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
            name="viewport">
        <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
        <!-- Favicon-->
        <link rel="icon"
            href="favicon.ico"
            type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext"
            rel="stylesheet"
            type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
            rel="stylesheet"
            type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="{{ asset('assets/backend') }}/plugins/bootstrap/css/bootstrap.css"
            rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="{{ asset('assets/backend') }}/plugins/node-waves/waves.css"
            rel="stylesheet" />

        <!-- Animation Css -->
        <link href="{{ asset('assets/backend') }}/plugins/animate-css/animate.css"
            rel="stylesheet" />
        {{--
        <!-- Morris Chart Css-->
        <link href="{{ asset('assets/backend') }}/plugins/morrisjs/morris.css"
        rel="stylesheet" /> --}}

        @stack('css')
        <!-- Custom Css -->
        <link href="{{ asset('assets/backend') }}/css/style.css"
            rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="{{ asset('assets/backend') }}/css/themes/all-themes.css"
            rel="stylesheet" />
    </head>

    <body class="theme-red">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        <!-- Search Bar -->
        <div class="search-bar">
            <div class="search-icon">
                <i class="material-icons">search</i>
            </div>
            <input type="text"
                placeholder="START TYPING...">
            <div class="close-search">
                <i class="material-icons">close</i>
            </div>
        </div>
        <!-- #END# Search Bar -->
        {{-- Header Part  --}}
        @include('layouts.backend.partial.header')
        <section>
            @include('layouts.backend.partial.sidebar')
        </section>


        <section class="content">
            @yield('content')
        </section>
        <!-- include summernote css/js -->
        <!-- Jquery Core Js -->

        <script src="{{ asset('assets/backend') }}/plugins/jquery/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <!-- Bootstrap Core Js -->
        <script src="{{ asset('assets/backend') }}/plugins/bootstrap/js/bootstrap.js"></script>
        <!-- Select Plugin Js -->
        <script src="{{ asset('assets/backend') }}/plugins/bootstrap-select/js/bootstrap-select.js"></script>
        <!-- Slimscroll Plugin Js -->
        <script src="{{ asset('assets/backend') }}/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <!-- Waves Effect Plugin Js -->
        <script src="{{ asset('assets/backend') }}/plugins/node-waves/waves.js"></script>
        <!-- Jquery CountTo Plugin Js -->
        <script src="{{ asset('assets/backend') }}/plugins/jquery-countto/jquery.countTo.js"></script>
        <!-- Sparkline Chart Plugin Js -->

        </head>
        @stack('js')
        {{-- Summer Note Text Editor  --}}

        {{-- End of SummerNote Text Editor  --}}
        <!-- Custom Js -->
        <script src="{{ asset('assets/backend') }}/js/admin.js"></script>
        <script src="{{ asset('assets/backend') }}/js/pages/index.js"></script>
        <!-- Demo Js -->
        <script src="{{ asset('assets/backend') }}/js/demo.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css"
            rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>


        <script>
            $('#summernote').summernote({
            placeholder: 'Enter Your Post Description',
            tabsize: 2,
            height: 400
          });
        </script>
    </body>

</html>
