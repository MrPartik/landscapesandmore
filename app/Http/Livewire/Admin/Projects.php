<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Admin\Datatables\ProjectType;
use App\Models\Projects as ProjectsModel;
use App\Models\ProjectTypes as ProjectTypesModel;
use Livewire\Component;

class Projects extends Component
{
    /**
     * Project Types
     * @var array
     */
    public $aProjects = [];
    /**
     * Show Modal
     * @var bool
     */
    public $bShowAddProjectModal = false;
    /**
     * Project Type Name
     * @var bool
     */
    public $sNameProjectType = '';
    /**
     * Project Type Description
     * @var bool
     */
    public $sDescriptionProjectType = '';

    /**
     * @var string
     */
    public $sCurrentTab = 'projects';

    public function render()
    {
        $this->aProjects = $this->initProjects();
        return view('livewire.admin.projects');
    }

    /**
     * Get all project types
     * @return mixed
     */
    public function initProjects()
    {
        return ProjectsModel::with('user', 'projectType')->where('is_active', '!=', 0)->get();
    }

    /**
     * Show Modal
     */
    public function showAddProjectModal()
    {
        $this->bShowAddProjectModal = true;
    }

    /**
     * Save Project Type
     */
    public function saveProjectType()
    {
        $oProjectTypeModel = new ProjectTypesModel();
        $oProjectTypeModel->name = $this->sNameProjectType;
        $oProjectTypeModel->description = $this->sDescriptionProjectType;
        $oProjectTypeModel->is_active = true;
        $oProjectTypeModel->save();
        $this->clear();
        $this->emit('refreshDatatable');
    }

    /**
     *
     */
    public function clear()
    {
        $this->sNameProjectType = '';
        $this->sDescriptionProjectType = '';
    }

    public function setCurrentTab(string $sType)
    {
        $this->sCurrentTab = $sType;
    }
}
