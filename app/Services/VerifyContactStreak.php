<?php namespace App\Services;


use App\Http\StreakApi\StreakFunctions;

class VerifyContactStreak
{

    /**
     * @var StreakFunctions
     */
    public $oStreakFunctions;

    /**
     * VerifyContactStreak constructor.
     * @param StreakFunctions $oStreakFunctions
     */
    public function __construct(StreakFunctions $oStreakFunctions)
    {
        $this->oStreakFunctions = $oStreakFunctions;
    }

    /**
     * @param string $sEmailAddress
     * @param string $sType
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function checkEmail(string $sEmailAddress, string $sType = 'landscape')
    {
        $sPipelineKey = ($sType === 'landscape') ? config('streak.installation_pipeline_key') : config('streak.maintenance_pipeline_key');
        $aSearched = $this->oStreakFunctions->search($sEmailAddress, $sPipelineKey);
        $aSearchedContact = @$aSearched['results']['contacts'][0] ?? [];
        $aSearchedEmail = @$aSearchedContact['emailAddresses'] ?? [];
        if (in_array($sEmailAddress, $aSearchedEmail) === false)
        {
            return [
                'status'  => 500,
                'message' => 'Email Address Not Found',
                'data'    => [
                    'email_address' => $sEmailAddress
                ]
            ];
        }
        $aAllBoxes = $this->oStreakFunctions->getAllBoxes($sPipelineKey);
        $aAllBoxes = array_filter($aAllBoxes, function ($aBox) use ($aSearchedContact) {
            return array_key_exists('contacts', $aBox) && @$aBox['contacts'][0]['key'] === $aSearchedContact['key'];
        });
        $sStageKey = @array_values($aAllBoxes)[0]['stageKey'] ?? '';
        if ($sStageKey === '')
        {
            return [
                'status'  => 500,
                'message' => 'No data in pipeline',
                'data'    => [
                    'email_address' => $sEmailAddress
                ]
            ];
        }
        $aStageInfo = $this->oStreakFunctions->getStage($sPipelineKey, $sStageKey);
        return [
            'status'              => 200,
            'message'             => 'Successfully retrieve contact information',
            'pipeline_type'       => ($sType === 'landscape') ? 'Installation Service' : 'Maintenance Service',
            'email_address'       => $sEmailAddress,
            'contact_information' => $aSearchedContact,
            'stage'               => [
                'current_progress'    => $aStageInfo['name'],
                'current_progress_id' => $aStageInfo['key'],
            ],
        ];

    }
}
