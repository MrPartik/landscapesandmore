<?php

namespace App\Http\Livewire;

use App\Mail\ResponseMail;
use App\Library\Utilities;
use App\Library\StreakLibrary;
use Illuminate\Support\Facades\Mail;
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
        'projectDescription' => 'required| in:landscape,maintenance-and-turf-care',
    ];
    /**
     * Landscape stage key
     */
    const LANDSCAPE_STAGE_KEY = 5001;
    /**
     * Maintenance stage key
     */
    const MAINTENANCE_STAGE_KEY = 5002;

    public function __construct($id = null)
    {
        $this->emailAddress = request()->get('email');
        parent::__construct($id);
    }

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

        Utilities::Mail()->send('mail.response-mail', [
            'name' => $oContactUsModel->first_name,
            'body' => 'Thank you for contacting us. One of our representatives will call you to discuss your project further. Please allow us 24-48 business hours (Monday-Friday) to review your information. You may also check the status of your application status here: Application Status.',
            'title' => 'Thank you for contacting us!',
        ], function ($oMessage) use ($oContactUsModel) {
            $oMessage
                ->to($this->emailAddress, $oContactUsModel->first_name)
                ->subject('Thank you for contacting us!');
        });

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
        $aFields = [];
        if (strlen(request()->get('email')) > 3 && $this->projectDescription === 'landscape') {
            $aFields = [
                'fields' => [
                    "1038" => "9010",
                ],
            ];
        }
        return StreakLibrary::createBox($oModel, $sPipeline, $oModel->email, array_merge([
            'name'                     => sprintf('%s, %s', $oModel->last_name, $oModel->first_name),
            'stageKey'                 => $iStageKey,
            'assignedToSharingEntries' => [
                [
                    'email' => 'csr@landscapesandmore.com',
                ],
            ],
            'notes'                    => '',
        ], $aFields));
    }
}
