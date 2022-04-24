<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Warranty as WarrantyModel;

class Warranty extends Component
{

    public $aWarrantyModel = [];
    public $bShowModal = false;
    public $bShowRemarksModal = false;
    public $sRemarks = '';
    public $iId = 0;
    public $sType = '';
    public $aCounts = [
        'serviceable_area' => 0,
        'contacted'        => 0,
        'resolved'         => 0,
        'total'            => 0,
        'not_contacted'    => 0,
        'not_resolved'     => 0,
    ];

    protected $listeners = ['initWarrantDetails', 'showRemarksModal', 'initWarrantyDashboardCounter'];

    public function render()
    {
        $this->initWarrantyDashboardCounter();
        return view('livewire.admin.warranty');
    }

    public function initWarrantyDashboardCounter()
    {
        $this->aCounts = [
            'serviceable_area' => WarrantyModel::all()->whereNotIn('zip_code', config('landscaping.allowed_zip_code'))->count(),
            'contacted'        => WarrantyModel::all()->whereNotNull('was_contacted')->count(),
            'resolved'         => WarrantyModel::all()->whereNotNull('was_resolved')->count(),
            'total'            => WarrantyModel::all()->count(),
            'not_contacted'    => WarrantyModel::all()->whereNull('was_contacted')->count(),
            'not_resolved'     => WarrantyModel::all()->whereNull('was_resolved')->count(),
        ];
    }

    public function initWarrantDetails(int $iWarrantyId)
    {
        $this->aWarrantyModel = WarrantyModel::find($iWarrantyId);
        $this->bShowModal = true;
    }

    public function showRemarksModal(int $iWarrantyId, string $sType)
    {
        $oRemarks = WarrantyModel::find($iWarrantyId);
        $this->sRemarks = $oRemarks->remarks;
        $this->iId = $iWarrantyId;
        $this->sType = $sType;
        $this->bShowRemarksModal = true;
    }

    public function markStatusResolve()
    {
        $oRemarks = WarrantyModel::find($this->iId);
        $oRemarks->remarks = $this->sRemarks;
        $oRemarks->was_resolved = ($this->sType === 'resolve') ? now() : null;
        $oRemarks->save();
        $this->bShowRemarksModal = false;
        $this->iId = 0;
        $this->emit('refreshDatatable');
    }
}
