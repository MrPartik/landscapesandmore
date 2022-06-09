@extends('layouts.front', [
    'title' => 'Landscaping | Project Tracker',
    'description' => 'Our project tracker is a free service for our customers. It keeps you informed about the progress of your project status updates by simply entering your valid email address.'
    ])
@section('body')
    <div id="wrapper">
        @include('front.navigation.header', ['active' => 'process', 'auto_show' => false])
        <!-- subheader -->
            <section id="subheader" style="background: linear-gradient(rgba(0,0,0,0.8), rgba(43,31,21,0.4)), url('{{ url('img/leaves.jpeg') }}') bottom fixed" data-type="background">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Project Tracker</h1>
                            <ul class="crumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li class="sep">/</li>
                                <li>Project Tracker</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        <!-- subheader close -->
            @livewire('process')
        @include('front.navigation.footer')
    </div>
@endsection
@section('extra-js')
@endsection
