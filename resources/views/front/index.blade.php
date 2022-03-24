@extends('layouts.front')
@section('body')
    <div id="wrapper">
        @include('front.header.navigation', ['active' => 'home'])
        <!-- content begin -->
        <div id="content" class="no-bottom no-top">

            <!-- revolution slider begin -->
            <section id="section-slider" class="fullwidthbanner-container text-white" aria-label="section-slider">
                <div id="slider-revolution">
                    <ul>
                        <li data-transition="fade" data-slotamount="10" data-masterspeed="200" data-thumb="">
                            <!--  BACKGROUND IMAGE -->
                            <img alt="" class="rev-slidebg" data-bgparallax="0" src="images-interior-landing/slider/wide1.jpg">

                            <div class="tp-caption size-72 font-weight-thin text-white" data-x="center" data-y="270" data-height="none" data-whitespace="nowrap"  data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:2;scaleY:2;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.85;scaleY:0.85;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="1200" data-start="400" data-easing="easeInOutExpo" data-endspeed="400">
                                All Time Best Selling
                            </div>

                            <div class="tp-caption size-72 font-weight-bold text-white" data-x="center" data-y="350" data-height="none" data-whitespace="nowrap"  data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:2;scaleY:2;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.85;scaleY:0.85;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="1200" data-start="400" data-easing="easeInOutExpo" data-endspeed="400">
                                Interior Design
                            </div>

                            <div class="tp-caption size-20 ls-20px sft" data-x="center" data-y="430" data-width="none" data-height="none" data-whitespace="nowrap"  data-speed="1200" data-start="400" data-easing="easeInOutExpo">
                                SOLD 10000+ COPIES
                            </div>

                        </li>

                        <li data-transition="fade" data-slotamount="10" data-masterspeed="200" data-thumb="">
                            <!--  BACKGROUND IMAGE -->
                            <img alt="" class="rev-slidebg" data-bgparallax="0" src="images-interior-landing/slider/wide2.jpg">

                            <div class="tp-caption size-72 font-weight-thin text-white" data-x="center" data-y="270" data-height="none" data-whitespace="nowrap"  data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:2;scaleY:2;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.85;scaleY:0.85;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="1200" data-start="400" data-easing="easeInOutExpo" data-endspeed="400">
                                Beatiful Design
                            </div>

                            <div class="tp-caption size-72 font-weight-bold text-white" data-x="center" data-y="350" data-height="none" data-whitespace="nowrap"  data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:2;scaleY:2;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.85;scaleY:0.85;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-speed="1200" data-start="400" data-easing="easeInOutExpo" data-endspeed="400">
                                Modern Technology
                            </div>

                            <div class="tp-caption size-20 ls-20px sft" data-x="center" data-y="430" data-width="none" data-height="none" data-whitespace="nowrap"  data-speed="1200" data-start="400" data-easing="easeInOutExpo">
                                INCLUDED 200+ PAGES
                            </div>

                        </li>

                    </ul>
                </div>
            </section>
            <!-- revolution slider close -->

            <div id="info-box" class="no-padding mt-90 mobile-hide absolute z-index500 text-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="overlay10">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="info-box padding20">
                                            <i class="icon_clock_alt id-color"></i>
                                            <div class="info-box_text">
                                                <div class="info-box_title">Opening Times</div>
                                                <div class="info-box_subtite">Monday - Friday: 09:00 - 18:00</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="info-box padding20">
                                            <i class="icon_house_alt id-color"></i>
                                            <div class="info-box_text">
                                                <div class="info-box_title">Our Location</div>
                                                <div class="info-box_subtite">100 S Main St, Los Angeles, CA</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="info-box padding20">
                                            <i class="icon_headphones id-color"></i>
                                            <div class="info-box_text">
                                                <div class="info-box_title">Customer Support</div>
                                                <div class="info-box_subtite">+208 333 9296</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <section id="section-text">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-12 wow fadeInRight" data-wow-delay=".2s">
                            <div class="de_count ultra-big s2 text-center">
                                <h3 class="timer" data-to="25" data-speed="2000"></h3>
                                <span class="text-white">Years of Experience</span>
                            </div>
                        </div>
                        <div class="col-lg-4 p-lg-5  mb-sm-30 wow fadeInRight" data-wow-delay=".4s">
                            <h2 class="style-2 id-color">Welcome</h2>
                            <h2>Your Best Partner for Architecture and Construction</h2>
                        </div>

                        <div class="col-lg-4 wow fadeInRight" data-wow-delay=".6s">
                            <p>
                                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- section begin -->
            <section id="section-services" class="pt60 pb20" data-bgcolor="#ffffff">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="carousel-4-center-dots owl-carousel owl-theme">
                                <div class="item text-middle text-light">
                                    <div data-bgimage="url(images-interior-landing/services/se_1.jpg) center">
                                        <div class="padding40 overlay60">
                                            <h3>Furniture Layouts</h3>
                                            <p>Our commitment to quality and services ensure our clients happy. With years of experiences
                                                and continuing research, our team is ready to serve your interior design needs.</p>
                                            <a href="#" class="btn-line btn-fullwidth">Read More</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item text-middle text-light">
                                    <div data-bgimage="url(images-interior-landing/services/se_2.jpg) center">
                                        <div class="padding40 overlay60">
                                            <h3>Space Planning</h3>
                                            <p>Our commitment to quality and services ensure our clients happy. With years of experiences
                                                and continuing research, our team is ready to serve your interior design needs.</p>
                                            <a href="#" class="btn-line btn-fullwidth">Read More</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item text-middle text-light">
                                    <div data-bgimage="url(images-interior-landing/services/se_3.jpg) center">
                                        <div class="padding40 overlay60">
                                            <h3>Floor Plans</h3>
                                            <p>Our commitment to quality and services ensure our clients happy. With years of experiences
                                                and continuing research, our team is ready to serve your interior design needs.</p>
                                            <a href="#" class="btn-line btn-fullwidth">Read More</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item text-middle text-light">
                                    <div data-bgimage="url(images-interior-landing/services/se_4.jpg) center">
                                        <div class="padding40 overlay60">
                                            <h3>Custom Furniture</h3>
                                            <p>Our commitment to quality and services ensure our clients happy. With years of experiences
                                                and continuing research, our team is ready to serve your interior design needs.</p>
                                            <a href="#" class="btn-line btn-fullwidth">Read More</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item text-middle text-light">
                                    <div data-bgimage="url(images-interior-landing/services/se_5.jpg) center">
                                        <div class="padding40 overlay60">
                                            <h3>Kitchen &amp; Bedroom</h3>
                                            <p>Our commitment to quality and services ensure our clients happy. With years of experiences
                                                and continuing research, our team is ready to serve your interior design needs.</p>
                                            <a href="#" class="btn-line btn-fullwidth">Read More</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item text-middle text-light">
                                    <div data-bgimage="url(images-interior-landing/services/se_6.jpg) center">
                                        <div class="padding40 overlay60">
                                            <h3>Preconstruction</h3>
                                            <p>Our commitment to quality and services ensure our clients happy. With years of experiences
                                                and continuing research, our team is ready to serve your interior design needs.</p>
                                            <a href="#" class="btn-line btn-fullwidth">Read More</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </section>
            <!-- section close -->

            <!-- section begin -->
            <section id="section-testimonial" data-bgimage="url(images-interior-landing/bg/1.jpg) fixed" aria-label="section" class="text-light" data-stellar-background-ratio=".2">
                <div class="container">
                    <div class="row">

                        <div class="col-md-8 offset-md-2 wow fadeInUp">

                            <div id="testimonial-carousel-single" class="owl-carousel owl-theme wow fadeInUp">
                                <blockquote class="testimonial-big">
                                    <span class="title">Amazing, beyond our expectation!</span>
                                    We always impressed with the quality. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.

                                    <span class="name">John, Four Seasons Hotel</span>
                                </blockquote>

                                <blockquote class="testimonial-big">
                                    <span class="title">Modern and great design!</span>
                                    Just wow! I'm always impressed with the services. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.

                                    <span class="name">Sandra, Hilton Hotel</span>
                                </blockquote>

                                <blockquote class="testimonial-big">
                                    <span class="title">Better than we think!</span>
                                    I'm always impressed with the services. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.

                                    <span class="name">Michael, Central Park Mall</span>
                                </blockquote>
                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-3 wow fadeIn" data-wow-delay="0">
                            <div class="de_count">
                                <h3 class="timer" data-to="2350" data-speed="2500">0</h3>
                                <span class="text-light">Hours of Works</span>
                            </div>
                        </div>

                        <div class="col-md-3 wow fadeIn" data-wow-delay=".25s">
                            <div class="de_count">
                                <h3 class="timer" data-to="128" data-speed="2500">0</h3>
                                <span class="text-light">Projects Complete</span>
                            </div>
                        </div>

                        <div class="col-md-3 wow fadeIn" data-wow-delay=".5s">
                            <div class="de_count">
                                <h3 class="timer" data-to="750" data-speed="2500">0</h3>
                                <span class="text-light">Slice of Pizza</span>
                            </div>
                        </div>

                        <div class="col-md-3 wow fadeIn" data-wow-delay=".75s">
                            <div class="de_count">
                                <h3 class="timer" data-to="520" data-speed="2500">0</h3>
                                <span class="text-light">Cups of Coffee</span>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- section close -->

            <!-- section begin -->
            <section id="section-portfolio" class="no-top pb50" aria-label="section-portfolio">
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

                    <div id="gallery" class="row gallery full-gallery de-gallery pf_4_cols wow fadeInUp" data-wow-delay=".3s">

                        <!-- gallery item -->
                        <div class="col-md-3 col-sm-6 col-xs-12 item mb30 residential">
                            <div class="picframe">
                                <a class="simple-ajax-popup-align-top" href="project-details-1.html">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Eco Green Interior</span>
                                    </span>
                                </span>
                                </a>
                                <img src="images-interior-landing/portfolio/pf%20(1).jpg" alt="" />
                            </div>
                        </div>
                        <!-- close gallery item -->

                        <!-- gallery item -->
                        <div class="col-md-3 col-sm-6 col-xs-12 item mb30 hospitaly">
                            <div class="picframe">
                                <a class="simple-ajax-popup-align-top" href="project-details-2.html">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Modern Elegance Suite</span>
                                    </span>
                                </span>
                                </a>

                                <img src="images-interior-landing/portfolio/pf%20(2).jpg" alt="" />
                            </div>
                        </div>
                        <!-- close gallery item -->

                        <!-- gallery item -->
                        <div class="col-md-3 col-sm-6 col-xs-12 item mb30 hospitaly">
                            <div class="picframe">
                                <a class="simple-ajax-popup-align-top" href="project-details-3.html">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Apartment Renovation</span>
                                    </span>
                                </span>
                                </a>

                                <img src="images-interior-landing/portfolio/pf%20(3).jpg" alt="" />
                            </div>
                        </div>
                        <!-- close gallery item -->

                        <!-- gallery item -->
                        <div class="col-md-3 col-sm-6 col-xs-12 item mb30 residential">
                            <div class="picframe">
                                <a class="simple-ajax-popup-align-top" href="project-details-youtube.html">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Youtube Video</span>
                                    </span>
                                </span>
                                </a>
                                <img src="images-interior-landing/portfolio/pf%20(4).jpg" alt="" />
                            </div>
                        </div>
                        <!-- close gallery item -->

                        <!-- gallery item -->
                        <div class="col-md-3 col-sm-6 col-xs-12 item mb30 office">
                            <div class="picframe">
                                <a class="simple-ajax-popup-align-top" href="project-details-vimeo.html">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Vimeo Video</span>
                                    </span>
                                </span>
                                </a>
                                <img src="images-interior-landing/portfolio/pf%20(5).jpg" alt="" />
                            </div>
                        </div>
                        <!-- close gallery item -->

                        <!-- gallery item -->
                        <div class="col-md-3 col-sm-6 col-xs-12 item mb30 commercial">
                            <div class="picframe">
                                <a class="simple-ajax-popup-align-top" href="project-details.html">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Restaurant In Texas</span>
                                    </span>
                                </span>
                                </a>
                                <img src="images-interior-landing/portfolio/pf%20(6).jpg" alt="" />
                            </div>
                        </div>
                        <!-- close gallery item -->

                        <!-- gallery item -->
                        <div class="col-md-3 col-sm-6 col-xs-12 item mb30 residential">
                            <div class="picframe">
                                <a class="simple-ajax-popup-align-top" href="project-details.html">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Summer House</span>
                                    </span>
                                </span>
                                </a>

                                <img src="images-interior-landing/portfolio/pf%20(7).jpg" alt="" />
                            </div>
                        </div>
                        <!-- close gallery item -->

                        <!-- gallery item -->
                        <div class="col-md-3 col-sm-6 col-xs-12 item mb30 office">
                            <div class="picframe">
                                <a class="simple-ajax-popup-align-top" href="project-details.html">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Office On Space</span>
                                    </span>
                                </span>
                                </a>

                                <img src="images-interior-landing/portfolio/pf%20(8).jpg" alt="" />
                            </div>
                        </div>
                        <!-- close gallery item -->

                    </div>

                </div>
                <div id="loader-area">
                    <div class="project-load"></div>
                </div>
            </section>
            <!-- section close -->

            <section id="section-why-choose-us-2" class="de_light" data-bgcolor="#ffffff">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="box-icon top">
                                <span class="icon wow bounceIn" data-wow-delay="0s"><i class="id-color icon-paintbrush"></i></span>
                                <div class="text wow fadeIn" data-wow-delay=".15s">
                                    <h3 class="style-1">Interior Expertise</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                        laudantium, totam rem aperiam.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="box-icon top">
                                <span class="icon wow bounceIn" data-wow-delay=".25s"><i class="id-color icon-trophy"></i></span>
                                <div class="text wow fadeIn" data-wow-delay=".4s">
                                    <h3 class="style-1">Awards Winning</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                        laudantium, totam rem aperiam.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="box-icon top">
                                <span class="icon wow bounceIn" data-wow-delay=".5s"><i class="id-color icon-chat"></i></span>
                                <div class="text wow fadeIn" data-wow-delay=".65s">
                                    <h3 class="style-1">Free Consultation</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                        laudantium, totam rem aperiam.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="box-icon top">
                                <span class="icon wow bounceIn" data-wow-delay=".75s"><i class="id-color icon-wallet"></i></span>
                                <div class="text wow fadeIn" data-wow-delay=".9s">
                                    <h3 class="style-1">Affordable Price</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                        laudantium, totam rem aperiam.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="section-how-it-works" data-bgimage="url(images-interior-landing/bg/2.jpg) fixed center" data-stellar-background-ratio=".2">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-5 wow fadeInRight" data-wow-delay=".2s">
                            <h2 class="style-2"><span class="id-color">Discover</span></h2><br>
                            <h2>How It Works?</h2>
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
												<a id="play-video" class="video-play-button popup-youtube" href="https://www.youtube.com/watch?v=CmCIZ_aUAeQ">
													<span></span>
												</a>
											</span>
										</span>
                                <img src="images-interior-landing/misc/1.jpg" class="img-fullwidth" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
            </section>

            <!-- section begin -->
            <section id="call-to-action" class="text-dark call-to-action padding40 text-light bg-color"aria-label="cta">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-7">
                            <h3 class="size-2 no-margin">We Are the Leading of Interior Design Company</h3>
                        </div>

                        <div class="col-lg-4 col-md-5 text-right">
                            <a href="contact.html" class="btn-line-white">Contact Us Now</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- logo carousel section close -->


            <!-- footer begin -->
            <footer class="text-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <h3>About Us</h3> We are team based on Los Angeles. Our expertise
                            on Interior Design. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae
                            vitae dicta sunt explicabo.
                        </div>

                        <div class="col-md-3">
                            <div class="widget widget_recent_post">
                                <h3>Latest News</h3>
                                <ul>
                                    <li><a href="">The Essentials Interior Design Tips</a></li>
                                    <li><a href="#">Functional Wall-to-Wall Shelves</a></li>
                                    <li><a href="#">9 Unique Ways to Display Your TV</a></li>
                                    <li><a href="#">The 5 Secrets to Minimal Design</a></li>
                                    <li><a href="#">Make a Huge Impact With Multiples</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <h3>Contact Us</h3>
                            <div class="widget widget-address">
                                <address>
                                    <span>100 S Main St, Los Angeles, CA</span>
                                    <span><strong>Phone:</strong>(208) 333 9296</span>
                                    <span><strong>Fax:</strong>(208) 333 9298</span>
                                    <span><strong>Email:</strong><a href="mailto:contact@archi-interior.com">contact@archi-interior.com</a></span>
                                    <span><strong>Web:</strong><a href="#">http://archi-interior.com</a></span>
                                </address>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="widget widget_recent_post">
                                <h3>Our Services</h3>
                                <ul>
                                    <li><a href="#">Interior Design</a></li>
                                    <li><a href="#">Architecture</a></li>
                                    <li><a href="#">Industry</a></li>
                                    <li><a href="#">Consulting</a></li>
                                    <li><a href="#">Photography</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="subfooter">
                    <div class="container">
                        <div class="row align-items-middle">
                            <div class="col-md-3">
                                <img src="images-interior-landing/logo.png" class="logo-small" alt=""><br>
                            </div>

                            <div class="col-md-6 text-center">
                                &copy; Copyright 2021 - Archi Interior Design Template by <span class="id-color">Designesia</span>
                            </div>

                            <div class="col-md-3 text-right">
                                <div class="social-icons">
                                    <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                                    <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
                                    <a href="#"><i class="fa fa-rss fa-lg"></i></a>
                                    <a href="#"><i class="fa fa-google-plus fa-lg"></i></a>
                                    <a href="#"><i class="fa fa-skype fa-lg"></i></a>
                                    <a href="#"><i class="fa fa-dribbble fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="#" id="back-to-top"></a>
            </footer>
            <!-- footer close -->
        </div>
    </div>
@endsection
@section('extra-js')

    <script>
        jQuery(document).ready(function() {
            // revolution slider
            jQuery("#slider-revolution").revolution({
                sliderType: "standard",
                sliderLayout: "fullscreen",
                delay: 5000,
                navigation: {
                    arrows: {
                        enable: true
                    },
                    bullets: {
                        enable: false,
                        style: 'hermes'
                    },

                },
                parallax: {
                    type: "mouse",
                    origo: "slidercenter",
                    speed: 2000,
                    levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                },
                responsiveLevels:[1920,1380,1240],
                gridwidth:[1300,1200,940],
                spinner: "off",
                gridheight: 700,
                disableProgressBar: "on"
            });
        });
    </script>

    <script>
        $(window).on("load", function(){
            $(".twentytwenty-container[data-orientation!='vertical']").twentytwenty({default_offset_pct: 0.7});
            $(".twentytwenty-container[data-orientation='vertical']").twentytwenty({default_offset_pct: 0.3, orientation: 'vertical'});
        });
    </script>
@endsection
