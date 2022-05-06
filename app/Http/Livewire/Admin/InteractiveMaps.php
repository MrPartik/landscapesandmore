<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\InteractiveMaps as InteractiveMapsModel;
use App\Models\InteractiveMapsCoordinates as InteractiveMapsCoordinatesModel;
use Livewire\WithFileUploads;
use function MongoDB\BSON\toJSON;

class InteractiveMaps extends Component
{
    use WithFileUploads;

    public $mapId = 0;
    public $aMapDetails = [];
    public $aToSaveLayerOption = [];
    public $aToSaveGeoJson = [];
    public $bShowModal = false;
    public $pictureOfProject = '';
    public $mapName = '';
    public $mapDescription = '';
    public $aMapDetailRules = [
        'pictureOfProject' => 'sometimes',
        'mapName'          => 'required',
        'mapDescription'   => 'required',
    ];


    public function render()
    {
        $this->initMapData();
        return view('livewire.admin.interactive-maps');
    }

    public function hydrate() {
        $this->resetErrorBag();
    }

    public function showMapModal() {
        $this->fetchedMapDetails();
        $this->bShowModal = true;
    }

    public function removePictureOfProject()
    {
        $this->pictureOfProject = null;
    }

    public function fetchedMapDetails() {
        if (intval($this->mapId) <= 0) {
            $this->mapName = '';
            $this->mapDescription = '';
            $this->pictureOfProject = '';
            return false;
        }
        $oMapModel = InteractiveMapsModel::find($this->mapId);
        $this->mapName = $oMapModel->map_name;
        $this->mapDescription = $oMapModel->map_description;
        $this->pictureOfProject = $oMapModel->map_images;
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

    public function deleteMap($iId)
    {
        InteractiveMapsModel::with('mapCoordinates')->where('map_id', $iId)->delete();
        $this->redirect('/admin/interactive-maps');
    }

    public function saveMap()
    {
        $this->validate($this->aMapDetailRules);
        $aMapCoordinates = $this->aToSaveGeoJson;
        $sMapType = $aMapCoordinates['geometry']['type'] ?? '';
        $oInteractiveMaps = ((intval($this->mapId) > 0) ? InteractiveMapsModel::find($this->mapId) : new InteractiveMapsModel());
        if (is_object($this->pictureOfProject) === true) {
            $sFIlePath = $this->pictureOfProject->storeAs('public', ',maps/project/' . time() . '.' . $this->pictureOfProject->getClientOriginalExtension());
            $sFIlePath = '/' . str_replace('public', 'storage', $sFIlePath);
        } else {
            $sFIlePath = $this->pictureOfProject;
        }
        $oInteractiveMaps->map_name = $this->mapName;
        ((intval($this->mapId) <= 0)) && $oInteractiveMaps->map_type = $sMapType;
        $oInteractiveMaps->map_description = $this->mapDescription;
        $oInteractiveMaps->map_images = $sFIlePath;
        ((intval($this->mapId) <= 0)) && $oInteractiveMaps->map_options = json_encode($this->aToSaveLayerOption, true);
        $oInteractiveMaps->save();
        if (intval($this->mapId) <= 0 && intval($oInteractiveMaps->map_id) > 0) {
            $bIsMultiPoint = in_array($sMapType, ['Polygon']);
            $aGeoMapsCoordinates = $aMapCoordinates['geometry']['coordinates'];
            $aGeoMapsCoordinates = ($bIsMultiPoint === true) ? $aGeoMapsCoordinates[0] : $aGeoMapsCoordinates;
            if ($bIsMultiPoint === true) {
                foreach ($aGeoMapsCoordinates as $aCoordinates) {
                    $oInteractiveMapsCoordinates = new InteractiveMapsCoordinatesModel();
                    $oInteractiveMapsCoordinates->map_id = $oInteractiveMaps->map_id;
                    $oInteractiveMapsCoordinates->lat = $aCoordinates[0];
                    $oInteractiveMapsCoordinates->long = $aCoordinates[1];
                    $oInteractiveMapsCoordinates->save();
                }
            } else {
                $oInteractiveMapsCoordinates = new InteractiveMapsCoordinatesModel();
                $oInteractiveMapsCoordinates->map_id = $oInteractiveMaps->map_id;
                $oInteractiveMapsCoordinates->lat = $aGeoMapsCoordinates[0];
                $oInteractiveMapsCoordinates->long = $aGeoMapsCoordinates[1];
                $oInteractiveMapsCoordinates->save();
            }
        }
        $this->aToSaveGeoJson = [];
        $this->aToSaveLayerOption = [];
        $this->bShowModal = false;
        $this->mapName = '';
        $this->mapDescription = '';
        $this->pictureOfProject = null;
        $this->redirect('/admin/interactive-maps');
    }
}
