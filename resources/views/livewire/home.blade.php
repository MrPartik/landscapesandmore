<!-- section begin -->
<section style="background: linear-gradient(rgba(0,0,0,0.77), rgba(0,0,0,0.77)), url('{{ url('img/landscapes/zooming-house.jpg') }}') center fixed" class="text-light"  >
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                <h1>Customer Says</h1>
                <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                <div class="spacer-single"></div>
            </div>
            <div class="col-md-8 offset-md-2">
                <div id="testimonial-carousel-single" class="owl-carousel owl-theme wow fadeInUp">
                    @foreach($aReviews['reviews'] ?? [] as $iKey => $aReview)
                        <blockquote class="testimonial-big s2">
                            <span class="title">{{ $aReview['rating'] }} stars</span>
                                {{ $aReview['text'] }}
                            <span class="name">{{ $aReview['author_name'] }}</span>
                        </blockquote>
                    @endforeach
                </div>

            </div>

            <div class="spacer-double"></div>

            <div class="col-md-12 wow fadeInUp" data-wow-delay="0s">
                <div id="logo-carousel" class="owl-carousel owl-theme">
                    @foreach(\App\Models\Awards::all()->where('is_active', 1) as $oAward)
                        <img src="{{ url($oAward->url) }}" class="img-responsive" alt="{{ $oAward->description }}" title="{{ $oAward->description }}">
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
