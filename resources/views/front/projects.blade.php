@extends('layouts.front', [
    'title' => 'Landscaping | Portfolio',
    'description' => 'Our design services are professionally done, we also offer 3D designs for your project. Check our existing and future projects.'
    ])
@section('body')
    <div id="wrapper">
        @include('front.navigation.header', ['active' => 'portfolio', 'auto_show' => false])
        <!-- subheader -->
            <section id="subheader" style="background: linear-gradient(rgba(0,0,0,0.8), rgba(43,31,21,0.4)), url('{{ url('img/leaves.jpeg') }}') bottom fixed" data-type="background">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Portfolio</h1>
                            <ul class="crumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li class="sep">/</li>
                                <li>Portfolio</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        @livewire('projects')
        <!-- subheader close -->
        @include('front.navigation.footer')
    </div>
@endsection
@section('extra-js')
@endsection
