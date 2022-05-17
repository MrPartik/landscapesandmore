<?php

namespace App\Library;

class Utilities
{
    public static function setEnv($mKey, $mValue)
    {
        $sLetTime = time() . 'temp';
        if (env($mKey, $sLetTime) === $sLetTime) {
            return file_put_contents(app()->environmentFilePath(), $mKey . '="' . $mValue . '"' . PHP_EOL, FILE_APPEND);
        }
        file_put_contents(app()->environmentFilePath(), str_replace(
            $mKey . sprintf('="%s"', env($mKey) ?? 'null'),
            $mKey . sprintf('="%s"', $mValue),
            file_get_contents(app()->environmentFilePath())
        ));
    }

    public static function insertDataInJson($mKey, $mValue, $sFileName = 'customize_website.json')
    {
        $sResourceFilePath = app()->resourcePath('files/' . $sFileName);
        if (file_exists($sResourceFilePath) === false) {
            fopen($sResourceFilePath, 'w');
        }
        $aFileData = file_get_contents($sResourceFilePath) ?? '{}';
        $aFileData = json_decode($aFileData, true);
        $aFileData[$mKey] = $mValue;
        file_put_contents($sResourceFilePath, json_encode($aFileData));
    }

    public static function getDataInJson($mKey, $sFileName = 'customize_website.json')
    {
        $sResourceFilePath = app()->resourcePath('files/' . $sFileName);
        if (file_exists($sResourceFilePath) === false) {
            fopen($sResourceFilePath, 'w');
        }
        $aFileData = file_get_contents($sResourceFilePath) ?? '{}';
        return json_decode($aFileData, true)[$mKey] ?? [];
    }

    public static function streamDownload ($oObject, $sFileName)
    {
        return response()->streamDownload(function () use($oObject, $sFileName) {
            echo  $oObject->stream();
        }, $sFileName);
    }
}
