@extends('layouts.front', ['title' => 'Landscaping | Our Process'])
@section('body')
    <div id="wrapper">
        @include('front.navigation.header', ['active' => 'process', 'auto_show' => false])
{{--        <!-- subheader -->--}}
{{--            <section id="subheader" style="background: linear-gradient(rgba(0,0,0,0.8), rgba(43,31,21,0.4)), url('{{ url('images-main/landscapes/zooming-house.jpg') }}') bottom fixed" data-type="background">--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <h1>Our Process</h1>--}}
{{--                            <ul class="crumb">--}}
{{--                                <li><a href="{{ url('/') }}">Home</a></li>--}}
{{--                                <li class="sep">/</li>--}}
{{--                                <li>Our Process</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
{{--        <!-- subheader close -->--}}
            <!-- section begin -->
            <section id="section-steps" class="text-light" style="margin-top: 70px">
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
                                    <li class="active wow fadeIn" data-wow-delay="0s"><span>Install Landscape and Design</span>
                                        <div class="v-border"></div>
                                    </li>
                                    <li class="wow fadeIn" data-wow-delay=".4s" onclick="window.scrollTo(window.scrollX, window.scrollY + .5);"><span>Maintenance and Turf Care Services</span>
                                        <div class="v-border"></div>
                                    </li>
                                </ul>
                                @php
                                    $sDate = date('M d, Y')
                                @endphp
                                <div class="de_tab_content">
                                    <div id="tab1">
                                        <!-- timeline begin -->
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-6 offset-md-3">
                                                        <div class="timeline exp">
                                                            <div class="tl-block wow fadeInUp" data-wow-delay="0">
                                                                <div class="tl-time">
                                                                    <h4>{{ $sDate }}</h4>
                                                                </div>
                                                                <div class="tl-bar">
                                                                    <div class="tl-line"></div>
                                                                </div>
                                                                <div class="tl-message">
                                                                    <div class="tl-icon">&nbsp;</div>
                                                                    <div class="tl-main">
                                                                        <h4 class="id-color">Talk to us
                                                                        </h4>
                                                                        Call - 770-940-4336 <br/>
                                                                        Email - info@landscapesandmore.com <br/>
                                                                        Chat - Website <br/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tl-block wow fadeInUp" data-wow-delay=".3s">
                                                                <div class="tl-time">
                                                                    <h4>{{ date('M d', strtotime($sDate . ' + 14 days')) }} - {{ date('M d, Y', strtotime($sDate . ' + 21 days')) }}</h4>
                                                                </div>
                                                                <div class="tl-bar">
                                                                    <div class="tl-line"></div>
                                                                </div>
                                                                <div class="tl-message">
                                                                    <div class="tl-icon">&nbsp;</div>
                                                                    <div class="tl-main">
                                                                        <h4 class="id-color">Consultation - Blueprint (Zoom Meeting)
                                                                        </h4>
                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="tl-block wow fadeInUp" data-wow-delay=".6s">
                                                                <div class="tl-time">
                                                                    <h4>{{ date('M d, Y', strtotime($sDate . ' + 28 days')) }}</h4>
                                                                </div>
                                                                <div class="tl-bar">
                                                                    <div class="tl-line"></div>
                                                                </div>
                                                                <div class="tl-message">
                                                                    <div class="tl-icon">&nbsp;</div>
                                                                    <div class="tl-main">
                                                                        <h4 class="id-color"> Design Presentation - Blueprint, Estimate
                                                                        </h4>
                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="tl-block wow fadeInUp" data-wow-delay=".9s">
                                                                <div class="tl-time">
                                                                    <h4>{{ date('M d, Y', strtotime($sDate . ' + 35 days')) }}</h4>
                                                                </div>
                                                                <div class="tl-bar">
                                                                    <div class="tl-line"></div>
                                                                </div>
                                                                <div class="tl-message">
                                                                    <div class="tl-icon">&nbsp;</div>
                                                                    <div class="tl-main">
                                                                        <h4 class="id-color">Contract Signing - Digitally Signed
                                                                        </h4>
                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tl-block wow fadeInUp" data-wow-delay=".9s">
                                                                <div class="tl-time">
                                                                    <h4>{{ date('M d, Y', strtotime($sDate . ' + 42 days')) }}</h4>
                                                                </div>
                                                                <div class="tl-bar">
                                                                    <div class="tl-line"></div>
                                                                </div>
                                                                <div class="tl-message">
                                                                    <div class="tl-icon">&nbsp;</div>
                                                                    <div class="tl-main">
                                                                        <h4 class="id-color">Project Installation
                                                                        </h4>
                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- timeline close -->
                                    </div>

                                    <div id="tab2">
                                        <!-- timeline begin -->
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6 offset-md-3">
                                                    <div class="timeline exp">
                                                        <div class="tl-block wow fadeInUp" data-wow-delay="0">
                                                            <div class="tl-time">
                                                                <h4>{{ $sDate }}</h4>
                                                            </div>
                                                            <div class="tl-bar">
                                                                <div class="tl-line"></div>
                                                            </div>
                                                            <div class="tl-message">
                                                                <div class="tl-icon">&nbsp;</div>
                                                                <div class="tl-main">
                                                                    <h4 class="id-color">Talk to us
                                                                    </h4>
                                                                    Call - 770-940-4336 <br/>
                                                                    Email - info@landscapesandmore.com <br/>
                                                                    Chat - Website <br/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tl-block wow fadeInUp" data-wow-delay=".3s">
                                                            <div class="tl-time">
                                                                <h4>{{ date('M d', strtotime($sDate . ' + 14 days')) }} - {{ date('M d, Y', strtotime($sDate . ' + 21 days')) }}</h4>
                                                            </div>
                                                            <div class="tl-bar">
                                                                <div class="tl-line"></div>
                                                            </div>
                                                            <div class="tl-message">
                                                                <div class="tl-icon">&nbsp;</div>
                                                                <div class="tl-main">
                                                                    <h4 class="id-color">Consultation (In Person)
                                                                    </h4>
                                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tl-block wow fadeInUp" data-wow-delay=".6s">
                                                            <div class="tl-time">
                                                                <h4>{{ date('M d, Y', strtotime($sDate . ' + 28 days')) }}</h4>
                                                            </div>
                                                            <div class="tl-bar">
                                                                <div class="tl-line"></div>
                                                            </div>
                                                            <div class="tl-message">
                                                                <div class="tl-icon">&nbsp;</div>
                                                                <div class="tl-main">
                                                                    <h4 class="id-color">Estimate
                                                                    </h4>
                                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tl-block wow fadeInUp" data-wow-delay=".9s">
                                                            <div class="tl-time">
                                                                <h4>{{ date('M d, Y', strtotime($sDate . ' + 35 days')) }}</h4>
                                                            </div>
                                                            <div class="tl-bar">
                                                                <div class="tl-line"></div>
                                                            </div>
                                                            <div class="tl-message">
                                                                <div class="tl-icon">&nbsp;</div>
                                                                <div class="tl-main">
                                                                    <h4 class="id-color">Contract Signing
                                                                    </h4>
                                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tl-block wow fadeInUp" data-wow-delay=".9s">
                                                            <div class="tl-time">
                                                                <h4>{{ date('M d, Y', strtotime($sDate . ' + 42 days')) }}</h4>
                                                            </div>
                                                            <div class="tl-bar">
                                                                <div class="tl-line"></div>
                                                            </div>
                                                            <div class="tl-message">
                                                                <div class="tl-icon">&nbsp;</div>
                                                                <div class="tl-main">
                                                                    <h4 class="id-color">Installation/ Maintenance Start
                                                                    </h4>
                                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- timeline close -->
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
