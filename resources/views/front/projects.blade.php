@extends('layouts.front', ['title' => 'Landscaping | Projects'])
@section('body')
    <div id="wrapper">
        @include('front.navigation.header', ['active' => 'projects', 'auto_show' => false])
        <!-- subheader -->
            <section id="subheader" style="background: linear-gradient(rgba(0,0,0,0.8), rgba(43,31,21,0.4)), url('{{ url('img/landscapes/traditional firepit.jpg') }}') bottom fixed" data-type="background">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Projects</h1>
                            <ul class="crumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li class="sep">/</li>
                                <li>Projects</li>
                            </ul>
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
                                <li><a href="#" data-filter="*" class="selected">All Projects</a></li>
                                <li><a href="#" data-filter=".residential">Residential</a></li>
                                <li><a href="#" data-filter=".hospitaly">Hospitaly</a></li>
                                <li><a href="#" data-filter=".office">Office</a></li>
                                <li><a href="#" data-filter=".commercial">Commercial</a></li>
                            </ul>

                        </div>
                    </div>
                    <!-- portfolio filter close -->



                    <div id="gallery" class="row grid_gallery gallery de-gallery wow fadeInUp" data-wow-delay=".3s">

                        <!-- gallery item -->
                        <div class="col-md-4 item residential">
                            <div class="picframe">
                                <a class="image-popup-gallery" href="images/portfolio/pf%20(1).jpg">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Eco Green Interior</span>
                                    </span>
                                </span>
                                </a>
                                <img src="images/portfolio/pf%20(1).jpg" alt="" />
                            </div>
                        </div>
                        <!-- close gallery item -->

                        <!-- gallery item -->
                        <div class="col-md-4 item hospitaly">
                            <div class="picframe">
                                <a class="image-popup-gallery" href="images/portfolio/pf%20(2).jpg">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Modern Elegance Suite</span>
                                    </span>
                                </span>
                                </a>

                                <img src="images/portfolio/pf%20(2).jpg" alt="" />
                            </div>
                        </div>
                        <!-- close gallery item -->

                        <!-- gallery item -->
                        <div class="col-md-4 item hospitaly">
                            <div class="picframe">
                                <a class="image-popup-gallery" href="images/portfolio/pf%20(3).jpg">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Apartment Renovation</span>
                                    </span>
                                </span>
                                </a>

                                <img src="images/portfolio/pf%20(3).jpg" alt="" />
                            </div>
                        </div>
                        <!-- close gallery item -->

                        <!-- gallery item -->
                        <div class="col-md-4 item residential">
                            <div class="picframe">
                                <a class="image-popup-gallery" href="images/portfolio/pf%20(4).jpg">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Bedroom Make Over</span>
                                    </span>
                                </span>
                                </a>
                                <img src="images/portfolio/pf%20(4).jpg" alt="" />
                            </div>
                        </div>
                        <!-- close gallery item -->

                        <!-- gallery item -->
                        <div class="col-md-4 item office">
                            <div class="picframe">
                                <a class="image-popup-gallery" href="images/portfolio/pf%20(5).jpg">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Modern Office</span>
                                    </span>
                                </span>
                                </a>
                                <img src="images/portfolio/pf%20(5).jpg" alt="" />
                            </div>
                        </div>
                        <!-- close gallery item -->

                        <!-- gallery item -->
                        <div class="col-md-4 item commercial">
                            <div class="picframe">
                                <a class="image-popup-gallery" href="images/portfolio/pf%20(6).jpg">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Restaurant In Texas</span>
                                    </span>
                                </span>
                                </a>
                                <img src="images/portfolio/pf%20(6).jpg" alt="" />
                            </div>
                        </div>
                        <!-- close gallery item -->

                        <!-- gallery item -->
                        <div class="col-md-4 item residential">
                            <div class="picframe">
                                <a class="image-popup-gallery" href="images/portfolio/pf%20(7).jpg">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Summer House</span>
                                    </span>
                                </span>
                                </a>

                                <img src="images/portfolio/pf%20(7).jpg" alt="" />
                            </div>
                        </div>
                        <!-- close gallery item -->

                        <!-- gallery item -->
                        <div class="col-md-4 item office">
                            <div class="picframe">
                                <a class="image-popup-gallery" href="images/portfolio/pf%20(8).jpg">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Office On Space</span>
                                    </span>
                                </span>
                                </a>

                                <img src="images/portfolio/pf%20(8).jpg" alt="" />
                            </div>
                        </div>
                        <!-- close gallery item -->

                        <!-- gallery item -->
                        <div class="col-md-4 item office">
                            <div class="picframe">
                                <a class="image-popup-gallery" href="images/portfolio/pf%20(9).jpg">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Luxury Living Room</span>
                                    </span>
                                </span>
                                </a>

                                <img src="images/portfolio/pf%20(9).jpg" alt="" />
                            </div>
                        </div>
                        <!-- close gallery item -->

                        <!-- gallery item -->
                        <div class="col-md-4 item residential">
                            <div class="picframe">
                                <a class="image-popup-gallery" href="images/portfolio/pf%20(10).jpg">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Cozy Bedroom</span>
                                    </span>
                                </span>
                                </a>

                                <img src="images/portfolio/pf%20(10).jpg" alt="" />
                            </div>
                        </div>
                        <!-- close gallery item -->

                        <!-- gallery item -->
                        <div class="col-md-4 item hospitaly">
                            <div class="picframe">
                                <a class="image-popup-gallery" href="images/portfolio/pf%20(11).jpg">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Classic Furnishing</span>
                                    </span>
                                </span>
                                </a>

                                <img src="images/portfolio/pf%20(11).jpg" alt="" />
                            </div>
                        </div>
                        <!-- close gallery item -->

                        <!-- gallery item -->
                        <div class="col-md-4 item commercial">
                            <div class="picframe">
                                <a class="image-popup-gallery" href="images/portfolio/pf%20(12).jpg">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Restaurant In Cannes</span>
                                    </span>
                                </span>
                                </a>

                                <img src="images/portfolio/pf%20(12).jpg" alt="" />
                            </div>
                        </div>
                        <!-- close gallery item -->

                    </div>

                </div>

            </section>
            <!-- section close -->
        <!-- subheader close -->
        @include('front.navigation.footer')
    </div>
@endsection
@section('extra-js')
@endsection
