<?php namespace App\Http\StreakApi;

/**
 * Class StreakFunctions
 * @package App\Http\StreakApi
 */
class StreakFunctions extends Base
{
    /**
     * Get All Stages
     * @param string $sPipelineKey
     * @return string
     */
    public function getAllStages(string $sPipelineKey)
    {
        return $this->get('pipelines/' . $sPipelineKey . '/stages');
    }

    /**
     * Get Stage Description
     * @param string $sPipelineKey
     * @param string $sStageKey
     * @return string
     */
    public function getStage(string $sPipelineKey, string $sStageKey)
    {
        return $this->get('pipelines/' . $sPipelineKey . '/stages/' . $sStageKey);
    }

    /**
     * Get All Boxes
     * @param string $sPipelineKey
     * @return string
     */
    public function getAllBoxes(string $sPipelineKey)
    {
        return $this->get('pipelines/' . $sPipelineKey . '/boxes');
    }

    /**
     * @param string $sContactKey
     * @return string
     */
    public function getContact(string $sContactKey)
    {
        return $this->get('contacts/' . $sContactKey, 'api/v2/');
    }

    /**
     * @param string $sPipelineKey
     * @return string
     */
    public function getPipeline(string $sPipelineKey)
    {
        return $this->get('pipelines/' . $sPipelineKey);
    }

    /**
     * Get All Stages
     * @param string $sQuery
     * @param string $sPipelineKey
     * @return string
     */
    public function search(string $sQuery, string $sPipelineKey = '')
    {
        return $this->get('/search?query=' . $sQuery . ((strlen($sPipelineKey) > 0) ? '&pipelineKey=' . $sPipelineKey : ''));
    }

    /**
     * Create Box
     * @param string $sPipelineKey
     * @param array $aData
     * @return array|mixed
     */
    public function createBox(string $sPipelineKey, array $aData)
    {
        $this->sApiVersion = 'api/v2/';
        return $this->post('pipelines/' . $sPipelineKey . '/boxes', $aData);
    }

    /**
     * Update Box
     * @param string $sBoxKey
     * @param array $aData
     * @return array|mixed
     */
    public function updateBox(string $sBoxKey, array $aData)
    {
        return $this->post('boxes/' . $sBoxKey, $aData);
    }
}
