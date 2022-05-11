<?php

namespace App\Library;

class Utilities
{
    public static function setEnv($mKey, $mValue)
    {
        $sLetTime = time() . 'temp';
        if (env($mKey, $sLetTime) === $sLetTime) {
            return file_put_contents(app()->environmentFilePath(),$mKey . '="' . $mValue . '"' . PHP_EOL, FILE_APPEND);
        }
        file_put_contents(app()->environmentFilePath(), str_replace(
            $mKey . '="' . env($mKey) . '"',
            $mKey . '="' . $mValue . '"',
            file_get_contents(app()->environmentFilePath())
        ));
    }
}
