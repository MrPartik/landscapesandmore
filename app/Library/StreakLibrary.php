<?php

namespace  App\Library;

use App\Http\StreakApi\StreakFunctions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class StreakLibrary {


    /**
     * @param $oModel
     * @param $sPipelineKey
     * @param $sEmailAddress
     * @param array $aData
     * @return mixed
     */
    public static function createBox(Model $oModel, string $sPipelineKey, string $sEmailAddress, array $aData = [])
    {
        $aResponse = (new StreakFunctions())->createBox($sPipelineKey,  $aData);
        if(@$aResponse['boxKey'] === null) {
            Log::info('Unable to save streak box', array_merge(@$oModel->toArray() ?? [], $aData));
            return ['error' => 'Unable to save streak box'];
        }
        $oModel->streak_box_key = $aResponse['boxKey'];
        $oModel->save();
        $aSearchedContacts = (new StreakFunctions())->search($sEmailAddress);
        if (empty($aSearchedContacts['results']['contacts'][0]['emailAddresses'][0]) === false && $aSearchedContacts['results']['contacts'][0]['emailAddresses'][0] === $sEmailAddress) {
            $aResponse = (new StreakFunctions())->updateBox($aResponse['boxKey'], [
                'contacts' => [
                    [
                        'isStarred'   => false,
                        'isAutoboxed' => false,
                        'key'         => $aSearchedContacts['results']['contacts'][0]['key']
                    ]
                ]
            ]);
        }
        return $aResponse;
    }
}
