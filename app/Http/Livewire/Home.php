<?php

namespace App\Http\Livewire;

use App\Http\GoogleApi\GoogleClient;
use Livewire\Component;

class Home extends Component
{
    use GoogleClient;

    public $aReviews = [];

    public function render()
    {
        $this->initCustomerReviews();
        return view('livewire.home');
    }

    public function initCustomerReviews()
    {
        $aResult = $this->get(sprintf('https://maps.googleapis.com/maps/api/place/details/json?place_id=%s&fields=name,rating,formatted_phone_number,reviews&key=%s', config('google.place_key'), config('google.api_key')));
        $this->aReviews = $aResult['result'] ?? [];
    }
}
