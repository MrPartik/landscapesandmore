@extends('layouts.front', [
    'title' => (env('APP_TITLE') ?? 'Michaelangelo\'s Sustainable Landscape and Design Group' ) . ' | Contact Us',
    'description' => 'Contact us to ask about landscaping, lawn care services, and lawn mowing in the area through different channels, chat, email, or phone call.'
    ])
@section('body')
    <div id="wrapper">
    @include('front.navigation.header', ['active' => 'contact-us', 'auto_show' => false])
    <!-- subheader -->
        <section id="subheader" style="background: linear-gradient(rgba(0,0,0,0.8), rgba(43,31,21,0.4)), url('{{ url('img/leaves.jpeg') }}') bottom fixed" data-type="background">
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
            @livewire('contact-us')
        </section>
        <!-- content close -->
        <!-- subheader close -->
        @include('front.navigation.footer')
    </div>
@endsection
@section('extra-js')
@endsection
