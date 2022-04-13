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
    public function checkEmail(string $sEmailAddress, string $sType = 'installation')
    {
        $sPipelineKey = ($sType === 'landscape') ? config('streak.installation_pipeline_key') : config('streak.maintenance_pipeline_key');
        $aSearchedEmail = $this->oStreakFunctions->search($sEmailAddress, $sPipelineKey);
        $aSearchedContact = @$aSearchedEmail['results']['contacts'][0] ?? [];
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
        $sStageKey = array_values($aAllBoxes)[0]['stageKey'];
        $aStageInfo = $this->oStreakFunctions->getStage($sPipelineKey, $sStageKey);
        return [
            'pipeline_type'    => ($sType === 'installation') ? 'Installation Service' : 'Maintenance Service',
            'current_progress' => $aStageInfo['name'],
            'email_address'    => $sEmailAddress
        ];

    }
}
