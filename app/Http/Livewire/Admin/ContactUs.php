<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Library\Utilities;
use App\Models\ContactUs as ContactUsModel;
use MPdf;

class ContactUs extends Component
{
    public $aCounts = [
        'serviceable_area' => 0,
        'landscape_type'   => 0,
        'maintenance_type' => 0,
        'total'            => 0,
    ];
    public $aModel = [];
    public $startDate;
    public $endDate;

    public function render()
    {
        $this->initContactUsDashboardCounter();
        return view('livewire.admin.contact-us');
    }

    public function initContactUsDashboardCounter()
    {
        $this->aModel = ContactUsModel::all();
        $this->aCounts = [
            'serviceable_area' => $this->aModel->whereIn('zip_code', config('landscaping.allowed_zip_code'))->count(),
            'landscape_type'   => $this->aModel->where('project_description', 'landscape')->count(),
            'maintenance_type' => $this->aModel->where('project_description', 'maintenance-and-turf-care')->count(),
            'total'            => $this->aModel->count(),
        ];
    }

    public function generatePdfReport()
    {
        $oPdf = MPdf::loadView('pdf.contact_us', $this->aCounts, [
            'aModel'    => $this->aModel->whereBetween('created_at', [
                $this->startDate,
                $this->endDate,
            ]),
            'startDate' => Carbon::createFromDate($this->startDate),
            'endDate'   => Carbon::createFromDate($this->endDate),
        ], [
            'orientation' => 'L',
        ]);
        return Utilities::streamDownload($oPdf, 'contact-us-report-' . time() . '.pdf');
    }
}
