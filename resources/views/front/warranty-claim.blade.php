@extends('layouts.front', [
    'title' => 'Landscaping | Warranty',
    'description' => ''
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
