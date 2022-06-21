@extends('layouts.front', [
    'title' => ucwords($sTitle) . ' | ' . (env('APP_TITLE') ?? 'Michaelangelo\'s Sustainable Landscape and Design Group' ),
    'description' => ucwords($sTitle) . '|' . $aBlog->tags
    ])
@php
    $aBlog = \App\Models\Blog::with('user')->where('blog_id', $iId)->where('is_active', 1)->first();
    if(empty($aBlog) === true) abort(404);
@endphp
@section('body')

    <link href="{{ url('/css/kothing/kothing-editor.min.css') }}" rel="stylesheet"/>
    <div id="wrapper">
    @include('front.navigation.header', ['active' => 'blog', 'auto_show' => false])
    <!-- subheader -->
        <!-- content begin -->
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-read">
                            <div class="post-content">
                                <div class="post-image" style="background: url('{{ url($aBlog->featured_image) }}'); height: 500px; background-size: cover">
                                </div>
                                <div class="date-box">
                                    <div class="day">{{ \Carbon\Carbon::createFromDate($aBlog->updated_at)->format('d') }}</div>
                                    <div class="month">{{ \Carbon\Carbon::createFromDate($aBlog->updated_at)->format('M') }}</div>
                                </div>

                                <div class="post-text" style="min-width: 200px">
                                    <h3><a href="javscript:">{{ $aBlog->title }}</a></h3>
                                    <div class="kothing-editor-editable">
                                        {!! $aBlog->content ?? '' !!}
                                    </div>
                                    <div class="spacer-single"></div>
                                </div>
                            </div>
                            <div class="post-meta"><span><i class="fa fa-user id-color"></i>By: <a href="javascript:">{{ $aBlog->user->name }}</a></span> <span><i class="fa fa-tag id-color"></i>{{ $aBlog->tags }}</span></div>
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
