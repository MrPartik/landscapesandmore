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
        5010
    ];
    const ALLOWED_STAGE_MAINTENANCE = [
        5002,
        5004,
        5006
    ];

    public $typeOfInquiry = self::INQUIRY_TYPE_LANDSCAPE;

    /**
     * Email Address
     * @var string
     */
    public $emailAddress = '';

    public $sConsultationDate = '';
    public $sDesignPresentationDate = '';

    public $streakApiResult = '';

    public $isProcessed = false;

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
        $sConsultation = @$this->streakApiResult['fields'][1009] ?? Carbon::now()->addWeek(2)->getTimestampMs();
        $sDesignPresentationDate = @$this->streakApiResult['fields'][(($this->typeOfInquiry === self::INQUIRY_TYPE_LANDSCAPE) ? 1026 : 1019)] ?? Carbon::now()->addWeek(2)->getTimestampMs();
        $this->sConsultationDate = ($this->typeOfInquiry === self::INQUIRY_TYPE_LANDSCAPE) ? Carbon::createFromTimestampMs($sConsultation)->format('M d, Y h:i a') : 'Not Set';
        $this->sDesignPresentationDate = ($this->typeOfInquiry === self::INQUIRY_TYPE_LANDSCAPE) ? Carbon::createFromTimestampMs($sDesignPresentationDate)->format('M d, Y h:i a') : 'Not Set';
        $this->isProcessed = true;
    }

    public function processValidation()
    {
        if ((@$this->streakApiResult['status'] ?? 500) === 200) {
            $this->emit('processCurrentStage', '.process-' . $this->streakApiResult['stage']['current_progress_id'], '#' . $this->typeOfInquiry . '-form');
        }
    }
}
