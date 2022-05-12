<?php

namespace App\Http\Livewire\Admin;

use App\Library\Utilities;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use phpDocumentor\Reflection\Types\This;

class Themes extends Component
{
    use WithFileUploads;

    public $aSmallLogo = [];
    public $aDarkLogo = [];
    public $aLightLogo = [];
    public $uploadSmallLogo = '';
    public $uploadLightLogo = '';
    public $uploadDarkLogo = '';
    public $bannerDescription = 'Install Landscape and Design, Maintenance Services, Turf Care Services';
    public $bannerImage = '';

    public function __construct($id = null)
    {
        $this->bannerDescription = env('BANNER_DESCRIPTION', $this->bannerDescription);
        parent::__construct($id);
    }

    public function render()
    {
        $this->initSmallLogo();
        $this->initDarkLogo();
        $this->initLightLogo();
        return view('livewire.admin.themes');
    }

    public function initSmallLogo()
    {
        $this->aSmallLogo = [];
        foreach (Storage::disk('public')->allFiles('logo/small') as $sFileName) {
            $this->aSmallLogo[] = [
                'formatted' => '/storage/' . $sFileName,
                'original' => $sFileName
            ];
        }
    }

    public function initDarkLogo()
    {
        $this->aDarkLogo = [];
        foreach (Storage::disk('public')->allFiles('logo/dark') as $sFileName) {
            $this->aDarkLogo[] = [
                'formatted' => '/storage/' . $sFileName,
                'original' => $sFileName
            ];
        }
    }

    public function initLightLogo()
    {
        $this->aLightLogo = [];
        foreach (Storage::disk('public')->allFiles('logo/light') as $sFileName) {
            $this->aLightLogo[] = [
                'formatted' => '/storage/' . $sFileName,
                'original' => $sFileName
            ];
        }
    }

    public function saveLogo(string $sType)
    {
        switch ($sType) {
            case 'small' :
            {
                $this->validate(['uploadSmallLogo' => 'required|image']);
                $this->uploadSmallLogo->storeAs('public', 'logo/' . $sType . '/logo-' . $sType . time() . '.' . $this->uploadSmallLogo->getClientOriginalExtension());
                $this->uploadSmallLogo = '';
                break;
            }
            case 'light' :
            {
                $this->validate(['uploadLightLogo' => 'required|image']);
                $this->uploadLightLogo->storeAs('public', 'logo/' . $sType . '/logo-' . $sType . time() . '.' . $this->uploadLightLogo->getClientOriginalExtension());
                $this->uploadLightLogo = '';
                break;
            }
            case 'dark' :
            {
                $this->validate(['uploadDarkLogo' => 'required|image']);
                $this->uploadDarkLogo->storeAs('public', 'logo/' . $sType . '/logo-' . $sType . time() . '.' . $this->uploadDarkLogo->getClientOriginalExtension());
                $this->uploadDarkLogo = '';
                break;
            }
        }
    }

    public function saveBanner(string $sType)
    {
        if ($sType === 'image') {
            $this->validate(['bannerImage' => 'required|image']);
            $mFilePath = $this->bannerImage->storeAs('public', 'banner/banner-' . $sType . '.' . $this->bannerImage->getClientOriginalExtension());
            $mFilePath = '/' . str_replace('public', 'storage', $mFilePath);
            Utilities::setEnv('BANNER_IMAGE_URL', $mFilePath);
            $this->redirect('/admin/themes');
            return true;
        }
        $this->validate(['bannerDescription' => 'required']);
        Utilities::setEnv('BANNER_DESCRIPTION', $this->bannerDescription);
        $this->redirect('/admin/themes');
        return true;

    }

    public function useLogo(int $iKey, string $sType)
    {
        Utilities::setEnv($this->getEnvKeyByType($sType), $this->getLogoByType($sType)[$iKey]['formatted']);
        $this->redirect('/admin/themes');
    }

    public function deleteLogo(int $iKey, string $sType)
    {
        $aFile = $this->getLogoByType($sType)[$iKey];
        Storage::disk('public')->delete($aFile['original']);
        Utilities::setEnv($this->getEnvKeyByType($sType), 'empty');
        unset($aFile);
        $this->redirect('/admin/themes');
    }


    private function getEnvKeyByType(string $sType)
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

    private function getLogoByType(string $sType)
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
