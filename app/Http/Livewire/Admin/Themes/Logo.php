<?php

namespace App\Http\Livewire\Admin\Themes;

trait Logo {


    public function getEnvKeyByType(string $sType)
    {
        $sEnvKey = '';
        switch ($sType) {
            case 'small' :
            {
                $sEnvKey = 'LOGO_SMALL_URL';
                break;
            }
            case 'light' :
            {
                $sEnvKey = 'LOGO_LIGHT_URL';
                break;
            }
            case 'dark' :
            {
                $sEnvKey = 'LOGO_DARK_URL';
                break;
            }
        }
        return $sEnvKey;
    }

    public function getLogoByType(string $sType)
    {
        switch ($sType) {
            case 'small' :
            {
                return $this->aSmallLogo;
            }
            case 'light' :
            {
                return $this->aLightLogo;
            }
            case 'dark' :
            {
                return $this->aDarkLogo;
            }
        }
    }
}
