@extends('layouts.front', ['title' => 'Landscaping | Contact Us'])
@section('body')
    <div id="wrapper">
    @include('front.navigation.header', ['active' => 'contact-us', 'auto_show' => false])
    <!-- subheader -->
        <section id="subheader" style="background: linear-gradient(rgba(0,0,0,0.8), rgba(43,31,21,0.4)), url('{{ url('img/landscapes/traditional firepit.jpg') }}') bottom fixed" data-type="background">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Contact Us</h1>
                        <ul class="crumb">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li class="sep">/</li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- content begin -->
        <section aria-label="section">
{{--            <section id="de-map" class="no-top" aria-label="map-container">--}}
{{--                <div class="map-container map-fullwidth">--}}
{{--                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3302.2925027157567!2d-84.23974664948726!3d34.13885802051331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88f59db06c2cf0a9%3A0x47c84b6b2b443d3f!2s2204%20Justin%20Trail%2C%20Alpharetta%2C%20GA%2030004%2C%20USA!5e0!3m2!1sen!2sid!4v1648636989619!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>--}}
{{--                </div>--}}
{{--            </section>--}}
        @livewire('contact-us')
        </section>
        <!-- content close -->
        <!-- subheader close -->
        @include('front.navigation.footer')
    </div>
@endsection
@section('extra-js')
@endsection
