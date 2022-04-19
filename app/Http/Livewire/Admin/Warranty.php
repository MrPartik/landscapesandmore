<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Warranty as WarrantyModel;

class Warranty extends Component
{

    public $aWarrantyModel = [];
    public $bShowModal = false;

    protected $listeners = ['initWarrantDetails'];

    public function render()
    {
        return view('livewire.admin.warranty');
    }

    public function initWarrantDetails(int $iWarrantyId)
    {
        $this->aWarrantyModel = WarrantyModel::find($iWarrantyId);
        $this->bShowModal = true;
    }
}
