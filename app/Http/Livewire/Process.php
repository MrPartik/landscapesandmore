<?php

namespace App\Http\Livewire;

use App\Http\StreakApi\StreakFunctions;
use App\Services\VerifyContactStreak;
use Livewire\Component;

class Process extends Component
{
    public $typeOfInquiry = 'landscape';

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

    public $streakApiResult = '';

    /**
     * Validation Rules
     *
     * @var array
     */
    private $aProcessRule = [
        'firstName' => 'required',
        'lastName' => 'required',
        'emailAddress' => 'required|email',
        'phoneNo' => 'required',
        'homeAddress' => 'required',
        'cityAddress' => 'required',
        'zipCode' => 'required',
        'message' => 'required',
        'reference' => 'required',
        'projectDescription' => 'required| in:landscape,maintenance-and-turf-care'
    ];

    public function render()
    {
        return view('livewire.process');
    }

    public function clearProcessForm()
    {
        $this->emailAddress = '';
        $this->streakApiResult = '';
        $this->firstName = '';
        $this->lastName = '';
        $this->phoneNo = '';
        $this->homeAddress = '';
        $this->cityAddress = '';
        $this->zipCode = '';
        $this->message = '';
        $this->projectDescription = '';
    }

    public function validateEmailInStreak()
    {
        $this->streakApiResult = '';
        $this->validate(['emailAddress' => 'required|email']);
        $this->streakApiResult = (new VerifyContactStreak(new StreakFunctions()))->checkEmail($this->emailAddress, $this->typeOfInquiry);
    }
}
