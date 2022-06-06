<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Library\Utilities;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Admin\Themes\Logo;
use App\Http\Livewire\Admin\Themes\Services;

class Themes extends Component
{
    use WithFileUploads;
    use Logo;
    use Services;

    public $aSmallLogo = [];
    public $aDarkLogo = [];
    public $aLightLogo = [];
    public $uploadSmallLogo = '';
    public $uploadLightLogo = '';
    public $uploadDarkLogo = '';
    public $bannerDescription = 'Install Landscape and Design, Maintenance Services, Turf Care Services';
    public $bannerImage = '';
    public $sCurrentTab = 'announcement';
    public $ourProcessVideoUrl = '';
    public $ourProcessDescription = '';
    public $ourProcessVideoThumbnail = '';
    public $rightVideoAfterCounter = '';
    public $rightVideoAfterCounterThumbnail = '';
    public $projectTrackerLandscapeVideo = '';
    public $projectTrackerLandscapeThumbnail = '';
    public $projectTrackerTurfVideo = '';
    public $projectTrackerTurfThumbnail = '';
    public $announcements = '';

    protected $listeners = [
        'findService',
        'deleteService',
    ];

    public function __construct($id = null)
    {
        $this->bannerDescription = env('BANNER_DESCRIPTION', $this->bannerDescription);
        $this->initOurProcessData();
        $this->initVideoAfterCounterTheme();
        $this->initProjectTrackerData();
        $this->initProjectTrackerData();
        $this->iniAnnouncements();
        parent::__construct($id);
    }

    public function setCurrentTab($sCurrentTab)
    {
        $this->sCurrentTab = $sCurrentTab;
        session()->put('admin_themes_current_tab', $sCurrentTab);
    }

    public function render()
    {
        $this->initSmallLogo();
        $this->initDarkLogo();
        $this->initLightLogo();
        $this->initServiceCount();
        $this->sCurrentTab = session()->get('admin_themes_current_tab') ?? 'announcement';
        return view('livewire.admin.themes');
    }

    public function initProjectTrackerData()
    {
        $aData = Utilities::getDataInJson('homepage_project_tracker');
        $this->projectTrackerLandscapeVideo = $aData['landscape']['video_url'] ?? '';
        $this->projectTrackerLandscapeThumbnail = $aData['landscape']['video_thumbnail_url'] ?? '';
        $this->projectTrackerTurfVideo = $aData['turf']['video_url'] ?? '';
        $this->projectTrackerTurfThumbnail = $aData['turf']['video_thumbnail_url'] ?? '';
    }

    public function iniAnnouncements()
    {
        $aData = Utilities::getDataInJson('homepage_announcements');
        $this->announcements = $aData['raw'] ?? '';
    }

    public function initOurProcessData()
    {
        $aData = Utilities::getDataInJson('homepage_our_process');
        $this->ourProcessVideoUrl = $aData['video_url'] ?? '';
        $this->ourProcessVideoThumbnail = $aData['video_thumbnail_url'] ?? '';
        $this->ourProcessDescription = $aData['description'] ?? '';
    }

    public function initVideoAfterCounterTheme()
    {
        $aData = Utilities::getDataInJson('homepage_video_after_counter');
        $this->rightVideoAfterCounter = $aData['video_url'] ?? '';
        $this->rightVideoAfterCounterThumbnail = $aData['video_thumbnail_url'] ?? '';
    }

    public function initSmallLogo()
    {
        $this->aSmallLogo = [];
        foreach (Storage::disk('public')->allFiles('logo/small') as $sFileName) {
            $this->aSmallLogo[] = [
                'formatted' => '/storage/' . $sFileName,
                'original'  => $sFileName,
            ];
        }
    }

    public function initDarkLogo()
    {
        $this->aDarkLogo = [];
        foreach (Storage::disk('public')->allFiles('logo/dark') as $sFileName) {
            $this->aDarkLogo[] = [
                'formatted' => '/storage/' . $sFileName,
                'original'  => $sFileName,
            ];
        }
    }

    public function initLightLogo()
    {
        $this->aLightLogo = [];
        foreach (Storage::disk('public')->allFiles('logo/light') as $sFileName) {
            $this->aLightLogo[] = [
                'formatted' => '/storage/' . $sFileName,
                'original'  => $sFileName,
            ];
        }
    }

    public function saveProjectTracker()
    {
        $sTrackerFilePath = $this->ourProcessVideoThumbnail;
        if (is_object($sTrackerFilePath)) {
            $sTrackerFilePath = $this->ourProcessVideoThumbnail->storeAs('public', 'website/customized/thumbnail/oupt-' . time() . '.' . $this->ourProcessVideoThumbnail->getClientOriginalExtension());
            $sTrackerFilePath = '/' . str_replace('public', 'storage', $sTrackerFilePath);
        }
        $aData = [
            "video_url"           => $this->ourProcessVideoUrl,
            "description"         => $this->ourProcessDescription,
            "video_thumbnail_url" => $sTrackerFilePath,
        ];

        Utilities::insertDataInJson('homepage_our_process', $aData, true);
        $sLandscapeFilePath = $this->projectTrackerLandscapeThumbnail;
        $sTurfFilePath = $this->projectTrackerTurfThumbnail;
        if (is_object($sLandscapeFilePath)) {
            $sLandscapeFilePath = $this->projectTrackerLandscapeThumbnail->storeAs('public', 'website/customized/thumbnail/loupt-' . time() . '.' . $this->projectTrackerLandscapeThumbnail->getClientOriginalExtension());
            $sLandscapeFilePath = '/' . str_replace('public', 'storage', $sLandscapeFilePath);
        }
        if (is_object($sTurfFilePath)) {
            $sTurfFilePath = $this->projectTrackerTurfThumbnail->storeAs('public', 'website/customized/thumbnail/toupt-' . time() . '.' . $this->projectTrackerTurfThumbnail->getClientOriginalExtension());
            $sTurfFilePath = '/' . str_replace('public', 'storage', $sTurfFilePath);
        }
        $aData = [
            'landscape' => [
                "video_url"           => $this->projectTrackerLandscapeVideo,
                "video_thumbnail_url" => $sLandscapeFilePath,
            ],
            'turf'      => [
                "video_url"           => $this->projectTrackerTurfVideo,
                "video_thumbnail_url" => $sTurfFilePath,
            ],
        ];

        Utilities::insertDataInJson('homepage_project_tracker', $aData, true);
    }


    public function saveAnnouncements()
    {
        $aData = [
            'formatted' => array_filter(explode(PHP_EOL, trim($this->announcements))),
            'raw'       => trim($this->announcements)
        ];
        Utilities::insertDataInJson('homepage_announcements', $aData, true);
    }


    public function saveVideoAfterCounterTheme()
    {
        $sFilePath = $this->rightVideoAfterCounterThumbnail;
        if (is_object($sFilePath)) {
            $sFilePath = $this->rightVideoAfterCounterThumbnail->storeAs('public', 'website/customized/thumbnail/' . time() . '.' . $this->rightVideoAfterCounterThumbnail->getClientOriginalExtension());
            $sFilePath = '/' . str_replace('public', 'storage', $sFilePath);
        }
        $aData = [
            "video_url"           => $this->rightVideoAfterCounter,
            "video_thumbnail_url" => $sFilePath,
        ];

        Utilities::insertDataInJson('homepage_video_after_counter', $aData, true);
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
        Utilities::setEnv($this->getEnvKeyByType($sType), 'null');
        unset($aFile);
        $this->redirect('/admin/themes');
    }

}
