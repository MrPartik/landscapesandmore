<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ContactUs as ContactUsModel;

class ContactUs extends Component
{
    /**
     * First Name
     * @var string
     */
    public $sFirstName = '';
    /**
     * Last Name
     * @var string
     */
    public $sLastName = '';
    /**
     * Email Address
     * @var string
     */
    public $sEmailAddress = '';
    /**
     * Phone No.
     * @var string
     */
    public $sPhoneNo = '';
    /**
     * Home Address
     * @var string
     */
    public $sHomeAddress = '';
    /**
     * City Address
     * @var string
     */
    public $sCityAddress = '';
    /**
     * Zip Code
     * @var string
     */
    public $sZipCode = '';
    /**
     * Message
     * @var string
     */
    public $sMessage = '';
    /**
     * Project Description
     * @var string
     */
    public $sProjectDescription = '';

    public function render()
    {
        return view('livewire.contact-us');
    }
}
