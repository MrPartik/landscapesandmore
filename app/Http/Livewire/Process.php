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
        $this->streakApiResult = (new VerifyContactStreak(new StreakFunctions()))->searchEmailData($this->emailAddress, $this->typeOfInquiry);
        $sConsultation = @$this->streakApiResult['fields'][1009] ?? Carbon::now()->addWeek(2)->getTimestampMs();
        $sDesignPresentationDate = @$this->streakApiResult['fields'][1026] ?? Carbon::now()->addWeek(2)->getTimestampMs();
        $this->sConsultationDate = ($this->typeOfInquiry === self::INQUIRY_TYPE_LANDSCAPE) ? Carbon::createFromTimestampMs($sConsultation)->format('M d, Y h:i a') : Carbon::now()->addWeek(2)->format('M d, Y h:i a');
        $this->sDesignPresentationDate = ($this->typeOfInquiry === self::INQUIRY_TYPE_LANDSCAPE) ? Carbon::createFromTimestampMs($sDesignPresentationDate)->format('M d, Y h:i a') : Carbon::now()->addWeek(2)->format('M d, Y h:i a');
        $this->isProcessed = true;
    }

    public function processValidation()
    {
        if ((@$this->streakApiResult['status'] ?? 500) === 200) {
//            dd($this->streakApiResult);
            $this->emit('processCurrentStage', '.process-' . $this->streakApiResult['stage']['current_progress_id'], '#' . $this->typeOfInquiry . '-form');
        }
    }
}
