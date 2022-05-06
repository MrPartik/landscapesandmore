<?php

namespace App\Http\Livewire;

use App\Http\GoogleApi\GoogleClient;
use App\Models\InteractiveMaps as InteractiveMapsModel;
use App\Models\Reviews as ReviewModel;
use Livewire\Component;

class Home extends Component
{
    use GoogleClient;

    public $aReviews = [];
    public $aMapDetails = [];

    public function render()
    {
        $this->initCustomerReviews();
        $this->initMapData();
        return view('livewire.home');
    }

    public function initCustomerReviews()
    {
        $this->aReviews = ReviewModel::where('is_active', true)->get();
//        $aResult = $this->get(sprintf('https://maps.googleapis.com/maps/api/place/details/json?place_id=%s&fields=name,rating,formatted_phone_number,reviews&key=%s', config('google.place_key'), config('google.api_key')));
//        $this->aReviews = $aResult['result'] ?? [];
    }

    public function initMapData()
    {
        $oMapModel = InteractiveMapsModel::with('mapCoordinates')->where('is_active', true)->get();
        $this->aMapDetails = [];
        foreach ($oMapModel as $oMapData) {
            $aCoordinates = [];
            if (in_array($oMapData->map_type, ['Polygon']) === true) {
                foreach ($oMapData->mapCoordinates as $oMapCoordinate) {
                    $aCoordinates[0][] = [
                        $oMapCoordinate->lat, $oMapCoordinate->long
                    ];
                }
            } else {
                $aCoordinates = [
                    $oMapData->mapCoordinates->first()->lat,
                    $oMapData->mapCoordinates->first()->long,
                ];
            }
            $this->aMapDetails[] = [
                'type'       => 'Feature',
                'properties' => array_merge(json_decode($oMapData->map_options, true) ?? [], [
                    'map_name'        => $oMapData->map_name,
                    'map_images'      => $oMapData->map_images,
                    'map_description' => $oMapData->map_description,
                    'map_id'          => $oMapData->map_id
                ]),
                'geometry'   => [
                    'type' => $oMapData->map_type,
                    'coordinates' => $aCoordinates
                ]
            ];
        }
    }
}
