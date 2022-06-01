@extends('layouts.front', ['title' => 'Landscaping | Home'])
@section('body')
    <style>
        .swal2-container.swal2-center>.swal2-popup {
            width: 80vw;
        }
    </style>
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
                                <figure class="picframe invert transparent shadow-soft rounded">
										<span class="v-center">
											<span>
												<a id="play-video" class="video-play-button popup-youtube" href="{{ \App\Library\Utilities::getDataInJson('homepage_video_after_counter')['video_url'] ?? '' }}">
													<span></span>
												</a>
											</span>
										</span>
                                    <img src="{{ url((strlen(\App\Library\Utilities::getDataInJson('homepage_video_after_counter')['video_thumbnail_url'] ?? '') > 0) ? \App\Library\Utilities::getDataInJson('homepage_video_after_counter')['video_thumbnail_url'] : 'images/background/bg-9.jpg') }}" class="img-fullwidth" alt="">
                                </figure>
                            </div>
                    </div>
                </div>
            </section>

            <section class="text-white" id="section-how-it-works" data-bgimage="url(img/landscapes/grass.jpg) fixed center" data-stellar-background-ratio=".2" style="padding-bottom: 10px">
                <div class="container">
                    <div class="row align-items-center" style="place-content: center">
                        <div class="col-md-12 wow fadeInRight" data-wow-delay=".2s">
                            <h1 style="text-align: center" class="text-white">
                                Introducing: Michaelangelo's Project Tracker
                            </h1>
                        </div>
                        <div class="spacer-half"></div>
                        <div class="col-md-12 wow fadeInLeft" data-wow-delay=".4s" style="max-width: 850px;">
                            @if(strlen(\App\Library\Utilities::getDataInJson('homepage_our_process')['video_url'] ?? '') > 0)
                            <figure class="picframe invert transparent shadow-soft rounded" >
										<span class="v-center">
											<span>
												<a id="play-video" class="video-play-button popup-youtube" href="{{ \App\Library\Utilities::getDataInJson('homepage_our_process')['video_url'] ?? '' }}">
													<span></span>
												</a>
											</span>
										</span>
                                <img src="{{ url((strlen(\App\Library\Utilities::getDataInJson('homepage_our_process')['video_thumbnail_url'] ?? '') > 0) ? \App\Library\Utilities::getDataInJson('homepage_our_process')['video_thumbnail_url'] : 'images/background/bg-9.jpg') }}" class="img-fullwidth" alt="">
                            </figure>
                            @else
                                <a class="image-popup-no-margins" href="{{ url((strlen(\App\Library\Utilities::getDataInJson('homepage_our_process')['video_thumbnail_url'] ?? '') > 0) ? \App\Library\Utilities::getDataInJson('homepage_our_process')['video_thumbnail_url'] : 'images/background/bg-9.jpg') }}">
                                    <img style="min-height: 250px; object-fit: cover;" src="{{ url((strlen(\App\Library\Utilities::getDataInJson('homepage_our_process')['video_thumbnail_url'] ?? '') > 0) ? \App\Library\Utilities::getDataInJson('homepage_our_process')['video_thumbnail_url'] : 'images/background/bg-9.jpg') }}" class="img-responsive" alt="">
                                </a>
                            @endif
                        </div>
                        <p style="text-align: center" class="text-white">
                            {{ \App\Library\Utilities::getDataInJson('homepage_our_process')['description'] ?? '' }}
                        </p>
                    </div>
                </div>
            </section>
            <section class="text-white"   data-stellar-background-ratio=".2" style="padding-bottom: 10px">
                <div class="container">
                    <div class="row align-items-center" style="place-content: center">
                        <div class="col-md-6 col-sm-12 wow fadeInLeft" data-wow-delay=".4s" style="max-width: 850px;">
                            @if(strlen(@\App\Library\Utilities::getDataInJson('homepage_project_tracker')['landscape']['video_url'] ?? '') > 0)
                            <figure class="picframe invert transparent shadow-soft rounded" >
										<span class="v-center">
											<span>
												<a id="play-video" class="video-play-button popup-youtube" href="{{ @\App\Library\Utilities::getDataInJson('homepage_project_tracker')['landscape']['video_url'] ?? '' }}">
													<span></span>
												</a>
											</span>
										</span>
                                <img src="{{ url((strlen(@\App\Library\Utilities::getDataInJson('homepage_project_tracker')['landscape']['video_thumbnail_url'] ?? '') > 0) ? \App\Library\Utilities::getDataInJson('homepage_project_tracker')['landscape']['video_thumbnail_url'] : 'images/background/bg-9.jpg') }}" class="img-fullwidth" alt="">
                            </figure>
                            @else
                                <a class="image-popup-no-margins" href="{{ url((strlen(\App\Library\Utilities::getDataInJson('homepage_project_tracker')['landscape']['video_thumbnail_url'] ?? '') > 0) ? \App\Library\Utilities::getDataInJson('homepage_project_tracker')['landscape']['video_thumbnail_url'] : 'images/background/bg-9.jpg') }}">
                                    <img style="min-height: 250px; object-fit: cover;" src="{{ url((strlen(\App\Library\Utilities::getDataInJson('homepage_project_tracker')['landscape']['video_thumbnail_url'] ?? '') > 0) ? \App\Library\Utilities::getDataInJson('homepage_project_tracker')['landscape']['video_thumbnail_url'] : 'images/background/bg-9.jpg') }}" class="img-responsive" alt="">
                                </a>
                            @endif
                            <div class="spacer-half"></div>
                            <h1 style="text-align: center">
                                Landscape and Design Project
                            </h1>>
                        </div>
                        <div class="col-md-6 col-sm-12 wow fadeInLeft" data-wow-delay=".4s" style="max-width: 850px;">
                            @if(strlen(@\App\Library\Utilities::getDataInJson('homepage_project_tracker')['turf']['video_url'] ?? '') > 0)
                            <figure class="picframe invert transparent shadow-soft rounded" >
										<span class="v-center">
											<span>
												<a id="play-video" class="video-play-button popup-youtube" href="{{ @\App\Library\Utilities::getDataInJson('homepage_project_tracker')['turf']['video_url'] ?? '' }}">
													<span></span>
												</a>
											</span>
										</span>
                                <img src="{{ url((strlen(@\App\Library\Utilities::getDataInJson('homepage_project_tracker')['turf']['video_thumbnail_url'] ?? '') > 0) ? @\App\Library\Utilities::getDataInJson('homepage_project_tracker')['turf']['video_thumbnail_url'] : 'images/background/bg-9.jpg') }}" class="img-fullwidth" alt="">
                            </figure>
                            @else
                                <a class="image-popup-no-margins" href="{{ url((strlen(\App\Library\Utilities::getDataInJson('homepage_project_tracker')['turf']['video_thumbnail_url'] ?? '') > 0) ? \App\Library\Utilities::getDataInJson('homepage_project_tracker')['turf']['video_thumbnail_url'] : 'images/background/bg-9.jpg') }}">
                                    <img style="min-height: 250px; object-fit: cover;" src="{{ url((strlen(\App\Library\Utilities::getDataInJson('homepage_project_tracker')['turf']['video_thumbnail_url'] ?? '') > 0) ? \App\Library\Utilities::getDataInJson('homepage_project_tracker')['turf']['video_thumbnail_url'] : 'images/background/bg-9.jpg') }}" class="img-responsive" alt="">
                                </a>
                            @endif
                            <div class="spacer-half"></div>
                            <h1 style="text-align: center">
                                Maintenance and Turf Care
                            </h1>>
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
                                <a href="{{ $oService->url }}" class="btn-line-black">Learn more</a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>
            <!-- section close -->

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


            <section id="call-to-action" class="text-dark call-to-action padding40 text-light bg-color"aria-label="cta">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-7">
                            <h3 class="size-2 no-margin">Make Payments</h3>
                        </div>

                        <div class="col-lg-4 col-md-5 text-right">
                            <a onclick="visitPayment()" href="javascript:;" class="btn-line-white">Financing</a>
                            <a target="_blank" href="https://portal.icheckgateway.com/landscapesandmore/" class="btn-line-white">Credit Card</a>
                        </div>
                    </div>
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
    <script>
        function visitPayment() {
            Swal.fire({
                html: '<iframe width="100%" frameborder="0" scrolling="no" src="/payments" onload="resizeIframe(this)"></iframe>',
                showCancelButton: false,
                showConfirmButton: false,
                showCloseButton: true,
                allowOutsideClick: false,
            });
        }
        function resizeIframe(obj) {
            obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
        }
    </script>
@endsection
