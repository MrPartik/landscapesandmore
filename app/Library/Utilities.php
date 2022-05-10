<?php

namespace App\Library;

class Utilities
{
    public static function setEnv($mKey, $mValue)
    {
        if (env($mKey) === null) {
            return file_put_contents(app()->environmentFilePath(),$mKey . '=' . $mValue . PHP_EOL, FILE_APPEND);
        }
        file_put_contents(app()->environmentFilePath(), str_replace(
            $mKey . '=' . env($mKey),
            $mKey . '=' . $mValue,
            file_get_contents(app()->environmentFilePath())
        ));
    }
}
