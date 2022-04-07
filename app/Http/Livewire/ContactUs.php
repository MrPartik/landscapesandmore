<?php

namespace App\Http\Livewire;

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
        'cityAddress'        => 'required',
        'zipCode'            => 'required',
        'message'            => 'required',
        'projectDescription' => 'required| in:landscape,maintenance-and-turf-care'
    ];

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
        $oContactUsModel->first_name = $aValidated['firstName'] ?? '-';
        $oContactUsModel->last_name = $aValidated['lastName'] ?? '-';
        $oContactUsModel->email = $aValidated['emailAddress'] ?? '-';
        $oContactUsModel->phone = $aValidated['phoneNo'] ?? '-';
        $oContactUsModel->home_address = $aValidated['homeAddress'] ?? '-';
        $oContactUsModel->city_address = $aValidated['cityAddress'] ?? '-';
        $oContactUsModel->zip_code = $aValidated['zipCode'] ?? '-';
        $oContactUsModel->project_description = $aValidated['projectDescription'] ?? '-';
        $oContactUsModel->message = $aValidated['message'] ?? '-';
        $oContactUsModel->save();

        $this->emit('contact-us-success');

    }
}
