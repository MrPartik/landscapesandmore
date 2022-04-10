<!-- content begin -->
<div id="content">
    <div class="container">
        <div class="row">
            @foreach($aBlogs as $aBlog)
                <div class="col-lg-4 col-md-6 mb30">
                    <div class="bloglist item">
                        <div class="post-content">
                            <div class="post-image">
                                <a class="image-popup-no-margins" href="{{ url($aBlog->featured_image) }}">
                                    <img alt="" src="{{ url($aBlog->featured_image) }}">
                                </a>
                            </div>
                            <div class="post-text">
                                <span class="p-tagline">{{ $aBlog->tags }}</span>
                                <h4><a href="/blog/{{ str_replace(' ', '-', mb_strtolower($aBlog->title)) }}">{{ $aBlog->title }}</a></h4>
                                <p>{{ $aBlog->description }}</p>
                                <span class="p-date">{{ $aBlog->updated_at }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
{{--            <div class="spacer-single"></div>--}}

{{--            <ul class="pagination m-auto">--}}
{{--                <li><a href="#">Prev</a></li>--}}
{{--                <li class="active"><a href="#">1</a></li>--}}
{{--                <li><a href="#">2</a></li>--}}
{{--                <li><a href="#">3</a></li>--}}
{{--                <li><a href="#">4</a></li>--}}
{{--                <li><a href="#">5</a></li>--}}
{{--                <li><a href="#">Next</a></li>--}}
{{--            </ul>--}}

        </div>

    </div>
</div>
