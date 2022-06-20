<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Library\Utilities;
use App\Models\Careers as CareersModel;
use MPdf;

class Careers extends Component
{
    public $aCounts = [
        'serviceable_area' => 0,
        'total'            => 0,
    ];
    public $aModel = [];
    public $startDate;
    public $endDate;

    public function render()
    {
        $this->initCareerCounts();
        return view('livewire.admin.careers');
    }

    public function initCareerCounts()
    {
        $this->aModel = CareersModel::all();
        $this->aCounts = [
            'serviceable_area' => $this->aModel->whereIn('zip_code', config('landscaping.allowed_zip_code'))->count(),
            'total'            => $this->aModel->count(),
        ];
    }

    public function generatePdfReport()
    {
        $oPdf = MPdf::loadView('pdf.careers', $this->aCounts, [
            'aModel'    => $this->aModel->whereBetween('created_at', [
                $this->startDate,
                $this->endDate,
            ]),
            'startDate' => Carbon::createFromDate($this->startDate),
            'endDate'   => Carbon::createFromDate($this->endDate),
        ], [
            'orientation' => 'L',
        ]);
        return Utilities::streamDownload($oPdf, 'careers-report-' . time() . '.pdf');
    }
}
