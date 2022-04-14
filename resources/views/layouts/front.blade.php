<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <![endif]-->

        <!-- CSS Files
        ================================================== -->
        <link id="bootstrap" href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link id="bootstrap-grid" href="{{ url('css/bootstrap-grid.min.css') }}" rel="stylesheet" type="text/css" />
        <link id="bootstrap-reboot" href="{{ url('css/bootstrap-reboot.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ url('css/jpreloader.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ url('css/animate.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ url('css/plugin.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ url('css/owl.carousel.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ url('css/owl.theme.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ url('css/owl.transitions.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ url('css/magnific-popup.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ url('css/style.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ url('css/twentytwenty.css') }}" type="text/css">

        <!-- custom background -->
        <link rel="stylesheet" href="{{ url('css/bg.css') }}" type="text/css">

        <!-- color scheme -->
        <link rel="stylesheet" href="{{ url('css/colors/brown.css') }}" type="text/css" id="colors">
        <link rel="stylesheet" href="{{ url('css/color.css') }}" type="text/css">

        <!-- load fonts -->
        <link rel="stylesheet" href="{{ url('fonts/font-awesome/css/font-awesome.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ url('fonts/elegant_font/HTML_CSS/style.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ url('fonts/et-line-font/style.css') }}" type="text/css">

        <!-- custom font -->
        <link rel="stylesheet" href="{{ url('css/font-style-2.css') }}" type="text/css">

        @livewireStyles
        <script src="{{ url('js/jquery.min.js') }}"></script>
        <script src="//kit.fontawesome.com/304ef5f8a1.js" crossorigin="anonymous"></script>
        @yield('extra-css')

        <title>{{ $title ?? '' }}</title>
    </head>
    <body class="@yield('body-class') de_light" id="homepage">
        @yield('body')
    </body>
    <!-- Javascript Files
    ================================================== -->
    <script src="{{ url('js/jpreLoader.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('js/jquery.isotope.min.js') }}"></script>
    <script src="{{ url('js/easing.js') }}"></script>
    <script src="{{ url('js/jquery.flexslider-min.js') }}"></script>
    <script src="{{ url('js/jquery.scrollto.js') }}"></script>
    <script src="{{ url('js/owl.carousel.js') }}"></script>
    <script src="{{ url('js/jquery.countTo.js') }}"></script>
    <script src="{{ url('js/classie.js') }}"></script>
    <script src="{{ url('js/video.resize.js') }}"></script>
    <script src="{{ url('js/wow.min.js') }}"></script>
    <script src="{{ url('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ url('js/enquire.min.js') }}"></script>
    <script src="{{ url('js/designesia.js') }}"></script>
    <script src="{{ url('js/jquery.event.move.js') }}"></script>
    <script src="{{ url('js/jquery.twentytwenty.js') }}"></script>

    <!-- RS5.0 Core JS Files -->
    <script src="{{ url('revolution/js/jquery.themepunch.tools.min.js?rev=5.0') }}"></script>
    <script src="{{ url('revolution/js/jquery.themepunch.revolution.min.js?rev=5.0') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
    @yield('extra-js')
</html>
