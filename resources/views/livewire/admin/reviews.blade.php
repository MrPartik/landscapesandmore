
<div class="config block">
    <div class="loading-page" wire:loading.block wire:target="toggleDisplayReview">Loading&#8230;</div>
    <div class="tab-content">
        <!-- 1st Block of tab-content -->
        <div class="tab-pane active" id="home">
            <div class="row ">
                <div class="col-12">
                    <h3>List of Customer Reviews</h3>
                    <small>Please select which customer review you want to display in the website</small>
                    <br/>
                    <br/>
                    <div class="list-group">
                        @foreach($aReviews['reviews'] ?? [] as $aReview)
                            <button wire:click="toggleDisplayReview({{ $aReview['time'] }})" type="button" class="list-group-item list-group-item-action mb-1 {{ (in_array($aReview['time'], $aDisplayedReviews ?? []) === true) ? 'active' : '' }}">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-2" style="font-weight: bold">{{ $aReview['author_name'] }}</h5>
                                    <small>{{ $aReview['rating'] }} star{{ intval($aReview['rating']) === 1 ? '' : 's' }}</small>
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
