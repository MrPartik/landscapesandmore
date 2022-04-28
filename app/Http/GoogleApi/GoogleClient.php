<?php

namespace App\Http\GoogleApi;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

/**
 * Class Base
 * @package App\Http\StreakApi
 */
Trait GoogleClient
{

    /**
     * @var string
     */
    protected  $sApiVersion = 'api/v1/';


    /**
     * Helper function that implementing classes can use to connect to api server
     * @return \Illuminate\Http\Client\PendingRequest
     */
    protected function http()
    {
        return Http::withOptions([
            'verify' => true
        ])->withHeaders([
            'Accept'        => 'application/json',
            'Authorization' => 'Basic Yjk4MDRkYmY4MDk1NDVjMzgyMTE0MmYxNDU4NjQzZjA6',
            'Content-Type'  => 'application/json',
        ]);
    }

    /**
     * @param string $sUrl
     * @param string $sApiVersion
     * @return array|mixed
     */
    protected function get(string $sUrl, string $sApiVersion = '')
    {
        $oRequest = $this->http()->get($sUrl);

        return $oRequest->json() ?? [];
    }

    /**
     * @param string $sUrl
     * @param array $aData
     * @return array|mixed
     */
    protected function post(string $sUrl, array $aData = [])
    {
        $oRequest = $this->http()->post($sUrl, [
                'body' => json_encode($aData, true)
        ]);
        return $oRequest->json() ?? [];
    }
}
