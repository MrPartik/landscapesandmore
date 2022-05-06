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
                    @foreach($aReviews ?? [] as $iKey => $aReview)
                        @if(in_array($aReview['time'], explode(',', env('DISPLAYED_REVIEW_KEYS')) ?? []) === true)
                            <blockquote class="testimonial-big s2">
                                <span class="title">{{ (strlen($aReview['summary']) > 0) ? $aReview['summary'] : $aReview['snippet']  }}</span>
                                <span style="font-size: 25px;">
                                    <span class="fa fa-star {{ ((intval($aReview['rating']) >= 1) ? 'checked' : '') }}"></span>
                                    <span class="fa fa-star {{ ((intval($aReview['rating']) >= 2) ? 'checked' : '') }}"></span>
                                    <span class="fa fa-star {{ ((intval($aReview['rating']) >= 3) ? 'checked' : '') }}"></span>
                                    <span class="fa fa-star {{ ((intval($aReview['rating']) >= 4) ? 'checked' : '') }}"></span>
                                    <span class="fa fa-star {{ ((intval($aReview['rating']) >= 5) ? 'checked' : '') }}"></span>
                                </span>
                                <br/>
                                {{ $aReview['description'] }}
                                <span class="name">{{ $aReview['author'] }}</span>
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
    <script>
        $(document).ready(function () {
            setTimeout(function(){

                let oMap = L.map('map', {
                    editable: false,
                    doubleClickZoom: false,
                    scrollWheelZoom: false,
                }).setView([32.648325, -83.444534], 7);
                let oDrawnItems = L.geoJson();
                L.gridLayer.googleMutant({
                    maxZoom: 24,
                    type: 'hybrid'
                }).addTo(oMap);
                L.geoJson({!! json_encode($aMapDetails, true) !!}).eachLayer(function (oLayer) {
                    let oProperties = oLayer.feature.properties;
                    if (oProperties.radius) {
                        oLayer = new L.Circle(oLayer.feature.geometry.coordinates.reverse(), oProperties);
                    }
                    oDrawnItems.addLayer(oLayer).addTo(oMap);
                    oLayer.bindPopup("<center>" +
                        "<strong>" + oProperties.map_name + "</strong><br/>" +
                        oProperties.map_description + "<br/>" +
                        ((oProperties.map_images.length > 0) ?
                            "<hr style='margin: 10px'/> " +
                            "<a href='" + oProperties.map_images + "' target='_blank'><img style='width: 100%; min-width: 200px' src='" + oProperties.map_images + "'></img></a>" : '') +
                        "</center>");
                });
            }, 1000);
        });
    </script>
</section>
