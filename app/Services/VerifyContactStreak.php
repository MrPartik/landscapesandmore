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
     * @param array $aAllowedStageKey
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchEmailData(string $sEmailAddress, string $sType = 'landscape', array $aAllowedStageKey = [])
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
            return array_key_exists('contacts', $aBox) && in_array($aSearchedContact['key'], array_column(@$aBox['contacts'], 'key'));
        });
        $aIStageKeys = array_column($aAllBoxes, 'stageKey');
        sort($aIStageKeys);
        $aBox = @array_values($aAllBoxes)[array_search($aIStageKeys[0], array_column($aAllBoxes, 'stageKey'))];
        $sStageKey = $aBox['stageKey'] ?? '';
        if ($sStageKey === '' || in_array($sStageKey, $aAllowedStageKey) === false)
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
            'fields'              => $aBox['fields'],
            'stage'               => [
                'current_progress'    => $aStageInfo['name'],
                'current_progress_id' => $aStageInfo['key'],
            ],
        ];

    }
}
