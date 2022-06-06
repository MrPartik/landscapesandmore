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
        <link rel="stylesheet" href="{{ url('css/colors/green.css') }}" type="text/css" id="colors">
        <link rel="stylesheet" href="{{ url('css/color.css') }}" type="text/css">

        <!-- load fonts -->
        <link rel="stylesheet" href="{{ url('fonts/font-awesome/css/font-awesome.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ url('fonts/elegant_font/HTML_CSS/style.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ url('fonts/et-line-font/style.css') }}" type="text/css">

        <!-- custom font -->
        <link rel="stylesheet" href="{{ url('css/font-style-2.css') }}" type="text/css">

        @livewireStyles
        <script src="{{ url('js/jquery.min.js') }}"></script>
        <link href="{{ url('css/jquery.announcement.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ url('js/jquery.announcement.min.js') }}" type="text/javascript"></script>
        <script src="//kit.fontawesome.com/304ef5f8a1.js" crossorigin="anonymous"></script>
        @yield('extra-css')

        <title>{{ $title ?? '' }}</title>
    </head>
    <body class="@yield('body-class') de_light" id="homepage">
        @yield('body')
        <ul id="ticker">
            <li>
                Lorem ipsum dolor sit amet.
                <br />
                <strong>Ut enim ad:</strong> Minim veniam, quis nostrud exercitation ullamco.
                <br /> Duis aute irure dolor <a href="http://devs.forumvi.com" target="_blank">DEVs forumvi</a>.
            </li>
            <li>
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </li>
            <li>
                jQuery plugin announcement
                <br /> By <a href="http://baivong.github.io" target="_blank">Zzbaivong</a>
            </li>
        </ul>
    </body>
    <!-- Javascript Files
    ================================================== -->
    <script src="{{ url('js/jpreLoader.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
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
    <script src="{{ url('js/jquery.twentytwenty.js') }}"></script>

    <!-- RS5.0 Core JS Files -->
    <script src="{{ url('revolution/js/jquery.themepunch.tools.min.js?rev=5.0') }}"></script>
    <script src="{{ url('revolution/js/jquery.themepunch.revolution.min.js?rev=5.0') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
    @yield('extra-js')
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        $(document).ready(function() {

            $('#ticker').announcement({

                title: 'Announcement', // String

                showToggle: true, // Boolean
                showClose: true, // Boolean

                autoHide: 'auto', // Number [s] (0: disable, 'auto': when finished slideshow)
                autoClose: 0, // Number [s] (0: disable, 'auto': when finished slideshow)

                position: 'bottom-left', // 'bottom-right' | 'bottom-left'

                width: 300, // 'auto' | Number [px]
                height: 'auto', // 'auto' | Number [px]
                zIndex: 99999, // Number

                speed: 10, // Number [s] (0: disable autorun)

                effect: 'fading' // 'fading'
                // 'zoom-in' | 'zoom-out'
                // 'rotate-left' | 'rotate-right'
                // 'move-top' | 'move-right' | 'move-bottom' | 'move-left'
                // 'skew-top' | 'skew-right' | 'skew-bottom' | 'skew-left'
                // 'random' | 'shuffle'
            });
        });
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function() {
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/61bb3e93c82c976b71c1c1b0/1fn1mos74';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
            Tawk_API.onLoad = function() {
                setTimeout(function() {
                    if(Tawk_API.isChatMaximized() === true) {
                        Tawk_API.toggle();
                    }
                }, 300)
            };
    </script>
    <!--End of Tawk.to Script-->
</html>
