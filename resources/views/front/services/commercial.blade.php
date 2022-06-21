@extends('layouts.front', [
    'title' => 'Commercial Landscaping Services | ' . (env('APP_TITLE') ?? 'Michaelangelo\'s Sustainable Landscape and Design Group' ),
    'description' => 'Commercial Landscaping Services. Let our local professional landscapers make your business inviting, unique, and beautiful.'
    ])
@section('body')
    <div id="wrapper">
        @include('front.navigation.header', ['active' => 'commercial', 'auto_show' => false])
        <!-- subheader -->
            <section id="subheader" style="background: linear-gradient(rgba(0,0,0,0.8), rgba(43,31,21,0.4)), url('{{ url('img/leaves.jpeg') }}') bottom fixed" data-type="background">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Commercial Landscaping Services</h1>
                            <ul class="crumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li class="sep">/</li>
                                <li>Commercial Landscaping Services</li>
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
                        <a class="image-popup-no-margins" href="{{ url('img/services/commercial/install.jpg') }}">
                            <img src="{{ url('img/services/commercial/install.jpg') }}" class="img-responsive" alt="">
                        </a>
                        <div class="spacer-single"></div>
                        <h3><span class="id-color">Landscaping Install & </span> Design Services</h3>
                        Let our local professional landscapers make your business inviting, unique and beautiful. Commercial landscaping gives you the opportunity to personalize the outside of your business to reflect your taste. More so, clients consider businesses that have beautiful landscaping to be more detail-oriented than those who don’t. Your landscaping is one of the ways you present your Atlanta business to the world — let us help you make it stunning, functional, and unique.
                    </div>

                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".2s">
                        <a class="image-popup-no-margins" href="{{ url('img/services/commercial/maintenance.jpg') }}">
                            <img src="{{ url('img/services/commercial/maintenance.jpg') }}" class="img-responsive" alt="">
                        </a>
                        <div class="spacer-single"></div>
                        <h3><span class="id-color">Maintenance </span> Services</h3>
                        Along with the initial design and installation, we’re also happy to provide monthly or seasonal maintenance services such as weeding, mowing, trimming, pruning, and plant replacement. We’re a full-service landscape company, which means we don’t stop caring for your landscape after we finish planting!
                    </div>

                    <div class="col-md-4 wow fadeInRight">
                        <a class="image-popup-no-margins" href="{{ url('img/services/commercial/turf care.jpg') }}">
                            <img src="{{ url('img/services/commercial/turf care.jpg') }}" class="img-responsive" alt="">
                        </a>
                        <div class="spacer-single"></div>
                        <h3><span class="id-color">Turf Care</span> Services </h3>
                        Michaelangelo's understands that the success of any commercial property begins with a first impression, and that’s why we believe commercial landscape services are an investment. Our team of lawn care specialists provide exceptional services at a reasonable price, and our on-staff horticulturist ensures proper irrigation repairs and services of lawns and plantings, as well as appropriate fertilization, weed control, aeration, thicker and lusher turf.
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
