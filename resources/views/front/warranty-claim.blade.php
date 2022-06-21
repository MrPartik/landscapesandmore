@extends('layouts.front', [
    'title' => 'Warranty | ' . (env('APP_TITLE') ?? 'Michaelangelo\'s Sustainable Landscape and Design Group'),
    'description' => 'Michaelangelo is a reputable business that offers a one-time warranty to its customers and design solutions for residential and commercial properties.'
    ])
@section('body')
    <div id="wrapper">
    @include('front.navigation.header', ['active' => 'warranty', 'auto_show' => false])
    <!-- subheader -->
        <section id="subheader" style="background: linear-gradient(rgba(0,0,0,0.8), rgba(43,31,21,0.4)), url('{{ url('img/leaves.jpeg') }}') bottom fixed" data-type="background">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Warranty</h1>
                        <ul class="crumb">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li class="sep">/</li>
                            <li>Warranty</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- content begin -->
        <section aria-label="section">
            @livewire('warranty')
        </section>
        <!-- subheader close -->
        @include('front.navigation.footer')
    </div>
@endsection
