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

    protected $listeners = ['initWarrantDetails', 'showRemarksModal'];

    public function render()
    {
        return view('livewire.admin.warranty');
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
