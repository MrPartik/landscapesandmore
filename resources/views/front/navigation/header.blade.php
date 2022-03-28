
<!-- header begin -->
<header class="{{ (isset($auto_show) === false || $auto_show === true) ? 'autoshow' : '' }} header-light">
    <div class="info">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="column">Working Hours Monday - Friday <span class="id-color"><strong>08:00-16:00</strong></span></div>
                    <div class="column">Toll Free <span class="id-color"><strong>1800.899.900</strong></span></div>
                    <!-- social icons -->
                    <div class="column social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-rss"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-envelope-o"></i></a>
                    </div>
                    <!-- social icons close -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- logo begin -->
                <div id="logo">
                    <a href="{{ url('/') }}">
                        <img class="logo" src="{{ url('/images-main/logo/logo-wide-green.png') }}" alt="">
                    </a>
                </div>
                <!-- logo close -->

                <!-- small button begin -->
                <span id="menu-btn"></span>
                <!-- small button close -->

                <!-- mainmenu begin -->
                <nav>
                    <ul id="mainmenu">
                        <li><a href="{{ url('/') }}">Home<span></span></a></li>
                        <li><a href="{{ url('/process') }}">Our Process</a></li>
                        <li><a href="javascript:">Projects</a></li>
                        <li><a href="javascript:">Blog</a></li>
                        <li><a href="javascript:">Contact Us</a></li>
                        <li><a href="javascript:">Warranty</a></li>
                    </ul>
                </nav>

                <!-- mainmenu close -->
            </div>
        </div>
    </div>
</header>
<!-- header close -->
