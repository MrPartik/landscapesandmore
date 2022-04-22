<?php

namespace App\Http\StreakApi;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

/**
 * Class Base
 * @package App\Http\StreakApi
 */
class Base
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
        $oRequest = $this->http()->get(config('streak.api_domain') . str_replace('//', '/', (($sApiVersion !== '') ? $sApiVersion : $this->sApiVersion) . $sUrl));

        return $oRequest->json() ?? [];
    }


    /**
     * @param string $sUrl
     * @param array $aData
     * @return array|mixed
     */
    protected function post(string $sUrl, array $aData = [])
    {
        $oRequest = $this->http()->post(config('streak.api_domain') . str_replace('//', '/', $this->sApiVersion . $sUrl), $aData);
        return $oRequest->json() ?? [];
    }
}
