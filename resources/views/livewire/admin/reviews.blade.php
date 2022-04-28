
<div class="config block">
    <div class="tab-content">
        <!-- 1st Block of tab-content -->
        <div class="tab-pane active" id="home">
            <div class="row ">
                <div class="col-12">
                    <h3>List of Customer Reviews</h3>
                    <br/>
                    <div class="list-group">
                        @foreach($aReviews['reviews'] ?? [] as $aReview)
                            <button type="button" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-2" style="font-weight: bold">{{ $aReview['author_name'] }}</h5>
                                    <small>{{ $aReview['rating'] }} stars</small>
                                </div>
                                <p class="mb-1" style="padding: 10px">{!! $aReview['text'] !!}</p>
                                <small>ID: {{ $aReview['time'] }}</small>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
