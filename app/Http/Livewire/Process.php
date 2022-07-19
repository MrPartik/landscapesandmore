<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Library\Utilities;
use App\Services\VerifyContactStreak;
use App\Http\StreakApi\StreakFunctions;

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
        5007,
        5016,
        5012,
        5014,
    ];
    const ALLOWED_STAGE_MAINTENANCE = [
        5002,
        5004,
        5006,
        5011,
        5012,
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
    public $sSalesPerson = '';
    public $sArchitectInCharge = '';
    public $sEstimateStage = '';
    public $sDesignSalesPerson = '';
    public $sContractSent = '';
    public $sPhase1Email = '';
    public $sDigTicket = '';
    public $sPreconSched = '';
    public $sProductionDateStart = '';

    private $oStreakVerify;

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->oStreakVerify = (new VerifyContactStreak(new StreakFunctions()));
    }

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
        $this->isProcessed = false;
        $this->clearProcessForm(false);
        $this->validate(['emailAddress' => 'required|email']);
        $this->streakApiResult = $this->oStreakVerify->searchEmailData($this->emailAddress, $this->typeOfInquiry, (($this->typeOfInquiry === self::INQUIRY_TYPE_LANDSCAPE) ? self::ALLOWED_STAGE_LANDSCAPE : self::ALLOWED_STAGE_MAINTENANCE));

        $sConsultation = @$this->streakApiResult['fields'][1009] ?? 'Not Set';
        $sDesignAppointmentDate = @$this->streakApiResult['fields'][1012] ?? 'Not Set';
        $sDateContacted = @$this->streakApiResult['fields'][1065] ?? 'Not Set';
        $this->currentStage = $this->streakApiResult['stage']['current_progress_id'] ?? 0;

        $sDesignPresentationDate = @$this->streakApiResult['fields'][(($this->typeOfInquiry === self::INQUIRY_TYPE_LANDSCAPE) ? 1026 : 1019)] ?? 'Not Set';
        $this->sConsultationDate = ($this->typeOfInquiry === self::INQUIRY_TYPE_LANDSCAPE) ? Carbon::createFromTimestampMs($sConsultation)->format('M d, Y') : 'Not Set';
        $this->sDesignPresentationDate = ($this->typeOfInquiry === self::INQUIRY_TYPE_LANDSCAPE) ? Carbon::createFromTimestampMs($sDesignPresentationDate)->format('M d, Y') : 'Not Set';
        $this->sDesignAppointmentDate = ($this->typeOfInquiry === self::INQUIRY_TYPE_LANDSCAPE) ? Carbon::createFromTimestampMs($sDesignAppointmentDate)->format('M d, Y') : 'Not Set';
        $this->sDateContacted = ($this->typeOfInquiry === self::INQUIRY_TYPE_LANDSCAPE) ? Carbon::createFromTimestampMs($sDateContacted)->format('M d, Y') : 'Not Set';

        if ($this->typeOfInquiry === self::INQUIRY_TYPE_LANDSCAPE) {
            if (in_array($this->currentStage, [5003, 5019, 5021]) === true) {
                $this->sSalesPerson = @$this->streakApiResult['fields'][1010] ?? 'Not Set';
                $this->sSalesPerson = $this->oStreakVerify->getFieldsValue($this->typeOfInquiry, 1010, $this->sSalesPerson);

                $this->sArchitectInCharge = @$this->streakApiResult['fields'][1068] ?? 'Not Set';
                $this->sArchitectInCharge = $this->oStreakVerify->getFieldsValue($this->typeOfInquiry, 1068, $this->sArchitectInCharge);

                $this->sEstimateStage = @$this->streakApiResult['fields'][1030] ?? 'Not Set';
                $this->sEstimateStage = $this->oStreakVerify->getFieldsValue($this->typeOfInquiry, 1030, $this->sEstimateStage);

                $this->sDesignSalesPerson = @$this->streakApiResult['fields'][1032] ?? 'Not Set';
                $this->sDesignSalesPerson = $this->oStreakVerify->getFieldsValue($this->typeOfInquiry, 1032, $this->sDesignSalesPerson);
            }
            if (in_array($this->currentStage, [5010]) === true) {
                $this->sPhase1Email = @$this->streakApiResult['fields'][1081] ?? false;
                $this->sPhase1Email = ($this->sPhase1Email !== false) ? Carbon::createFromTimestampMs($this->sPhase1Email)->format('M d, Y') : 'Not Set';

                $this->sDigTicket = @$this->streakApiResult['fields'][1042] ?? 'Not Set';

                $this->sPreconSched = @$this->streakApiResult['fields'][1074] ?? false;
                $this->sPreconSched = ($this->sPhase1Email !== false) ? Carbon::createFromTimestampMs($this->sPreconSched)->format('M d, Y') : 'Not Set';
            }
            if (in_array($this->currentStage, [5007, 5016, 5012, 5014]) === true) {
                $this->sProductionDateStart = @$this->streakApiResult['fields'][1063] ?? false;
                $this->sProductionDateStart = ($this->sProductionDateStart !== false) ? Carbon::createFromTimestampMs($this->sPhase1Email)->format('M d, Y') : 'Not Set';
            }

            $this->sContractSent = @$this->streakApiResult['fields'][1083] ?? false;
            $this->sContractSent = ($this->sContractSent !== false) ? Carbon::createFromTimestampMs($this->sContractSent)->format('M d, Y') : 'Not Set';
        }

        $this->isProcessed = true;

    }

    public function processValidation()
    {
        if ((@$this->streakApiResult['status'] ?? 500) === 200) {
            $this->sendEmail();
            $this->emit('processCurrentStage', '.process-' . $this->currentStage, '#' . $this->typeOfInquiry . '-form');
        }
    }

    private function sendEmail()
    {
        if ($this->typeOfInquiry === self::INQUIRY_TYPE_LANDSCAPE) {
            if (in_array($this->currentStage, [5002, 5004, 5018]) === true) {
                Utilities::Mail()->send('mail.response-mail', [
                    'name'  => $this->emailAddress,
                    'body'  => sprintf('Your consultation date is on %s with %s. <br/> Please check your email for the link.', $this->sConsultationDate, $this->sSalesPerson),
                    'title' => 'Step 1. Consultation',
                ], function ($oMessage) {
                    $oMessage
                        ->to($this->emailAddress, $this->emailAddress)
                        ->subject('Michelangelo’s Project Update');
                });
            } else if (in_array($this->currentStage, [5003, 5019, 5021]) === true) {
                Utilities::Mail()->send('mail.response-mail', [
                    'name'  => $this->emailAddress,
                    'body'  => sprintf('Your Design Appointment date is on %s with %s <br/>
                                            Your Project is now undergoing an estimate and ready for a quotation. %s <br/>
                                            Your Design Presentation is on %s with %s.',
                        $this->sDesignAppointmentDate,
                        $this->sArchitectInCharge,
                        $this->sEstimateStage,
                        $this->sDesignPresentationDate,
                        $this->sDesignSalesPerson
                    ),
                    'title' => 'Step 2. Design',
                ], function ($oMessage) {
                    $oMessage
                        ->to($this->emailAddress, $this->emailAddress)
                        ->subject('Michelangelo’s Project Update');
                });
            } else if (in_array($this->currentStage, [5005]) === true) {
                Utilities::Mail()->send('mail.response-mail', [
                    'name'  => $this->emailAddress,
                    'body'  => sprintf('We have sent you a copy of your contract on %s', $this->sContractSent),
                    'title' => 'Step 3. Contract Signing',
                ], function ($oMessage) {
                    $oMessage
                        ->to($this->emailAddress, $this->emailAddress)
                        ->subject('Michelangelo’s Project Update');
                });
            } else if (in_array($this->currentStage, [5010]) === true) {
                $sAdditionalMessage  = '';
                if ($this->sDigTicket !== 'Not Set') {
                    $sAdditionalMessage = 'Please set up a pre-con meeting with your project manager using this link: <a target="_blank" href="//calendly.com/tsmith2022/">Pre-Con Meeting</a><br/>';
                }
                Utilities::Mail()->send('mail.response-mail', [
                    'name'  => $this->emailAddress,
                    'body'  => sprintf('An Introduction to your project was sent to your email on %s.<br/>
                                        We’ve created a Dig request, Ticket number: %s <br/>
                                        %s
                                        You set up a meeting with your Project Manager on %s  ',
                        $this->sPhase1Email,
                        $this->sDigTicket,
                        $sAdditionalMessage,
                        $this->sPreconSched
                    ),
                    'title' => 'Step 4. Project Sold',
                ], function ($oMessage) {
                    $oMessage
                        ->to($this->emailAddress, $this->emailAddress)
                        ->subject('Michelangelo’s Project Update');
                });
            } else if (in_array($this->currentStage, [5007, 5016, 5012, 5014]) === true) {
                $sAdditionalMessage = '';
                if (intval($this->currentStage)  === 5016) {
                    $sAdditionalMessage = 'Your project is now being handled by the Billing department; we will reach out to your email address';
                } else if (intval($this->currentStage) === 5012) {
                    $sAdditionalMessage = 'Would you please do us a small favor by providing a quick star rating review of your experience with us? Here’s the link: <a target="_blank" href="//reviews.revlocal.com/michaelangelos-sustainable-landscape-design-group-152889873980549/review-us?rid=22364394837&source=sms&rtype=review_request&templateId=1135199&custId=T03uXFz9tBAJBxnSfpwpcw%3D%3D&enc=1>Review Link</a>';

                } else if (intval($this->currentStage)  === 5014) {
                    $sAdditionalMessage = 'Thank you for your feedback';
                }
                Utilities::Mail()->send('mail.response-mail', [
                    'name'  => $this->emailAddress,
                    'body'  => sprintf('Your estimated start date is on %s. <br/>
                                            Congratulations! Your project is complete. <br/>
                                            ' .  $sAdditionalMessage, $this->sProductionDateStart),
                    'title' => 'Step 5. Installation',
                ], function ($oMessage) {
                    $oMessage
                        ->to($this->emailAddress, $this->emailAddress)
                        ->subject('Michelangelo’s Project Update');
                });
            }
        }
    }
}
