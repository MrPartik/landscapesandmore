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
     * Project Reference
     * @var string
     */
    public $reference = '';
    /**
     * Which contact information do you want to contact you?
     * @var string
     */
    public $preferToContactYou = 'email_phone_no';

    public $streakApiResult = '';

    public $isProcessed = false;

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
        'preferToContactYou' => 'required',
        'typeOfInquiry' => 'required| in:landscape,maintenance-and-turf-care'
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
        $this->preferToContactYou = '';
        $this->isProcessed = false;
    }

    public function validateEmailInStreak()
    {
        $this->streakApiResult = '';
        $this->validate(['emailAddress' => 'required|email']);
        $this->streakApiResult = (new VerifyContactStreak(new StreakFunctions()))->checkEmail($this->emailAddress, $this->typeOfInquiry);
        $this->phoneNo = @$this->streakApiResult['contact_information']['phoneNumbers'][0] ?? '';
        $this->homeAddress = @$this->streakApiResult['contact_information']['addresses'][0] ?? '';
        $this->firstName = @$this->streakApiResult['contact_information']['givenName'] ?? '';
        $this->lastName = @$this->streakApiResult['contact_information']['familyName'] ?? '';
    }

    public function processValidation()
    {
        if ((@$this->streakApiResult['status'] ?? 500) === 200) {
            $this->emit('processCurrentStage', '.process-' . $this->streakApiResult['stage']['current_progress_id'], '#' . $this->typeOfInquiry . '-form');
            $this->isProcessed = true;
        }
    }
}
