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
        <link rel="stylesheet" href="{{ url('css/jquery-ui.css') }}" type="text/css">

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
        <script src="//kit.fontawesome.com/304ef5f8a1.js" crossorigin="anonymous"></script>
        @yield('extra-css')

        <title>{{ $title ?? '' }}</title>
    </head>
    <body class="@yield('body-class') de_light" id="homepage">
        @yield('body')
        @php
            $aAnnouncements = \App\Library\Utilities::getDataInJson('homepage_announcements')['formatted'] ?? [];
        @endphp
        @if(count($aAnnouncements) > 0)
            <div id="announcement-icon" title="announcement">
                <div style="position: absolute;background-size: cover;right: 0;width: 20px;height: 20px;font-size: 15px;color: white;border-radius: 10px;background: salmon;"> <span>{{ count($aAnnouncements) }}</span> </div>
                <i class="fa fa-bullhorn text-white" style="margin-top: 22px;font-size: 25px;"></i>
            </div>
            <div id="sidebar-announcements">
                <section id="announcements" style="height: 100%; padding-top: 20px;">
                    <div class="item">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="pricing-s1 light mb30" style="background-size: cover;min-height: 80%;background: #eeeeee; border-radius: 15px">
                                        <div class="top">
                                            <h2 style="margin-bottom: unset">Announcements <i class="fa fa-bullhorn " style="font-size: 25px"></i></h2>
                                        </div>
                                        <div class="bottom">
                                            <ul>
                                                @foreach($aAnnouncements as $sItem)
                                                    <li title="{{ preg_replace('/\[(.*?)\]\s*\((.*?)\)/', '$1', $sItem) }}"><i class="icon_check"></i> {!! preg_replace('/\[(.*?)\]\s*\((.*?)\)/', '<a target="_blank" href="$2">$1</a>', $sItem) !!} </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @endif
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
    <script src="{{ url('js/jquery-ui.js') }}"></script>

    <!-- RS5.0 Core JS Files -->
    <script src="{{ url('revolution/js/jquery.themepunch.tools.min.js?rev=5.0') }}"></script>
    <script src="{{ url('revolution/js/jquery.themepunch.revolution.min.js?rev=5.0') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
    @yield('extra-js')
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        $(document).ready(function() {
            let sAnnouncementIcon = '#announcement-icon';
            let sAnnouncementSideBar = '#sidebar-announcements';
            $(sAnnouncementIcon).click(function() {
                if ($(sAnnouncementSideBar).is(':visible') === false) {
                    $(sAnnouncementSideBar).show("slide", {direction: 'down'}, 500);
                    $(sAnnouncementIcon + ' i').addClass('fa-times');
                } else {
                    $(sAnnouncementSideBar).hide("slide", {direction: 'down'}, 500);
                    $(sAnnouncementIcon + ' i').removeClass('fa-times');
                }
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
        });
    </script>
    <!--End of Tawk.to Script-->
</html>
