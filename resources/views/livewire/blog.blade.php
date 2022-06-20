<!-- content begin -->
<div id="content">
    <div class="container">
        <div class="row">
            @if(count($aBlogs) <= 0)
                <strong style="text-align-last: center;">No blog as of the moment.</strong>
            @endif
            @foreach($aBlogs as $aBlog)
                <div class="col-lg-4 col-md-6 mb30">
                    <div class="bloglist item">
                        <div class="post-content">
                            <div class="post-image">
                                <a class="" href="/blog/{{ str_replace(' ', '-', mb_strtolower(trim($aBlog->title))) . '/' . $aBlog->blog_id }}">
                                    <img alt="" src="{{ url($aBlog->featured_image) }}">
                                </a>
                            </div>
                            <div class="post-text">
                                <span class="p-tagline" style="color:white">{{ $aBlog->tags }}</span>
                                <h4><a href="/blog/{{ str_replace(' ', '-', mb_strtolower(trim($aBlog->title))) . '/' . $aBlog->blog_id }}">{{ $aBlog->title }}</a></h4>
                                <p>{{ $aBlog->description }}</p>
                                <span class="p-date">{{ \Carbon\Carbon::make($aBlog->updated_at)->format('M d, Y h:i a') }}</span>
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
