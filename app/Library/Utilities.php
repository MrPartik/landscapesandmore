<?php

namespace App\Library;

class Utilities
{
    public static function setEnv($mKey, $mValue)
    {
        if (env($mKey) === null) {
            return file_put_contents(app()->environmentFilePath(), file_get_contents(app()->environmentFilePath()) . $mKey . '=' . $mValue);
        }
        file_put_contents(app()->environmentFilePath(), str_replace(
            $mKey . '=' . env($mKey),
            $mKey . '=' . $mValue,
            file_get_contents(app()->environmentFilePath())
        ));
    }
}
