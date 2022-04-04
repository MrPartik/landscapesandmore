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
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAllBoxes(string $sPipelineKey)
    {
        return $this->get('pipelines/' . $sPipelineKey . '/boxes');
    }

    /**
     * @param string $sContactKey
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getContact(string $sContactKey)
    {
        return $this->get('contacts/' . $sContactKey, 'api/v2/');
    }

    /**
     * @param string $sPipelineKey
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function search(string $sQuery, string $sPipelineKey = '')
    {
        return $this->get('/search?query=' . $sQuery . ((strlen($sPipelineKey) > 0) ? '&pipelineKey=' . $sPipelineKey : ''));
    }
}
