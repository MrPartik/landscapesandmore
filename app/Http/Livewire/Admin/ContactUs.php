<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ContactUs as ContactUsModel;

class ContactUs extends Component
{
    public $aCounts = [
        'serviceable_area' => 0,
        'landscape_type'   => 0,
        'maintenance_type' => 0,
        'total'            => 0
    ];

    public function render()
    {
        $this->initContactUsDashboardCounter();
        return view('livewire.admin.contact-us');
    }

    public function initContactUsDashboardCounter()
    {
        $aModel = ContactUsModel::all();
        $this->aCounts = [
            'serviceable_area' => $aModel->whereNotIn('zip_code', config('landscaping.allowed_zip_code'))->count(),
            'landscape_type'   => $aModel->where('project_description', 'landscape')->count(),
            'maintenance_type' => $aModel->where('project_description', 'maintenance-and-turf-care')->count(),
            'total'            => $aModel->count(),
        ];
    }
}
