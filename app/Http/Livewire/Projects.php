<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Projects as ProjectsModel;
use App\Models\ProjectTypes as ProjectTypesModel;

class Projects extends Component
{
    /**
     * Project Types
     * @var array
     */
    public $aProjectTypes = [];

    /**
     * Project Types
     * @var array
     */
    public $aProjects = [];

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $this->aProjectTypes = $this->initProjectTypes();
        $this->aProjects = $this->initProjects();
        return view('livewire.projects');
    }

    /**
     * Get all project types
     * @return mixed
     */
    public function initProjectTypes()
    {
        return ProjectTypesModel::where('is_active', '!=', 0)->get();
    }

    /**
     * Get all project types
     * @return mixed
     */
    public function initProjects()
    {
        return ProjectsModel::with('user', 'projectType')->where('is_active', '!=', 0)->get();
    }

}
