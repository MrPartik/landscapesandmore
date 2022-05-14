@extends('layouts.front', ['title' => 'Landscaping | Home'])
@section('body')
    <div id="wrapper">
        @include('front.navigation.header', ['active' => 'home'])
        <!-- content begin -->
        <div id="content" class="no-bottom no-top">
            <!-- parallax section -->
            <section style="background: linear-gradient(rgba(0,0,0,0.4), rgba(134,109,70,0.4)), url('{{ url(env('BANNER_IMAGE_URL', 'img/landscapes/frontyard.png')) }}') center fixed" class="full-height" data-type="background">
                <div class="center-y text-center">
                    <div class="spacer-double"></div>
                    <h1 class="text-white">Creating Masterpieces</h1>
                    <div id="text-carousel" class="owl-carousel owl-theme text-slider style-2 border-deco">
                        @foreach(array_filter(explode(',', env('BANNER_DESCRIPTION', 'Install Landscape and Design, Maintenance Services, Turf Care Services'))) as $sDescription)
                            <div class="item">{{ $sDescription }}</div>
                        @endforeach
                    </div>
                    <div class="spacer-single"></div>
                    <a href="#section-services" class="btn-line-white border-op-20">View Our Services</a>
                </div>
            </section>
            <!-- parallax section close -->

            <section id="section-text">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-12 wow fadeInRight" data-wow-delay=".2s">
                            <div class="de_count ultra-big s2 text-center">
                                <h3 class="timer" data-to="{{ date('Y') -  2002 }}" data-speed="2000"></h3>
                                <span class="text-black">Years of Experience</span>
                            </div>
                        </div>
                        <div class="col-lg-4 p-lg-5  mb-sm-30 wow fadeInRight" data-wow-delay=".4s">
                            <h2 class="style-2 id-color">Welcome</h2>
                            <h2>Your Trusted Local Landscaping Company</h2>
                        </div>

                        <div class="col-lg-4 wow fadeInRight" data-wow-delay=".6s">
                            <p>
                                Sustainability is the key to year ’round landscaping, and the experts of Michaelangelo’s Sustainable Landscape and Design Group are proud to deliver innovative, cost-effective, and environmentally responsible landscape solutions to every project. Whether you’re looking for an irrigation system installation, or wanting to get rid of crab grass, you can rest assured that your landscape will maintain its sophistication over time with our professional landscaping services, lawn care, turf care, and management and maintenance services.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="text-white" id="section-how-it-works" data-bgimage="url(images-interior-landing/bg/2.jpg) fixed center" data-stellar-background-ratio=".2">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-5 wow fadeInRight" data-wow-delay=".2s">
                            <h2 class="style-2"><span class="id-color">Discover</span></h2><br>
                            <h2 class="text-white">How It Works?</h2>
                            <p class="lead">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <div class="spacer-half"></div>
                            <a href="#" class="btn-line-white">Contact Us Now</a>
                        </div>
                        <div class="col-md-6 offset-md-1 wow fadeInLeft" data-wow-delay=".4s">
                            <figure class="picframe invert transparent shadow-soft rounded">
										<span class="v-center">
											<span>
												<a id="play-video" class="video-play-button popup-youtube" href="https://www.youtube.com/watch?v=4HwORLPdAXg">
													<span></span>
												</a>
											</span>
										</span>
                                <img src="{{ url('images/background/bg-9.jpg') }}" class="img-fullwidth" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
            </section>
            @livewire('home')
            <style>
                .owl-item.active.center {
                    text-align: -webkit-center;
                }
            </style>
            <!-- section close -->

            <!-- section begin -->
            <section id="section-services" aria-label="section-services">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                            <h1>Services we offer</h1>
                            <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                            <div class="spacer-single"></div>
                        </div>
                        @foreach(\App\Models\Services::all() as $oService)
                            <div class="col-md-4  mb-4 wow fadeInLeft">
                                <a class="image-popup-no-margins" href="{{ url($oService->image) }}">
                                    <img style="min-height: 250px; object-fit: cover;" src="{{ url($oService->image) }}" class="img-responsive" alt="">
                                </a>
                                <div class="spacer-single"></div>
                                <h3><span class="id-color">{{ $oService->title }}</h3>
                                {{ $oService->description }}
                                <div class="spacer-single"></div>
                                <a href="{{ $oService->url }}" class="btn-line-black">Get Started Now!</a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>
            <!-- section close -->

            <!-- section begin -->
            <section id="call-to-action" class="text-dark call-to-action padding40 text-light bg-color"aria-label="cta">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-7">
                            <h3 class="size-2 no-margin">Get In Touch With Us Today</h3>
                        </div>

                        <div class="col-lg-4 col-md-5 text-right">
                            <a href="/contact-us" class="btn-line-white">Contact Us Now</a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="de-map" class="no-top no-bottom" aria-label="map-container">
                <div class="map-container map-fullwidth">
                    <div wire:ignore id="map"></div>
                </div>
            </section>

        </div>
        @include('front.navigation.footer')
    </div>
@endsection
@section('extra-css')

    <link rel="stylesheet" href="{{ url('leaflet/leaflet.css') }}" />
    <script src="{{ url('leaflet/leaflet-src.js') }}"></script>
    <script src="{{ url('leaflet/esri-leaflet.js') }}"></script>
    <script src="{{ url('leaflet/esri-leaflet-geocoder.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js" async defer></script>
    {{--    <script async src="{{ url('js/google-api/maps.js') }}" ></script>--}}
    <script type="text/javascript" src="{{ url('leaflet/googlemapMutant.js') }}"></script>

    <script src="{{ url('leaflet/leaflet-draw/Toolbar.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/Tooltip.js') }}"></script>
@endsection
