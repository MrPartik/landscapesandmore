<?php

namespace App\Http\Livewire\Admin;

use App\Http\GoogleApi\GoogleClient;
use App\Library\Utilities;
use Livewire\Component;

class Reviews extends Component
{
    use GoogleClient;

    public $aReviews = [];

    public $aDisplayedReviews = [];

    const DISPLAYED_REVIEW_KEYS = 'DISPLAYED_REVIEW_KEYS';

    public function render()
    {
        return view('livewire.admin.reviews');
    }

    public function mount()
    {
        $this->initDisplayReviews();
        $this->initCustomerReviews();
    }

    public function initDisplayReviews()
    {
        $this->aDisplayedReviews = explode(',', env(self::DISPLAYED_REVIEW_KEYS));
    }

    public function initCustomerReviews()
    {
        $aResult = $this->get(sprintf('https://maps.googleapis.com/maps/api/place/details/json?place_id=%s&fields=name,rating,formatted_phone_number,reviews&key=%s', config('google.place_key'), config('google.api_key')));
        $this->aReviews = $aResult['result'] ?? [];
    }

    public function toggleDisplayReview($mValue)
    {
        if (in_array($mValue, $this->aDisplayedReviews) === true) {
            unset($this->aDisplayedReviews[array_search($mValue, $this->aDisplayedReviews)]);
        } else {
            array_push($this->aDisplayedReviews, $mValue);
        }
        Utilities::setEnv(self::DISPLAYED_REVIEW_KEYS, implode(',', $this->aDisplayedReviews));
    }
}
