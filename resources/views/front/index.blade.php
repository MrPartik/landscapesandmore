@extends('layouts.front', ['title' => 'Landscaping | Home'])
@section('body')
    <div id="wrapper">
        @include('front.navigation.header', ['active' => 'home'])
        <!-- content begin -->
        <div id="content" class="no-bottom no-top">
            <!-- parallax section -->
            <section style="background: linear-gradient(rgba(0,0,0,0.4), rgba(134,109,70,0.4)), url('{{ url('img/landscapes/frontyard.png') }}') center fixed" class="full-height" data-type="background">
                <div class="center-y text-center">
                    <div class="spacer-double"></div>
                    <h1 class="text-white">Creating Masterpieces</h1>
                    <div id="text-carousel" class="owl-carousel owl-theme text-slider style-2 border-deco">
                        <div class="item">Install Landscape and Design</div>
                        <div class="item">Maintenance Services</div>
                        <div class="item">Turf Care Services</div>
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
            <!-- section begin -->
            <section style="background: linear-gradient(rgba(0,0,0,0.77), rgba(0,0,0,0.77)), url('{{ url('img/landscapes/zooming-house.jpg') }}') center fixed" class="text-light"  >
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                            <h1>Customer Says</h1>
                            <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                            <div class="spacer-single"></div>
                        </div>
                        <div class="col-md-8 offset-md-2">
                            <div id="testimonial-carousel-single" class="owl-carousel owl-theme wow fadeInUp">
                                <blockquote class="testimonial-big s2">
                                    <span class="title">Excellent services!</span>
                                    I'm always impressed with the services. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.

                                    <span class="name">John, Customer</span>
                                </blockquote>

                                <blockquote class="testimonial-big s2">
                                    <span class="title">Awesome design!</span>
                                    I'm always impressed with the services. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.

                                    <span class="name">Sandra, Customer</span>
                                </blockquote>

                                <blockquote class="testimonial-big s2">
                                    <span class="title">Superb teamwork!</span>
                                    I'm always impressed with the services. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.

                                    <span class="name">Michael, Customer</span>
                                </blockquote>
                            </div>

                        </div>

                        <div class="spacer-double"></div>

                        <div class="col-md-12 wow fadeInUp" data-wow-delay="0s">
                            <div id="logo-carousel" class="owl-carousel owl-theme">
                                @foreach(\App\Models\Awards::all()->where('is_active', 1) as $oAward)
                                    <img src="{{ url($oAward->url) }}" class="img-responsive" alt="{{ $oAward->description }}" title="{{ $oAward->description }}">
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </section>
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

                        <div class="col-md-4 wow fadeInLeft">
                            <a class="image-popup-no-margins" href="{{ url('/img/services/landscaping.png') }}">
                                <img style="min-height: 250px; object-fit: cover;" src="{{ url('/img/services/landscaping.png') }}" class="img-responsive" alt="">
                            </a>
                            <div class="spacer-single"></div>
                            <h3><span class="id-color">Install Landscape and </span> Design</h3>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                            ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                            <div class="spacer-single"></div>
                            <a href="javascript:" class="btn-line-black">Get Started Now!</a>
                        </div>

                        <div class="col-md-4 wow fadeInUp" data-wow-delay=".2s">
                            <a class="image-popup-no-margins" href="{{ url('/img/services/maintenance.jpg') }}">
                                <img style="min-height: 250px; object-fit: cover;" src="{{ url('/img/services/maintenance.jpg') }}" class="img-responsive" alt="">
                            </a>
                            <div class="spacer-single"></div>
                            <h3><span class="id-color">Maintenance </span>Services</h3>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                            ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                            <div class="spacer-single"></div>
                            <a href="javascript:" class="btn-line-black">Get Started Now!</a>
                        </div>

                        <div class="col-md-4 wow fadeInRight">
                            <a class="image-popup-no-margins" href="{{ url('/img/services/turf-care.png') }}">
                                <img style="min-height: 250px; object-fit: cover;" src="{{ url('/img/services/turf-care.png') }}" class="img-responsive" alt="">
                            </a>
                            <div class="spacer-single"></div>
                            <h3><span class="id-color">Turf Care </span>Services</h3>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                            ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                            <div class="spacer-single"></div>
                            <a href="javascript:" class="btn-line-black">Get Started Now!</a>
                        </div>

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
        </div>
        @include('front.navigation.footer')
    </div>
@endsection
@section('extra-js')
@endsection
