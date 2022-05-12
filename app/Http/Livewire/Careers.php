<?php

namespace App\Http\Livewire;

use App\Library\StreakLibrary;
use Livewire\Component;
use App\Models\Careers as CareersModel;

class Careers extends Component
{
    public $name = '';
    public $emailAddress = '';
    public $phoneNo = '';
    public $homeAddress = '';
    public $driverLicense = '';
    public $careersPosition = '';

    public $aCareersRules = [
        'name'            => 'required',
        'emailAddress'    => 'required|email',
        'homeAddress'     => 'required',
        'driverLicense'   => 'sometimes',
        'careersPosition' => 'sometimes'
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
        $oCareersModel->address = $this->homeAddress;
        $oCareersModel->email = $this->emailAddress;
        $oCareersModel->phone = $this->phoneNo;
        $oCareersModel->position_applying = $this->careersPosition;
        $oCareersModel->driver_license = $this->driverLicense;
        $oCareersModel->save();

        $this->createBox($oCareersModel, config('streak.careers_pipeline_key'), 5001);
        $this->emit('careers-success');
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
