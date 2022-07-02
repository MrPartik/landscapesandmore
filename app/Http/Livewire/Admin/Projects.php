<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\Projects as ProjectsModel;
use App\Models\ProjectTypes as ProjectTypesModel;
use App\Models\ProjectDetails as ProjectDetailsModel;

class Projects extends Component
{
    use WithFileUploads;

    public $aCounts = [
        'total'    => 0,
        'active'   => 0,
        'inactive' => 0,
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
     * Project Type Purpose Type
     * gallery|3D video
     * @var bool
     */
    public $purposeType = 'gallery';
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
    public $thumbnailVideo = '';
    /**
     * @var array
     */
    public $aProjectRule = [
        'pictureOfProject' => 'nullable|image',
        'thumbnailVideo'   => 'nullable|image',
        'sNameOfProject'   => 'required',
    ];
    public $mediaType = 'image';
    public $sUrlMedia = '';
    public $listeners = ['initProjectTypeDashboardCounter'];

    public $isGallery = true;
    public $uploadProjectModalImages = [];
    public $projectModalDescription = '';
    public $projectModalTitle = '';
    public $projectModalDate = '';
    public $projectModalLocation = '';
    public $projectModalValue = '';
    public $projectModalCategory = '';

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
     * @param int $iKey
     */
    public function unsetUploadImage(int $iKey)
    {
        unset($this->uploadProjectModalImages[$iKey]);
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
        $this->thumbnailVideo = null;
        $this->sUrlMedia = null;
        $this->sNameOfProject = '';
        $this->iProjectTypeIdForProject = 0;
        $this->aProjectTypes = $this->initProjectTypes();
    }

    public function setIsGallery()
    {
        $this->isGallery = (ProjectTypesModel::find($this->iProjectTypeIdForProject)->type === 'gallery');
        if ($this->isGallery === true) {
            $this->mediaType = 'image';
        }
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
        $oProjectTypeModel->type = $this->purposeType;
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
        $this->purposeType = 'gallery';
        $this->sUrlMedia = '';
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
        $this->pictureOfProject = '';
    }

    /**
     *
     */
    public function removeThumbnailOfVideo()
    {
        $this->thumbnailVideo = '';
    }


    /**
     * @param int $iProjectId
     */
    public function deleteProject(int $iProjectId)
    {
        $oProjectModel = ProjectsModel::find($iProjectId);
        ($oProjectModel !== null) && $oProjectModel->delete();
        $this->emit('refreshDatatable');
    }

    /**
     *
     */
    public function saveProject()
    {
        $this->validate($this->aProjectRule);
        $sFilePath = '';
        $sThumbnailPath = '';
        if ($this->mediaType === 'image') {
            $sFilePath = $this->pictureOfProject->storeAs('public', 'project/' . time() . '.' . $this->pictureOfProject->getClientOriginalExtension());
            $sFilePath = '/' . str_replace('public', 'storage', $sFilePath);
        } else if ($this->mediaType === 'video-external') {
            $sThumbnailPath = $this->thumbnailVideo->storeAs('public', 'project/thumbnails/' . time() . '.' . $this->thumbnailVideo->getClientOriginalExtension());
            $sThumbnailPath = '/' . str_replace('public', 'storage', $sThumbnailPath);
            $sFilePath = $this->sUrlMedia;
        } else {
            $sFilePath = $this->sUrlMedia;
        }
        $oProject = new ProjectsModel();
        $oProject->project_type_id = $this->iProjectTypeIdForProject;
        $oProject->user_id = Auth::id();
        $oProject->url = $sFilePath;
        $oProject->thumbnail_url = $sThumbnailPath;
        $oProject->type = $this->mediaType;
        $oProject->description = $this->sNameOfProject;
        $oProject->save();

        if ($this->isGallery) {
            $aFilePaths = [];
            foreach ($this->uploadProjectModalImages as $iIndex => $oImage) {
                $sFIlePath = $oImage->storeAs('public', 'project/details/' . time() . '-' . $iIndex . '.' . $oImage->getClientOriginalExtension());
                $sFIlePath = '/' . str_replace('public', 'storage', $sFIlePath);
                $aFilePaths[] = $sFIlePath;
            }
            ProjectDetailsModel::updateOrCreate(['project_id' => $oProject->project_id], [
                'project_id'  => $oProject->project_id,
                'title'       => $this->projectModalTitle,
                'date'        => $this->projectModalDate,
                'location'    => $this->projectModalLocation,
                'value'       => $this->projectModalValue,
                'category'    => $this->projectModalCategory,
                'description' => $this->projectModalDescription,
                'images'      => implode(',', $aFilePaths),
            ]);
        }

        $this->emit('initProjects');
        $this->emit('refreshDatatable');
        $this->clearAddProjectForm();
        $this->bShowAddProjectModal = false;
    }
}

