<?php

namespace App\Http\Livewire;

use App\Mail\ResponseMail;
use App\Library\StreakLibrary;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Models\Careers as CareersModel;

class Careers extends Component
{
    public $name = '';
    public $emailAddress = '';
    public $phoneNo = '';
    public $homeAddress = '';
    public $cityAddress = '';
    public $zipCode = '';
    public $driverLicense = 'no';
    public $careersPosition = '';

    public $aCareersRules = [
        'name'            => 'required',
        'emailAddress'    => 'required|email',
        'homeAddress'     => 'required',
        'cityAddress'     => 'sometimes',
        'zipCode'         => 'sometimes',
        'driverLicense'   => 'sometimes',
        'careersPosition' => 'required'
    ];
    public function __construct($id = null)
    {
        $this->careersPosition = (explode(',', env('CAREERS_AVAILABLE_POSITION', '')) ?? [])[0] ?? '';
        parent::__construct($id);
    }

    public function render()
    {
        return view('livewire.careers');
    }

    public function submitCareers() {
        $this->validate($this->aCareersRules);
        $oCareersModel = new CareersModel();
        $oCareersModel->name = $this->name;
        $oCareersModel->home_address = $this->homeAddress;
        $oCareersModel->city_address = $this->cityAddress;
        $oCareersModel->zip_code = $this->zipCode;
        $oCareersModel->email = $this->emailAddress;
        $oCareersModel->phone = $this->phoneNo;
        $oCareersModel->position_applying = $this->careersPosition;
        $oCareersModel->driver_license = $this->driverLicense;
        $oCareersModel->save();

        $this->createBox($oCareersModel, config('streak.careers_pipeline_key'), 5001);
        $this->emit('careers-success');

        Mail::to($this->emailAddress)->send(new ResponseMail($this->name, 'Thank you for your interest in becoming part of our team. One of our representatives will call you to get your job application started. Please allow us 24-48 business hours (Monday-Friday) to review your application. '));

        $this->name = '';
        $this->homeAddress = '';
        $this->emailAddress = '';
        $this->phoneNo = '';
    }

    /**
     * @param CareersModel $oModel
     * @param string $sPipeline
     * @param int $iStageKey
     * @return mixed
     */
    private function createBox(CareersModel $oModel, string $sPipeline, int $iStageKey)
    {
        return StreakLibrary::createBox($oModel, $sPipeline, $oModel->email, [
            'name'     => sprintf('%s', $oModel->name),
            'stageKey' => $iStageKey,
            'assignedToSharingEntries' => [
                [
                    'email' => 'csr@landscapesandmore.com'
                ]
            ],
            'notes' => '',
            'fields' => [
                1008 => $oModel->position_applying,
                1002 => $oModel->driver_license
            ]
        ]);
    }
}
