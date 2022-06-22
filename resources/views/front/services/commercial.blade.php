@extends('layouts.front', [
    'title' => 'Commercial Landscaping Services | ' . (env('APP_TITLE') ?? 'Michaelangelo\'s Sustainable Landscape and Design Group' ),
    'description' => 'Commercial Landscaping Services. Let our local professional landscapers make your business inviting, unique, and beautiful.'
    ])
@section('body')
    <div id="wrapper">
        @include('front.navigation.header', ['active' => 'commercial', 'auto_show' => false])
        <!-- subheader -->
            <section id="subheader" style="background: linear-gradient(rgba(0,0,0,0.8), rgba(43,31,21,0.4)), url('{{ url('img/leaves.jpeg') }}') bottom no-repeat" data-type="background">
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
        <section data-bgcolor="#202124" class="text-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                        <h1> Process: Landscaping Install & Design Services</h1>
                        <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                        <div class="spacer-single"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="de_tab tab_steps tab_6">
                            <ul class="de_nav">
                                <li class="active wow fadeIn" data-wow-delay="0s">
                                    <span title="Contact Us">
                                        <i style="font-size: 33px; line-height: unset;" class="fa fa-phone"></i>
                                    </span>
                                    <div class="v-border"></div>
                                </li>
                                <li class="wow fadeIn" data-wow-delay=".4s">
                                    <span title="Consultation">
                                        <i style="font-size: 33px; line-height: unset;" class="fa fa-sticky-note"></i>
                                    </span>
                                    <div class="v-border"></div>
                                </li>
                                <li class="wow fadeIn" data-wow-delay=".8s">
                                    <span title="Design">
                                        <i style="font-size: 33px; line-height: unset;" class="fa fa-pen-nib"></i>
                                    </span>
                                    <div class="v-border"></div>
                                </li>
                                <li class="wow fadeIn" data-wow-delay="1.2s">
                                    <span title="Design Presentation">
                                        <i style="font-size: 33px; line-height: unset;" class="fa fa-person-chalkboard"></i>
                                    </span>
                                    <div class="v-border"></div>
                                </li>
                                <li class="wow fadeIn" data-wow-delay="1.6s">
                                    <span title="Installation">
                                        <i style="font-size: 33px; line-height: unset;" class="fa fa-person-digging"></i>
                                    </span>
                                    <div class="v-border"></div>
                                </li>
                            </ul>

                            <div class="de_tab_content">
                                <div id="tab1">
                                    <center style="font-weight: bold"><h3>Contact Us</h3></center>
                                    Your project starts with a phone call. We will have an initial discussion about your upcoming project and listen to your needs, requirements, and budget for your installation project.
                                </div>

                                <div id="tab2">
                                    <center style="font-weight: bold"><h3>Consultation</h3></center>
                                    Upon receiving your request for a landscape project, our receptionist will book you a Zoom appointment with our knowledgeable salesperson to help you with your project. Brief us of your ideas and your vision to make sure that both parties are aligned. It is crucial that you provide us with all the details you need to ensure that we meet your expectations.
                                </div>

                                <div id="tab3">
                                    <center style="font-weight: bold"><h3>Design</h3></center>
                                    We have expert landscape architects who have been working in the landscaping industry for more than 20 years. After your consultation, we will then turn you over to our landscape architect. He will then visit your property on your set date for the appointment. He will have a site walk on your property and will sketch out the design shortly after. To set expectations, please wait for a week or two weeks at the most to get your design. We make sure that the design we will be giving you is at par with your vision.
                                </div>

                                <div id="tab4">
                                    <center style="font-weight: bold"><h3>Design Presentation</h3></center>
                                    Our design presentation comprises two things: your design and the projected cost for your project. This is also done via Zoom meeting. Should there be a need to revise the quote presented, we are very much happy to adjust for your needs. If you’re satisfied with the quote, we can send you a contract to seal the deal!
                                </div>

                                <div id="tab5">
                                    <center style="font-weight: bold"><h3>Installation</h3></center>
                                    Should you sign-up for our services after the presentation, the scheduling and purchasing of materials will be done as soon as possible. We do this to make sure we have the right materials you want for your landscape project. Construction can be done for a minimum of one week or more depending on the complexity of your project. After our installation, you get to relax and enjoy your new outdoor space.
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section data-bgcolor="#383838" class="text-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                        <h1> Process: Maintenance & Turf Care</h1>
                        <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                        <div class="spacer-single"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="de_tab tab_steps tab_6">
                            <ul class="de_nav text-dark">
                                <li class="active wow fadeIn" data-wow-delay="0s">
                                    <span title="Contact Us">
                                        <i style="font-size: 33px; line-height: unset;" class="fa fa-phone"></i>
                                    </span>
                                    <div class="v-border"></div>
                                </li>
                                <li class="wow fadeIn" data-wow-delay=".4s">
                                    <span title="Consultation">
                                        <i style="font-size: 33px; line-height: unset;" class="fa fa-sticky-note"></i>
                                    </span>
                                    <div class="v-border"></div>
                                </li>
                                <li class="wow fadeIn" data-wow-delay=".8s">
                                    <span title="Contract Signing">
                                        <i style="font-size: 33px; line-height: unset;" class="fa fa-file-signature"></i>
                                    </span>
                                    <div class="v-border"></div>
                                </li>
                                <li class="wow fadeIn" data-wow-delay="1.2s">
                                    <span title="Maintenance Service ">
                                        <i style="font-size: 33px; line-height: unset;" class="fa fa-people-carry-box"></i>
                                    </span>
                                    <div class="v-border"></div>
                                </li>
                            </ul>

                            <div class="de_tab_content">
                                <div id="tab1">
                                    <center style="font-weight: bold"><h3>Contact Us</h3></center>
                                    Your maintenance service starts with a phone call. Let us know of the service that you need. Our maintenance includes: mowing, edging, and blowing. Bed maintenance is also included by spraying and hand weeding when necessary. Complete leaf removal from all turf areas and ornamental beds is also included. However, the most important service included in the maintenance program is hand pruning of your ornamental shrubs
                                </div>

                                <div id="tab2">
                                    <center style="font-weight: bold"><h3>Consultation</h3></center>
                                    We will schedule an in-person consultation with one of our salesperson. They will have to check your yard, this is to help us prepare your quotation
                                </div>

                                <div id="tab3">
                                    <center style="font-weight: bold"><h3>Contract Signing </h3></center>
                                    Once you have agreed and signed the quotation estimate that has been sent to your email address, we’ll add your information to our calendar.  </div>

                                <div id="tab4">
                                    <center style="font-weight: bold"><h3>Maintenance Service </h3></center>
                                    Your maintenance service will begin on the next cycle of routes. This information will be given to you beforehand. You will also receive receipts as a confirmation that we have visited your yard for maintenance.
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section begin -->
        <section id="section-portfolio" class="no-top no-bottom" aria-label="section-portfolio">
            <div class="container">
                <div class="spacer-single"></div>
                <!-- portfolio filter begin -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
                            <li><a href="javascript:" data-filter="*" class="selected">All Services</a></li>
                                <li><a href="javascript:" data-filter=".project-type-landscape">Landscaping Install & Design Services</a></li>
                                <li><a href="javascript:" data-filter=".project-type-maintenance">Maintenance Service </a></li>
                                <li><a href="javascript:" data-filter=".project-type-turf">Turf Care  </a></li>
                        </ul>
                    </div>
                </div>
                <!-- portfolio filter close -->
                <div id="gallery" class="row grid_gallery gallery de-gallery wow fadeInUp" data-wow-delay=".3s">
                    <!-- gallery item -->
                    <div class="item project-type-landscape" style="width: 250px;">
                        <div class="picframe">
                            <a class="image-popup-gallery" href="{{ url('/img/services/hardscapes.jpg') }}">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Hardscape and Retaining Wall</span>
                                    </span>
                                </span>
                            </a>
                            <img src="{{ url('/img/services/hardscapes.jpg') }}" alt="" />
                        </div>
                    </div>
                    <div class="item project-type-landscape" style="width: 250px;">
                        <div class="picframe">
                            <a class="image-popup-gallery" href="{{ url('/img/services/sawd-installation.jpg') }}">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Sod Installation</span>
                                    </span>
                                </span>
                            </a>
                            <img src="{{ url('/img/services/sawd-installation.jpg') }}" alt="" />
                        </div>
                    </div>
                    <div class="item project-type-landscape" style="width: 250px;">
                        <div class="picframe">
                            <a class="image-popup-gallery" href="{{ url('/img/services/outdoor living 2.jpg') }}">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Outdoor Living</span>
                                    </span>
                                </span>
                            </a>
                            <img src="{{ url('/img/services/outdoor living 2.jpg') }}" alt="" />
                        </div>
                    </div>
                    <div class="item project-type-landscape" style="width: 250px;">
                        <div class="picframe">
                            <a class="image-popup-gallery" href="{{ url('/img/services/grading.jpg') }}">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Grading</span>
                                    </span>
                                </span>
                            </a>
                            <img src="{{ url('/img/services/grading.jpg') }}" alt="" />
                        </div>
                    </div>
                    <div class="item project-type-landscape" style="width: 250px;">
                        <div class="picframe">
                            <a class="image-popup-gallery" href="{{ url('/img/services/softscape.jpg') }}">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Softscape</span>
                                    </span>
                                </span>
                            </a>
                            <img src="{{ url('/img/services/softscape.jpg') }}" alt="" />
                        </div>
                    </div>
                    <div class="item project-type-landscape" style="width: 250px;">
                        <div class="picframe">
                            <a class="image-popup-gallery" href="{{ url('/img/services/lighting.jpg') }}">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Lighting and Irrigation </span>
                                    </span>
                                </span>
                            </a>
                            <img src="{{ url('/img/services/lighting.jpg') }}" alt="" />
                        </div>
                    </div>
                    <div class="item project-type-landscape" style="width: 250px;">
                        <div class="picframe">
                            <a class="image-popup-gallery" href="{{ url('/img/services/design.jpg') }}">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Design Services  </span>
                                    </span>
                                </span>
                            </a>
                            <img src="{{ url('/img/services/design.jpg') }}" alt="" />
                        </div>
                    </div>
                    <div class="item project-type-maintenance" style="width: 250px;">
                        <div class="picframe">
                            <a class="image-popup-gallery" href="{{ url('/img/services/pruning.jpg') }}">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Weekly Full Service   </span>
                                    </span>
                                </span>
                            </a>
                            <img src="{{ url('/img/services/pruning.jpg') }}" alt="" />
                        </div>
                    </div>
                    <div class="item project-type-maintenance" style="width: 250px;">
                        <div class="picframe">
                            <a class="image-popup-gallery" href="{{ url('/img/services/fertilizer.png') }}">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Weed Control </span>
                                    </span>
                                </span>
                            </a>
                            <img src="{{ url('/img/services/fertilizer.png') }}" alt="" />
                        </div>
                    </div>
                    <div class="item project-type-maintenance" style="width: 250px;">
                        <div class="picframe">
                            <a class="image-popup-gallery" href="{{ url('/img/services/seasonal flower.jpg') }}">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Seasonal Flower Displays </span>
                                    </span>
                                </span>
                            </a>
                            <img src="{{ url('/img/services/seasonal flower.jpg') }}" alt="" />
                        </div>
                    </div>
                    <div class="item project-type-maintenance" style="width: 250px;">
                        <div class="picframe">
                            <a class="image-popup-gallery" href="{{ url('/img/services/mowing.jpg') }}">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">General Lawn/Property Clean-up  </span>
                                    </span>
                                </span>
                            </a>
                            <img src="{{ url('/img/services/mowing.jpg') }}" alt="" />
                        </div>
                    </div>
                    <!-- close gallery item -->
                </div>
            </div>
        </section>
        <!-- section close -->
        @include('front.navigation.footer')
    </div>
@endsection
@section('extra-js')
@endsection
