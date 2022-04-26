<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class PreDefinedValues extends Component
{
    public $minLandscape = 0;
    public $minMaintenance = 0;
    public $minTurf = 0;
    public $pipelineKeyLandscape = '';
    public $pipelineKeyMaintenance = '';
    public $pipelineKeyWarranty = '';

    public function __construct($id = null)
    {
        $this->initContactUsDefaultValues();
        $this->initPipelineKeysDefaultValues();
        parent::__construct($id);
    }

    public function render()
    {
        return view('livewire.admin.pre-defined-values');
    }

    public function initContactUsDefaultValues()
    {
        $this->minLandscape = config('pre-defined.price.min_landscape_design');
        $this->minMaintenance = config('pre-defined.price.min_weekly_maintenance');
        $this->minTurf = config('pre-defined.price.min_turf_care');
    }

    public function initPipelineKeysDefaultValues()
    {
        $this->pipelineKeyLandscape = config('streak.installation_pipeline_key');
        $this->pipelineKeyMaintenance = config('streak.maintenance_pipeline_key');
        $this->pipelineKeyWarranty = config('streak.warranty_claim_pipeline_key');
    }

    public function saveContactUs()
    {
        $this->setEnv('PRICE_MIN_LANDSCAPE_DESIGN', $this->minLandscape);
        $this->setEnv('PRICE_MIN_WEEKLY_MAINTENANCE', $this->minMaintenance);
        $this->setEnv('PRICE_MIN_TURF_CARE', $this->minTurf);
    }

    public function saveStreak()
    {
        $this->setEnv('STREAK_PIPELINE_INSTALLATION', $this->pipelineKeyLandscape);
        $this->setEnv('STREAK_PIPELINE_MAINTENANCE', $this->pipelineKeyMaintenance);
        $this->setEnv('STREAK_PIPELINE_WARRANTY', $this->pipelineKeyWarranty);
    }

    private function setEnv($key, $value)
    {
        file_put_contents(app()->environmentFilePath(), str_replace(
            $key . '=' . env($key),
            $key . '=' . $value,
            file_get_contents(app()->environmentFilePath())
        ));
    }
}
