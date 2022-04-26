<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Admin\Datatables\ProjectType;
use App\Models\Projects as ProjectsModel;
use App\Models\ProjectTypes as ProjectTypesModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Projects extends Component
{
    use WithFileUploads;

    public $aCounts = [
        'total'    => 0,
        'active'   => 0,
        'inactive' => 0
    ];

    /**
     * Project
     * @var array
     */
    public $aProjects = [];
    /**
     * Project Types
     * @var array
     */
    public $aProjectTypes = [];
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
     * Picture of Project
     * @var string
     */
    public $pictureOfProject = '';
    /**
     * @var string
     */
    public $sNameOfProject = '';
    /**
     * @var int
     */
    public $iProjectTypeIdForProject = 0;
    /**
     * @var int
     */
    public $iProjectTypeIdForProjectSelection = 0;
    /**
     * @var string
     */
    public $sCurrentTab = 'projects';
    /**
     * @var array
     */
    public $aProjectTypeRule = [
        'sNameProjectType'        => 'required',
        'sDescriptionProjectType' => 'required',
    ];
    /**
     * @var array
     */
    public $aProjectRule = [
        'pictureOfProject' => 'required|image',
        'sNameOfProject'   => 'required',
    ];

    public $listeners = ['initProjectTypeDashboardCounter'];

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $this->aProjects = $this->initProjects();
        $this->aProjectTypes = $this->initProjectTypes();
        $this->initProjectTypeDashboardCounter();
        return view('livewire.admin.projects');
    }

    /**
     * Get all project
     * @return mixed
     */
    public function initProjects()
    {
        $oProjectModel = ProjectsModel::with('user', 'projectType')->where('is_active', '!=', 0);
        if ($this->iProjectTypeIdForProjectSelection > 0) {
            $oProjectModel = $oProjectModel->where('project_type_id', $this->iProjectTypeIdForProjectSelection);
        }
        return $oProjectModel->get();
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
     * Show Modal
     */
    public function showAddProjectModal()
    {
        $this->bShowAddProjectModal = true;
        $this->clearAddProjectForm();
    }

    /**
     *
     */
    public function clearAddProjectForm()
    {
        $this->pictureOfProject = null;
        $this->sNameOfProject = '';
        $this->iProjectTypeIdForProject = 0;
        $this->aProjectTypes = $this->initProjectTypes();
    }

    public function initProjectTypeDashboardCounter()
    {
        $aModel = ProjectTypesModel::all();
        $this->aCounts = [
            'total'    => $aModel->count(),
            'active'   => $aModel->where('is_active', true)->count(),
            'inactive' => $aModel->where('is_active', false)->count(),
        ];
    }

    /**
     * Save Project Type
     */
    public function saveProjectType()
    {
        $this->validate($this->aProjectTypeRule);
        $oProjectTypeModel = new ProjectTypesModel();
        $oProjectTypeModel->name = $this->sNameProjectType;
        $oProjectTypeModel->description = $this->sDescriptionProjectType;
        $oProjectTypeModel->is_active = true;
        $oProjectTypeModel->save();
        $this->clearAddProjectTypeForm();
        $this->emit('refreshDatatable');
    }

    /**
     *
     */
    public function clearAddProjectTypeForm()
    {
        $this->sNameProjectType = '';
        $this->sDescriptionProjectType = '';
    }

    /**
     * @param string $sType
     */
    public function setCurrentTab(string $sType)
    {
        $this->sCurrentTab = $sType;
    }

    /**
     *
     */
    public function removePictureOfProject()
    {
        $this->pictureOfProject = null;
    }


    /**
     * @param int $iProjectId
     */
    public function deleteProject(int $iProjectId)
    {
        $oProjectModel = ProjectsModel::find($iProjectId);
        $oProjectModel->delete();
        $this->emit('refreshDatatable');
    }

    /**
     *
     */
    public function saveProject()
    {
        $this->validate($this->aProjectRule);
        $sFIlePath = $this->pictureOfProject->storeAs('public', 'project/' . time() . '.' . $this->pictureOfProject->getClientOriginalExtension());
        $sFIlePath = '/' . str_replace('public', 'storage', $sFIlePath);
        $oProject = new ProjectsModel();
        $oProject->project_type_id = $this->iProjectTypeIdForProject;
        $oProject->user_id = Auth::id();
        $oProject->url = $sFIlePath;
        $oProject->description = $this->sNameOfProject;
        $oProject->save();
        $this->emit('initProjects');
        $this->emit('refreshDatatable');
        $this->clearAddProjectForm();
        $this->bShowAddProjectModal = false;
    }
}

