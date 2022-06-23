<?php

namespace App\Http\Livewire\Admin\Themes;
use App\Models\Services as ServicesModel;

trait Services
{
    public $iServicesId = 0;
    public $pictureOfService = '';
    public $serviceTitle = '';
    public $serviceRedirectUrl = '';
    public $serviceDescription = '';
    public $serviceType = '';
    public $aServicesCounts = [
        'total' => 0
    ];

    private $aServiceRule = [
        'pictureOfService'   => 'required',
        'serviceTitle'       => 'required',
        'serviceRedirectUrl' => 'required',
        'serviceType'        => 'required',
        'serviceDescription' => 'required',
    ];

    public function removePictureOfService()
    {
        $this->pictureOfService = '';
    }

    public function initServiceCount() {
        $oModel = ServicesModel::all();
        $this->aServicesCounts = [
            'total' => $oModel->count()
        ];
    }

    public function saveService()
    {
        $this->validate($this->aServiceRule);
        $mFilePath = $this->pictureOfService;
        if (is_object($mFilePath)) {
            $mFilePath = $this->pictureOfService->storeAs('public', 'services/' . time() . '.' . $this->pictureOfService->getClientOriginalExtension());
            $mFilePath = '/' . str_replace('public', 'storage', $mFilePath);
        }
        $oServiceModel = ($this->iServicesId <= 0) ? new ServicesModel() : ServicesModel::find($this->iServicesId);
        $oServiceModel->title = $this->serviceTitle;
        $oServiceModel->description = $this->serviceDescription;
        $oServiceModel->image = $mFilePath;
        $oServiceModel->type = $this->serviceType;
        $oServiceModel->url = $this->serviceRedirectUrl;
        $oServiceModel->save();
        $this->emit('refreshDatatable');
        $this->iServicesId = 0;
        $this->serviceTitle = '';
        $this->serviceType = '';
        $this->serviceDescription = '';
        $this->pictureOfService = '';
        $this->serviceRedirectUrl = '';;
    }

    public function findService($iId) {
        $oServiceModel = ServicesModel::find($iId);
        $this->serviceTitle = $oServiceModel->title;
        $this->serviceDescription = $oServiceModel->description;
        $this->pictureOfService = $oServiceModel->image;
        $this->serviceType = $oServiceModel->type;
        $this->serviceRedirectUrl = $oServiceModel->url;
        $this->iServicesId = $iId;
        $this->emit('refreshDatatable');
    }

    public function deleteService($iId)
    {
        (ServicesModel::find($iId))->delete();
        $this->emit('refreshDatatable');
    }

    public function backToAddService()
    {
        $this->iServicesId = 0;
        $this->serviceTitle = '';
        $this->serviceDescription = '';
        $this->serviceType = '';
        $this->pictureOfService = '';
        $this->serviceRedirectUrl = '';;
    }
}
