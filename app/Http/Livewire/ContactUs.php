<?php

namespace App\Http\Livewire;

use App\Library\StreakLibrary;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use App\Models\ContactUs as ContactUsModel;

class ContactUs extends Component
{
    /**
     * First Name
     * @var string
     */
    public $firstName = '';
    /**
     * Last Name
     * @var string
     */
    public $lastName = '';
    /**
     * Email Address
     * @var string
     */
    public $emailAddress = '';
    /**
     * Phone No.
     * @var string
     */
    public $phoneNo = '';
    /**
     * Home Address
     * @var string
     */
    public $homeAddress = '';
    /**
     * City Address
     * @var string
     */
    public $cityAddress = '';
    /**
     * Zip Code
     * @var string
     */
    public $zipCode = '';
    /**
     * Message
     * @var string
     */
    public $message = '';
    /**
     * Project Description
     * @var string
     */
    public $projectDescription = 'landscape';
    /**
     * Project Reference
     * @var string
     */
    public $reference = '';

    /**
     * Validation Rules
     *
     * @var array
     */
    private $aContactUsRules = [
        'firstName'          => 'required',
        'lastName'           => 'required',
        'emailAddress'       => 'required|email',
        'phoneNo'            => 'required',
        'homeAddress'        => 'required',
        'cityAddress'        => 'sometimes',
        'zipCode'            => 'sometimes',
        'message'            => 'sometimes',
        'reference'          => 'sometimes',
        'projectDescription' => 'required| in:landscape,maintenance-and-turf-care'
    ];
    /**
     * Landscape stage key
     */
    const LANDSCAPE_STAGE_KEY = 5001;
    /**
     * Maintenance stage key
     */
    const MAINTENANCE_STAGE_KEY = 5002;

    public function render()
    {
        return view('livewire.contact-us');
    }

    /**
     * Submit Contact Us
     */
    public function submitContactUs()
    {
        $aValidated = $this->validate($this->aContactUsRules);

        $oContactUsModel = new ContactUsModel();
        $oContactUsModel->reference_no = 'CONTACT-US-' . date('Y') . '-' . (time() + time() - 500);
        $oContactUsModel->first_name = $aValidated['firstName'] ?? '-';
        $oContactUsModel->last_name = $aValidated['lastName'] ?? '-';
        $oContactUsModel->email = $aValidated['emailAddress'] ?? '-';
        $oContactUsModel->phone = $aValidated['phoneNo'] ?? '-';
        $oContactUsModel->home_address = $aValidated['homeAddress'] ?? '-';
        $oContactUsModel->city_address = $aValidated['cityAddress'] ?? '-';
        $oContactUsModel->zip_code = $aValidated['zipCode'] ?? '-';
        $oContactUsModel->project_description = $aValidated['projectDescription'] ?? '-';
        $oContactUsModel->message = $aValidated['message'] ?? '-';
        $oContactUsModel->reference = $aValidated['reference'] ?? '-';
        $oContactUsModel->save();
        $sPipelineKey = ($oContactUsModel->project_description === 'landscape') ? config('streak.installation_pipeline_key') : config('streak.maintenance_pipeline_key');
        $iStageKey = ($oContactUsModel->project_description === 'landscape') ? self::LANDSCAPE_STAGE_KEY : self::MAINTENANCE_STAGE_KEY;
        $this->createBox($oContactUsModel, $sPipelineKey, $iStageKey);
        $this->emit('contact-us-success');
        $this->clear();
    }

    private function clear()
    {
        $this->firstName = '';
        $this->lastName = '';
        $this->emailAddress = '';
        $this->phoneNo = '';
        $this->homeAddress = '';
        $this->cityAddress = '';
        $this->zipCode = '';
        $this->message = '';
        $this->reference = '';
        $this->projectDescription = 'landscape';
    }


    /**
     * @param ContactUsModel $oModel
     * @param string $sPipeline
     * @param int $iStageKey
     * @return mixed
     */
    private function createBox(ContactUsModel $oModel, string $sPipeline, int $iStageKey)
    {
        return StreakLibrary::createBox($oModel, $sPipeline, $oModel->email, [
            'name'     => sprintf('%s, %s', $oModel->last_name, $oModel->first_name),
            'stageKey' => $iStageKey,
            'assignedToSharingEntries' => [
                [
                    'email' => 'csr@landscapesandmore.com'
                ]
            ],
            'notes' => '',
        ]);
    }
}
