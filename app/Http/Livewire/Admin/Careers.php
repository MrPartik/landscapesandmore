<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Careers as CareersModel;

class Careers extends Component
{
    public $aCounts = [
        'serviceable_area' => 0,
        'total'            => 0,
    ];

    public function render()
    {
        $this->initCareerCounts();
        return view('livewire.admin.careers');
    }

    public function initCareerCounts()
    {
        $aModel = CareersModel::all();
        $this->aCounts = [
            'serviceable_area' => $aModel->whereNotIn('zip_code', config('landscaping.allowed_zip_code'))->count(),
            'total'            => $aModel->count(),
        ];
    }
}
