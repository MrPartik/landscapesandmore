@extends('layouts.front', [
    'title' => env('APP_TITLE') ?? 'Michaelangelo\'s' . ' | Blog',
    'description' => 'Check our blog page to have a better idea about us and what we can do for you! We give constant information about your lawn and anything project-related ideas.'
    ])
@section('body')
    <div id="wrapper">
    @include('front.navigation.header', ['active' => 'blog', 'auto_show' => false])
    <!-- subheader -->
        <section id="subheader" style="background: linear-gradient(rgba(0,0,0,0.8), rgba(43,31,21,0.4)), url('{{ url('img/leaves.jpeg') }}') bottom fixed" data-type="background">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Blog</h1>
                        <ul class="crumb">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li class="sep">/</li>
                            <li>Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- content begin -->
        @livewire('blog')
        </section>
        <!-- subheader close -->
        @include('front.navigation.footer')
    </div>
@endsection
@section('extra-js')
@endsection
