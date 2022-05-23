<?php

namespace App\Http\Livewire;

use App\Http\StreakApi\StreakFunctions;
use App\Services\VerifyContactStreak;
use Carbon\Carbon;
use Livewire\Component;

class Process extends Component
{

    const INQUIRY_TYPE_LANDSCAPE = 'landscape';
    const INQUIRY_TYPE_MAINTENANCE = 'maintenance-and-turf-care';

    const ALLOWED_STAGE_LANDSCAPE = [
        5002,
        5003,
        5004,
        5005,
        5010,
        5021,
        5017,
        5018,
        5019,
    ];
    const ALLOWED_STAGE_MAINTENANCE = [
        5002,
        5004,
        5006,
        5011
    ];

    public $typeOfInquiry = self::INQUIRY_TYPE_LANDSCAPE;

    /**
     * Email Address
     * @var string
     */
    public $emailAddress = '';

    public $sConsultationDate = '';
    public $sDesignPresentationDate = '';
    public $sDateContacted = '';
    public $sDesignAppointmentDate = '';
    public $streakApiResult = '';
    public $isProcessed = false;
    public $currentStage = 0;
    public $noOfDays = 0;


    public function render()
    {
        return view('livewire.process');
    }

    public function clearProcessForm(bool $isEmailWillClear = true)
    {
        ($isEmailWillClear === true) && $this->emailAddress = '';
        $this->streakApiResult = '';
        $this->isProcessed = false;
        $this->resetErrorBag();
    }

    public function validateEmailInStreak()
    {
        $this->clearProcessForm(false);
        $this->validate(['emailAddress' => 'required|email']);
        $this->streakApiResult = (new VerifyContactStreak(new StreakFunctions()))->searchEmailData($this->emailAddress, $this->typeOfInquiry, (($this->typeOfInquiry === self::INQUIRY_TYPE_LANDSCAPE) ? self::ALLOWED_STAGE_LANDSCAPE: self::ALLOWED_STAGE_MAINTENANCE));
        $sConsultation = @$this->streakApiResult['fields'][1009] ?? 'Not Set';
        $sDesignAppointmentDate = @$this->streakApiResult['fields'][1012] ?? 'Not Set';
        $sDateContacted = @$this->streakApiResult['fields'][1065] ?? 'Not Set';
        $this->currentStage = $this->streakApiResult['stage']['current_progress_id'] ?? 0;
        $sDesignPresentationDate = @$this->streakApiResult['fields'][(($this->typeOfInquiry === self::INQUIRY_TYPE_LANDSCAPE) ? 1026 : 1019)] ?? 'Not Set';
        $this->sConsultationDate = ($this->typeOfInquiry === self::INQUIRY_TYPE_LANDSCAPE) ? Carbon::createFromTimestampMs($sConsultation)->format('M d, Y') : 'Not Set';
        $this->sDesignPresentationDate = ($this->typeOfInquiry === self::INQUIRY_TYPE_LANDSCAPE) ? Carbon::createFromTimestampMs($sDesignPresentationDate)->format('M d, Y') : 'Not Set';
        $this->sDesignAppointmentDate = ($this->typeOfInquiry === self::INQUIRY_TYPE_LANDSCAPE) ? Carbon::createFromTimestampMs($sDesignAppointmentDate)->format('M d, Y') : 'Not Set';
        $this->sDateContacted = ($this->typeOfInquiry === self::INQUIRY_TYPE_LANDSCAPE) ? Carbon::createFromTimestampMs($sDateContacted)->format('M d, Y') : 'Not Set';
        $this->isProcessed = true;
    }

    public function processValidation()
    {
        if ((@$this->streakApiResult['status'] ?? 500) === 200) {
            $this->emit('processCurrentStage', '.process-' . $this->currentStage, '#' . $this->typeOfInquiry . '-form');
        }
    }
}
