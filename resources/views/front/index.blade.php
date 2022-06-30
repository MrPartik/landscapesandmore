@extends('layouts.front', [
    'title' => 'Home' . ' | ' . (env('APP_TITLE') ?? 'Michaelangelo\'s Sustainable Landscape and Design Group' ) ,
    'description' => 'Michaelangelo’s provides one of the highest-quality landscapes and design services in Atlanta. We offer landscaping and design, maintenance, and turf care services.'
    ])
@section('body')
    <style>
        .swal2-container.swal2-center>.swal2-popup {
            width: 50vw;
        }

        @media only screen and (min-width: 300px) and (max-width: 767px) {
            .swal2-container.swal2-center>.swal2-popup {
                width: 100vw !important;
            }
        }
    </style>
    <div id="wrapper">
        @include('front.navigation.header', ['active' => 'home'])
        <!-- content begin -->
        <div id="content" class="no-bottom no-top">
            <!-- parallax section -->
            @if(env('BANNER_MEDIA_TYPE', 'image') === 'video-external')
                <section class="full-height no-padding" data-speed="5" data-type="background">
                    <div class="de-video-container">
                        <div class="de-video-content center-y text-center">
                                <h1 class="text-white">Creating Masterpieces</h1>
                                <div id="text-carousel" class="owl-carousel owl-theme text-slider style-2 border-deco">
                                    @foreach(array_filter(explode(',', env('BANNER_DESCRIPTION', 'Install Landscape and Design, Maintenance Services, Turf Care Services'))) as $sDescription)
                                        <div class="item">{{ $sDescription }}</div>
                                    @endforeach
                                </div>
                                <div class="spacer-single"></div>
                                <a href="#section-services" class="btn-line-white border-op-20">View Our Services</a>
                        </div>
                        <div class="de-video-overlay"></div>
                        <!-- load your video here -->
                        <video autoplay="" loop="" muted="" poster="{{ url('/img/landscapes/zooming-house.jpg') }}">
                            <source src="{{ env('BANNER_IMAGE_URL') }}" type="" />
                        </video>

                    </div>
                    <a href="#section-text" class="scroll-to">
                    <span class="mouse">
						 <span class="scroll"></span>
                    </span>
                    </a>
                </section>
            @elseif(env('BANNER_MEDIA_TYPE', 'image') === 'video-youtube')
                <section id="section-video-bg" class="full-height no-padding" data-speed="5" data-type="background">
                    <div class="de-video-container">
                        <div class="de-video-content center-y text-center">
                            <h1 class="text-white">Creating Masterpieces</h1>
                            <div id="text-carousel" class="owl-carousel owl-theme text-slider style-2 border-deco">
                                @foreach(array_filter(explode(',', env('BANNER_DESCRIPTION', 'Install Landscape and Design, Maintenance Services, Turf Care Services'))) as $sDescription)
                                    <div class="item">{{ $sDescription }}</div>
                                @endforeach
                            </div>
                            <div class="spacer-single"></div>
                            <a href="#section-services" class="btn-line-white border-op-20">View Our Services</a>
                        </div>
                        <div class="de-video-overlay"></div>
                        <!-- load your video here -->
                        <div class="mk-video-mask"></div>

                        <!-- Video Background - Here you need to replace the videoURL with your youtube video URL -->
                        <a id="bgndVideo" class="player" data-property="{videoURL:'{{ env('BANNER_IMAGE_URL', 'Pn1zipY-sqk') }}',containment:'#section-video-bg',autoPlay:true, mute:true, startAt:5, opacity:1}">youtube</a>

                        <a href="#section-text" class="scroll-to">
                        <span class="mouse">
                             <span class="scroll"></span>
                        </span>
                        </a>
                    </div>
                </section>
            @else
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
                    <a href="#section-text" class="scroll-to">
                        <span class="mouse">
                             <span class="scroll"></span>
                        </span>
                    </a>
                </section>
            @endif
            <!-- parallax section close -->
            <section id="section-text" class="no-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-12 wow fadeInRight" data-wow-delay=".2s">
                            <div class="de_count ultra-big s2 text-center">
                                <h3 class="timer" data-to="{{ date('Y') -  2002 }}" data-speed="2000"></h3>
                                <span class="text-black">Years of Experience</span>
                            </div>
                        </div>
                        <div class="col-lg-8 wow fadeInRight" data-wow-delay=".6s">
                                <figure class="picframe invert transparent shadow-soft rounded">
										<span class="v-center">
											<span>
												<a id="play-video" class="video-play-button popup-youtube" href="{{ \App\Library\Utilities::getDataInJson('homepage_video_after_counter')['video_url'] ?? '' }}">
													<span></span>
												</a>
											</span>
										</span>
                                    <img src="{{ url((strlen(\App\Library\Utilities::getDataInJson('homepage_video_after_counter')['video_thumbnail_url'] ?? '') > 0) ? \App\Library\Utilities::getDataInJson('homepage_video_after_counter')['video_thumbnail_url'] : 'images/background/bg-9.jpg') }}" class="img-fullwidth" alt="Homepage Video">
                                </figure>
                            </div>
                    </div>
                </div>
            </section>
            <!-- section begin -->
            <section id="section-services" aria-label="section-services" style="background: #f0f0f1;" >
                <div class="container text-black">
                    <div class="row">
                        <div class="text-black col-md-6 offset-md-3 text-center wow fadeInUp">
                            <h1 class="text-black">Services we offer</h1>
                            <div class="separator no-bottom"><span><i class="fa fa-circle"></i></span></div>
                            <div class="spacer-single"></div>
                        </div>
                        <style>
                            a.btn.btn-line:hover {
                                color: black;
                            }
                            a.btn.btn-line {
                                border-color: black;
                            }
                        </style>
                        @foreach(\App\Models\Services::all()->where('type', 'commercial') as $oService)
                            <div class="service-container- col-lg-4 no-top text-middle text-light wow fadeInRight" data-wow-delay="0">
                                <div class="row align-items-center show-service-hovering">
                                    <p id='submit' class="mt20" style="text-align-last: center;">
                                        <a type="button" href="{{ url('service/commercial-landscaping') }}" class="btn btn-line">Commercial Landscaping Service</a>
                                        <br/>
                                        <br/>
                                        <a type="button" href="{{ url('service/residential-landscaping') }}" class="btn btn-line">Residential Landscaping Service</a>
                                    </p>
                                </div>
                                <div class="shadow-soft" data-bgimage="url({{ url($oService->image) }})">
                                    <div class="padding40 overlay60">
                                        <h3>{{ $oService->title }}</h3>
                                        <p>{{ $oService->description }}</p>
{{--                                        <a href="{{ $oService->url }}" class="btn-line-white btn-fullwidth">Read More</a>--}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- section close -->
            <section id="our-process" aria-label="our-process" class="text-white no-bottom"  data-stellar-background-ratio=".2">
                <div class="container">
                    <div class="text-center wow fadeInUp">
                        <h1>Design and Install Process, Maintenance and Turf Care Process</h1>
                        <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                        <div class="spacer-single"></div>
                    </div>
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
                                <img src="{{ url((strlen(@\App\Library\Utilities::getDataInJson('homepage_project_tracker')['landscape']['video_thumbnail_url'] ?? '') > 0) ? \App\Library\Utilities::getDataInJson('homepage_project_tracker')['landscape']['video_thumbnail_url'] : 'images/background/bg-9.jpg') }}" class="img-fullwidth" alt="Project Tracker">
                            </figure>
                            @else
                                <a class="image-popup-no-margins" href="{{ url((strlen(\App\Library\Utilities::getDataInJson('homepage_project_tracker')['landscape']['video_thumbnail_url'] ?? '') > 0) ? \App\Library\Utilities::getDataInJson('homepage_project_tracker')['landscape']['video_thumbnail_url'] : 'images/background/bg-9.jpg') }}">
                                    <img style="min-height: 250px; object-fit: cover;" src="{{ url((strlen(\App\Library\Utilities::getDataInJson('homepage_project_tracker')['landscape']['video_thumbnail_url'] ?? '') > 0) ? \App\Library\Utilities::getDataInJson('homepage_project_tracker')['landscape']['video_thumbnail_url'] : 'images/background/bg-9.jpg') }}" class="img-responsive" alt="Project Tracker">
                                </a>
                            @endif
                            <div class="spacer-half"></div>
                            <h3 style="text-align: center">
                                Landscape and Design Project
                            </h3>>
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
                                <img src="{{ url((strlen(@\App\Library\Utilities::getDataInJson('homepage_project_tracker')['turf']['video_thumbnail_url'] ?? '') > 0) ? @\App\Library\Utilities::getDataInJson('homepage_project_tracker')['turf']['video_thumbnail_url'] : 'images/background/bg-9.jpg') }}" class="img-fullwidth" alt="Project Tracker Thumbnail">
                            </figure>
                            @else
                                <a class="image-popup-no-margins" href="{{ url((strlen(\App\Library\Utilities::getDataInJson('homepage_project_tracker')['turf']['video_thumbnail_url'] ?? '') > 0) ? \App\Library\Utilities::getDataInJson('homepage_project_tracker')['turf']['video_thumbnail_url'] : 'images/background/bg-9.jpg') }}">
                                    <img style="min-height: 250px; object-fit: cover;" src="{{ url((strlen(\App\Library\Utilities::getDataInJson('homepage_project_tracker')['turf']['video_thumbnail_url'] ?? '') > 0) ? \App\Library\Utilities::getDataInJson('homepage_project_tracker')['turf']['video_thumbnail_url'] : 'images/background/bg-9.jpg') }}" class="img-responsive" alt="Project Tracker Thumbnail">
                                </a>
                            @endif
                            <div class="spacer-half"></div>
                            <h3 style="text-align: center">
                                Maintenance and Turf Care
                            </h3>>
                        </div>
                    </div>
                </div>
            </section>
            <section class="text-black no-bottom" id="section-how-it-works" style="background: #f0f0f1;" >
                <div class="container">
                    <div class="row align-items-center" style="place-content: center">
                        <div class="col-md-12 wow fadeInRight" data-wow-delay=".2s">
                            <h1 style="text-align: center" class="text-black">
                                Introducing: Michaelangelo's Project Tracker
                                <div class="separator no-bottom"><span><i class="fa fa-circle"></i></span></div>
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
                                    <img src="{{ url((strlen(\App\Library\Utilities::getDataInJson('homepage_our_process')['video_thumbnail_url'] ?? '') > 0) ? \App\Library\Utilities::getDataInJson('homepage_our_process')['video_thumbnail_url'] : 'images/background/bg-9.jpg') }}" class="img-fullwidth" alt="Project Tracker Thumbnail">
                                </figure>
                            @else
                                <a class="image-popup-no-margins" href="{{ url((strlen(\App\Library\Utilities::getDataInJson('homepage_our_process')['video_thumbnail_url'] ?? '') > 0) ? \App\Library\Utilities::getDataInJson('homepage_our_process')['video_thumbnail_url'] : 'images/background/bg-9.jpg') }}">
                                    <img style="min-height: 250px; object-fit: cover;" src="{{ url((strlen(\App\Library\Utilities::getDataInJson('homepage_our_process')['video_thumbnail_url'] ?? '') > 0) ? \App\Library\Utilities::getDataInJson('homepage_our_process')['video_thumbnail_url'] : 'images/background/bg-9.jpg') }}" class="img-responsive" alt="Project Tracker Thumbnail">
                                </a>
                            @endif
                        </div>
                        <h3 style="text-align: center; margin-top: 10px; color: white" class="text-white">
                            {{ \App\Library\Utilities::getDataInJson('homepage_our_process')['description'] ?? '' }}
                        </h3>
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
            <section id="call-to-action" class="text-dark call-to-action padding40 text-light bg-color"aria-label="cta">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-7">
                            <h3 class="size-2 no-margin">Make Payments</h3>
                        </div>

                        <div class="col-lg-4 col-md-5 col-sm-6 text-right">
                            <a onclick="visitPayment()" href="javascript:;" class="btn-line-white">Financing</a>
                            <a target="_blank" href="https://portal.icheckgateway.com/landscapesandmore/" class="btn-line-white">Credit Card</a>
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
                            <h3 class="size-2 no-margin">Get In Touch With Us Today</h3>
                        </div>
                        <div class="col-lg-4 col-md-5 text-right">
                            <a href="/contact-us" class="btn-line-white">Contact Us Now</a>
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
@endsection

@section('extra-js-first')
    <script src="{{ url('leaflet/leaflet-src.js') }}"></script>
{{--    <script src="https://maps.googleapis.com/maps/api/js" async defer></script>--}}
    <script async src="{{ url('js/google-api/maps.js') }}" ></script>
    <script type="text/javascript" src="{{ url('leaflet/googlemapMutant.js') }}"></script>
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
            obj.style.width = obj.contentWindow.document.documentElement.scrollWidth + 'px';
        };
        $(document).ready(function() {
            if (localStorage.getItem('dontshowagain') == 'false' || localStorage.getItem('dontshowagain') == null || localStorage.getItem('dontshowagain') == 'null') {
                Swal.fire({
                    html: '<img alt="{{ env('APP_NAME') }}" style="width:100%" src="{{ url(env('LOGO_DARK_URL') ?? '/img/logo/logo-wide-green.png') }}" /> ' +
                        '<br/><center style="font-weight: bolder;font-size: 15px;margin-top: 12px;"><label for=dontshowagain> <input id="dontshowagain" type=checkbox /> Don\'t show again? </label></center>',
                    showCancelButton: false,
                    showConfirmButton: false,
                    showCloseButton: true,
                    allowOutsideClick: false,
                }).then(function() {
                    if($('#dontshowagain').is(':checked') === true) {
                        localStorage.setItem('dontshowagain', true);
                    }
                });
            }

        });
    </script>
@endsection
