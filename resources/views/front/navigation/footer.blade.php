
<!-- footer begin -->
<footer class="text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3>About Us</h3>
                Our Philosophy is to engage the client in the creative process of their landscape design, establish a plan that includes hardscapes and horticulture that fulfill that vision, and enhance the landscape sustainably, with minimal environmental impact.
            </div>

            <div class="col-md-3">
                <h3>Contact Us</h3>
                <div class="widget widget-address">
                    <address>
                        <span>2204 Justin Trail Suite 1 Alpharetta, GA 30004</span>
                        <span><strong>Phone:</strong>{{ env('WEBSITE_PHONE_NO', '(770) 209-2344') }}   </span>
                        <span><strong>Email:</strong><a href="mailto:info@landscapesandmore.com">info@landscapesandmore.com</a></span>
                        <span><strong>Web:</strong><a href="{{ env('APP_URL') }}/">{{ env('APP_URL') }}</a></span>
                    </address>
                </div>
            </div>

            <div class="col-md-3">
                <div class="widget widget_recent_post">
                    <h3>Our Services</h3>
                    <ul>
                        @foreach(\App\Models\Services::all()->where('type', 'commercial') as $oService)
                            <li><a target="_blank" href="{{ $oService->url }}">{{ $oService->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="widget widget_recent_post">
                    <h3>Careers </h3>
                    <ul>
                        @foreach(array_filter(explode(',', env('CAREERS_AVAILABLE_POSITION', ''))) ?? [] as $sPosition)
                            <li><a href="/careers">• {{ $sPosition }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="subfooter">
        <div class="container">
            <div class="row align-items-middle">
                <div class="col-md-3">
                    <a href="{{ url('/') }}">
                        <img class="logo" src="{{ url(env('LOGO_LIGHT_URL') ?? '/img/logo/logo-wide-white.png') }}" alt="">
                    </a>
                </div>

                <div class="col-md-6 text-center">
                </div>

                <div class="col-md-3 text-right">
                    <div class="social-icons">
                        <a href="https://www.facebook.com/increaseyourlivingspace/"><i class="fa fa-facebook fa-lg"></i></a>
                        <a href="https://www.instagram.com/michaelangeloslandscape/"><i class="fa fa-instagram fa-lg"></i></a>
                        <a href="https://www.houzz.com/pro/mlores"><i class="fa fa-houzz fa-lg"></i></a>
                        <a href="https://www.youtube.com/channel/UC4CydLMJETuBbt4AC9JaHaA"><i class="fa fa-youtube fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" id="back-to-top"></a>
</footer>
<!-- footer close -->
