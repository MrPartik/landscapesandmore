@extends('layouts.front', ['title' => 'Landscaping | Our Process'])
@section('body')
    <div id="wrapper">
        @include('front.navigation.header', ['active' => 'process', 'auto_show' => false])
        <!-- subheader -->
            <section id="subheader" style="background: linear-gradient(rgba(0,0,0,0.8), rgba(43,31,21,0.4)), url('{{ url('img/landscapes/zooming-house.jpg') }}') bottom fixed" data-type="background">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Our Process</h1>
                            <ul class="crumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li class="sep">/</li>
                                <li>Our Process</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        <!-- subheader close -->
        @php
            $sDate = date('M d, Y')
        @endphp
        <!-- section begin -->
            <section aria-label="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mb-sm-30">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <strong>Install Landscape and Design</strong>
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
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
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <strong>Maintenance and Turf Care Services</strong>
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
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
                </div>
            </section>
        <!-- section close -->
        @include('front.navigation.footer')
    </div>
@endsection
@section('extra-js')
@endsection
