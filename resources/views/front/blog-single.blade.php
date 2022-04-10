@extends('layouts.front', ['title' => 'Landscaping | ' .  $sTitle])
@php
    $aBlog = \App\Models\Blog::with('user')->where('title', $sTitle)->first();
@endphp
@section('body')
    <div id="wrapper">
    @include('front.navigation.header', ['active' => 'blog', 'auto_show' => false])
    <!-- subheader -->
        <section id="subheader" style="background: linear-gradient(rgba(0,0,0,0.8), rgba(43,31,21,0.4)), url('{{ url('img/landscapes/traditional firepit.jpg') }}') bottom fixed" data-type="background">
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
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="blog-read">
                            <div class="post-content">
                                <div class="post-image" style="background: url('{{ url($aBlog->featured_image) }}'); height: 40vh; background-size: cover">
                                </div>

                                <div class="date-box">
                                    <div class="day">{{ date('d', $aBlog->updated_at) }}</div>
                                    <div class="month">{{ date('M', $aBlog->updated_at) }}</div>
                                </div>

                                <div class="post-text" style="min-width: 200px">
                                    <h3><a href="javscript:">{{ $aBlog->title }}</a></h3>
                                    {!! $aBlog->content !!}
                                    <div class="spacer-single"></div>
                                </div>
                            </div>

                            <div class="post-meta"><span><i class="fa fa-user id-color"></i>By: <a href="javascript:">{{ $aBlog->user->name }}</a></span> <span><i class="fa fa-tag id-color"></i>{{ $aBlog->tags }}</span></div>
                        </div>
                    </div>
                    <div id="sidebar" class="col-md-4">
                        <div class="widget widget-post">
                            <h4>Recent Posts</h4>
                            <div class="small-border"></div>
                            <ul>
                                @foreach(\App\Models\Blog::all()->where('is_active', 1) as $aBlog)
                                    <li><a href="/blog/{{ str_replace(' ', '-', mb_strtolower($aBlog->title)) }}">{{ $aBlog->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <!-- subheader close -->
        @include('front.navigation.footer')
    </div>
@endsection
@section('extra-js')
@endsection
