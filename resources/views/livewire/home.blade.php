<!-- section begin -->
<section style="background: linear-gradient(rgba(0,0,0,0.77), rgba(0,0,0,0.77)), url('{{ url('img/landscapes/zooming-house.jpg') }}') center fixed" class="text-light"  >
    <style>
        .checked {
            color: var(--primary-color-1);
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                <h1>Customer Says</h1>
                <div class="separator"><span><i class="fa fa-circle"></i></span></div>
            </div>
            <div class="col-md-8 offset-md-2">
                <div id="testimonial-carousel-single" class="owl-carousel owl-theme wow fadeInUp">
                    @foreach($aReviews['reviews'] ?? [] as $iKey => $aReview)
                        @if(in_array($aReview['time'], explode(',', env('DISPLAYED_REVIEW_KEYS')) ?? []) === true)
                            <blockquote class="testimonial-big s2">
                                <span style="font-size: 25px;">
                                    <span class="fa fa-star {{ ((intval($aReview['rating']) >= 1) ? 'checked' : '') }}"></span>
                                    <span class="fa fa-star {{ ((intval($aReview['rating']) >= 2) ? 'checked' : '') }}"></span>
                                    <span class="fa fa-star {{ ((intval($aReview['rating']) >= 3) ? 'checked' : '') }}"></span>
                                    <span class="fa fa-star {{ ((intval($aReview['rating']) >= 4) ? 'checked' : '') }}"></span>
                                    <span class="fa fa-star {{ ((intval($aReview['rating']) >= 5) ? 'checked' : '') }}"></span>
                                </span>
                                <br/>
                                {{ $aReview['text'] }}
                                <span class="name">{{ $aReview['author_name'] }}</span>
                            </blockquote>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="spacer-single"></div>
            <div class="col-md-12 wow fadeInUp" data-wow-delay="0s">
                <div id="logo-carousel" class="owl-carousel owl-theme">
                    @foreach(\App\Models\Awards::all()->where('is_active', 1) as $oAward)
                        <img src="{{ url($oAward->url) }}" class="img-responsive" alt="{{ $oAward->description }}" title="{{ $oAward->description }}">
                    @endforeach
                </div>
            </div>
            <div class="spacer-single"></div>

        </div>
    </div>
</section>
