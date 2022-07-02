@extends('layouts.front', [
    'title' => 'Residential Landscaping Services | ' . (env('APP_TITLE') ?? 'Michaelangelo\'s Sustainable Landscape and Design Group' ),
    'description' => 'Residential Landscaping in Atlanta. Highlight your home with unique and creative landscaping.'
    ])
@section('body')
    <div id="wrapper">
        @include('front.navigation.header', ['active' => 'residential', 'auto_show' => false])
        <!-- subheader -->
            <section id="subheader" style="background: linear-gradient(rgba(0,0,0,0.8), rgba(43,31,21,0.4)), url('{{ url('img/leaves.jpeg') }}') bottom no-repeat" data-type="background">
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
            <style>
                a.btn.btn-line:hover {
                    color: black;
                }
                a.btn.btn-line {
                    border-color: black;
                }
            </style>
        <section id="section-about">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                        <h1>What We Do</h1>
                        <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                        <div class="spacer-single"></div>
                    </div>
                    @foreach(\App\Models\Services::all()->where('type', 'residential') as $oService)
                        <div class="col-md-4 wow fadeInLeft">
                            <a class="image-popup-no-margins" href="{{ url($oService->image) }}">
                                <img src="{{ url($oService->image) }}" class="img-responsive" alt="{{ $oService->title }}">
                            </a>
                            <div class="spacer-single"></div>
                            <h3><span class="id-color">{{ $oService->title }}</h3>
                            {{ $oService->description }}
                            <br/>
                            <br/>
                            <a type="button" href="{{ url($oService->url) }}" class="btn btn-line">Read more </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- section close -->
        <section data-bgcolor="#202124" class="text-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                        <h1 style="width:max-content"> Landscaping Install & Design Servicess Process</h1>
                        <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                        <div class="spacer-single"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="de_tab tab_steps tab_6">
                            <ul class="de_nav">
                                <li class="active wow fadeIn" data-wow-delay="0s">
                                <span title="Contact Us" style="font-size: 25px;">
                                    01
                                </span>
                                    <div class="v-border"></div>
                                </li>
                                <li class="wow fadeIn" data-wow-delay=".4s">
                                <span title="Consultation" style="font-size: 25px;">
                                    02
                                </span>
                                    <div class="v-border"></div>
                                </li>
                                <li class="wow fadeIn" data-wow-delay=".8s">
                                <span title="Design" style="font-size: 25px;">
                                    03
                                </span>
                                    <div class="v-border"></div>
                                </li>
                                <li class="wow fadeIn" data-wow-delay="1.2s">
                                <span title="Design Presentation" style="font-size: 25px;">
                                    04
                                </span>
                                    <div class="v-border"></div>
                                </li>
                                <li class="wow fadeIn" data-wow-delay="1.6s">
                                <span title="Installation" style="font-size: 25px;">
                                   05
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
                        <h1 style="width: max-content"> Maintenance & Turf Care Services Process</h1>
                        <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                        <div class="spacer-single"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="de_tab tab_steps tab_6">
                            <ul class="de_nav text-dark">
                                <li class="active wow fadeIn" data-wow-delay="0s">
                                <span title="Contact Us" style="font-size: 25px;">
                                    01
                                </span>
                                    <div class="v-border"></div>
                                </li>
                                <li class="wow fadeIn" data-wow-delay=".4s">
                                <span title="Consultation" style="font-size: 25px;">
                                    02
                                </span>
                                    <div class="v-border"></div>
                                </li>
                                <li class="wow fadeIn" data-wow-delay=".8s">
                                <span title="Contract Signing" style="font-size: 25px;">
                                    03
                                </span>
                                    <div class="v-border"></div>
                                </li>
                                <li class="wow fadeIn" data-wow-delay="1.2s">
                                <span title="Maintenance Service " style="font-size: 25px;">
                                    04
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
                                <img src="{{ url('/img/services/hardscapes.jpg') }}" alt="Hardscape and Retaining Wall" />
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
                                <img src="{{ url('/img/services/sawd-installation.jpg') }}" alt="Sod Installation" />
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
                                <img src="{{ url('/img/services/outdoor living 2.jpg') }}" alt="Outdoor Living" />
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
                                <img src="{{ url('/img/services/grading.jpg') }}" alt="Grading" />
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
                                <img src="{{ url('/img/services/softscape.jpg') }}" alt="Softscape" />
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
                                <img src="{{ url('/img/services/lighting.jpg') }}" alt="Lighting and Irrigation" />
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
                                <img src="{{ url('/img/services/design.jpg') }}" alt="Design Services" />
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
                                <img src="{{ url('/img/services/pruning.jpg') }}" alt="Weekly Full Service" />
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
                                <img src="{{ url('/img/services/fertilizer.png') }}" alt="Weed Control" />
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
                                <img src="{{ url('/img/services/seasonal flower.jpg') }}" alt="Seasonal Flower Displays" />
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
                                <img src="{{ url('/img/services/maintenance (3).jpg') }}" alt="Maintenance" />
                            </div>
                        </div>
                        <div class="item project-type-maintenance" style="width: 250px;">
                            <div class="picframe">
                                <a class="image-popup-gallery" href="{{ url('/img/services/mowing.jpg') }}  alt="Maintenance" ">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">General Lawn/Property Clean-up  </span>
                                    </span>
                                </span>
                                </a>
                                <img src="{{ url('/img/services/general cleanup.jpg') }}" alt="Maintenance"  alt="Turf" />
                            </div>
                        </div>
                        <div class="item project-type-turf" style="width: 250px;">
                            <div class="picframe">
                                <a class="image-popup-gallery" href="{{ url('/img/services/mowing.jpg') }}">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Overseeding and Aeration</span>
                                    </span>
                                </span>
                                </a>
                                <img src="{{ url('/img/services/mowing.jpg') }}" alt="General Lawn/Property Clean-up" />
                            </div>
                        </div>
                        <!-- close gallery item -->
                    </div>
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
        @include('front.navigation.footer')
    </div>
@endsection
@section('extra-js')
@endsection
