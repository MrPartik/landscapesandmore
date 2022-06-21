@extends('layouts.front', [
    'title' => 'Residential Landscaping Services | ' . (env('APP_TITLE') ?? 'Michaelangelo\'s Sustainable Landscape and Design Group' ),
    'description' => 'Residential Landscaping in Atlanta. Highlight your home with unique and creative landscaping.'
    ])
@section('body')
    <div id="wrapper">
        @include('front.navigation.header', ['active' => 'residential', 'auto_show' => false])
        <!-- subheader -->
            <section id="subheader" style="background: linear-gradient(rgba(0,0,0,0.8), rgba(43,31,21,0.4)), url('{{ url('img/leaves.jpeg') }}') bottom fixed" data-type="background">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Residential Landscaping Services</h1>
                            <ul class="crumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li class="sep">/</li>
                                <li>Residential Landscaping Services</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        <!-- subheader close -->
        <!-- section begin -->
        <section id="section-about">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                        <h1>What We Do</h1>
                        <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                        <div class="spacer-single"></div>
                    </div>


                    <div class="col-md-4 wow fadeInLeft">
                        <a class="image-popup-no-margins" href="{{ url('img/services/residential/install.jpg') }}">
                            <img src="{{ url('img/services/residential/install.jpg') }}" class="img-responsive" alt="">
                        </a>
                        <div class="spacer-single"></div>
                        <h3><span class="id-color">Landscaping Install & </span> Design Services</h3>
                        Residential landscaping is more than trees and plants! A big part of creating a beautiful and functional landscape is designing and installing hardscape. Hardscape — bricks, decking, concrete, pavers, etc. — provides structure to the landscape. The right hardscape can turn your yard into an oasis that you will want to spend every evening and weekend in. We can create beautiful patios for you to host dinner parties on. Or put in retaining walls, arbors, or trellises to give yourself multiple spaces to relax and unwind.
                    </div>
                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".2s">
                        <a class="image-popup-no-margins" href="{{ url('img/services/residential/maintenance.jpg') }}">
                            <img src="{{ url('img/services/residential/maintenance.jpg') }}" class="img-responsive" alt="">
                        </a>
                        <div class="spacer-single"></div>
                        <h3><span class="id-color">Maintenance </span> Services</h3>
                        In addition to sustainable landscape design and installation - we provide maintenance services in the communities of Atlanta, Alpharetta, Marietta, Roswell, and other surrounding suburbs. Our team includes a skilled horticulturist, who specializes in the maintenance of lawn, bushes, and shrubs.
                    </div>

                    <div class="col-md-4 wow fadeInRight">
                        <a class="image-popup-no-margins" href="{{ url('img/services/residential/turf care.jpg') }}">
                            <img src="{{ url('img/services/residential/turf care.jpg') }}" class="img-responsive" alt="">
                        </a>
                        <div class="spacer-single"></div>
                        <h3><span class="id-color">Turf Care</span> Services </h3>
                        When you partner with Michaelangelo’s Sustainable Landscape & Design Group, you can trust that you are getting the highest quality professional landscaping services! And that includes our turf care services. Whether you’ve been enjoying a lush lawn for years or struggling to keep up with lawn maintenance, we’re here to help.
                    </div>

                </div>
            </div>
        </section>
        <!-- section close -->

        <!-- section begin -->
        <section id="section-steps" class="text-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                        <h1>Our Process</h1>
                        <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                        <div class="spacer-single"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="de_tab tab_steps">
                            <ul class="de_nav">
                                <li class="active wow fadeIn" data-wow-delay="0s"><span>Meet &amp; Agree</span>
                                    <div class="v-border"></div>
                                </li>
                                <li class="wow fadeIn" data-wow-delay=".4s"><span>Idea &amp; Concept</span>
                                    <div class="v-border"></div>
                                </li>
                                <li class="wow fadeIn" data-wow-delay=".8s"><span>Design &amp; Create</span>
                                    <div class="v-border"></div>
                                </li>
                                <li class="wow fadeIn" data-wow-delay="1.2s"><span>Build &amp; Install</span>
                                    <div class="v-border"></div>
                                </li>
                            </ul>

                            <div class="de_tab_content">

                                <div id="tab1">
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                    ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                    explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                                    sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
                                    porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                                    velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
                                    aliquam quaerat voluptatem. Ut enim ad minima veniam.
                                </div>

                                <div id="tab2">
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                    ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                    explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                                    sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
                                    porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                                    velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
                                    aliquam quaerat voluptatem. Ut enim ad minima veniam.
                                </div>

                                <div id="tab3">
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                    ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                    explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                                    sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
                                    porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                                    velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
                                    aliquam quaerat voluptatem. Ut enim ad minima veniam.
                                </div>

                                <div id="tab4">
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                    ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                    explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                                    sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
                                    porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                                    velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
                                    aliquam quaerat voluptatem. Ut enim ad minima veniam.
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        @include('front.navigation.footer')
    </div>
@endsection
@section('extra-js')
@endsection
