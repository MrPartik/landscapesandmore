<?php

namespace App\Http\Livewire\Admin\Datatables;

use App\Models\ProjectTypes as ProjectTypesModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ProjectType extends DataTableComponent
{
    /**
     * @var bool
     */
    public $bShowEditProjectTypeModal = false;
    /**
     * @var string
     */
    public $sName = '';
    /**
     * @var string
     */
    public $sDescription = '';
    /**
     * @var int
     */
    public $iProjectTypeId = 0;
    /**
     * @var int
     */
    public $iIncr = 1;
    /**
     * @var array
     */
    public $aProjectTypeRule = [
        'sName'        => 'required',
        'sDescription' => 'required',
    ];

    /**
     * @inheritDoc
     */
    public function configure(): void
    {
        $this->setPrimaryKey('project_type_id');
        $this->setColumnSelectStatus(false);
    }

    /**
     * @inheritDoc
     */
    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),
            Column::make('Description', 'description')
                ->sortable()
                ->searchable(),
            Column::make('Total of Projects Attached', 'project_type_id')
                ->format(function ($mValue, $oRow) {
                    return count($oRow->projects);
                })
                ->sortable()
                ->searchable(),
            Column::make('Is Active', 'is_active')
                ->format(function ($mValue) {
                    return ($mValue === 1) ? 'Active' : 'In-Active';
                })
                ->sortable()
                ->searchable(),
            Column::make('Actions', 'project_type_id')
                ->format(function ($mValue, $oRow, $oColumn)  {
                    return view('livewire.admin.datatables.project-type')->with([
                        'iId' => $mValue,
                        'bIsActive' => $oRow->is_active === 1,
                        'iRowCount' => $this->iIncr++,
                        'iTotalProjects' => count($oRow->projects)
                    ]);
                }),
        ];
    }

    /**
     * @param int $iProjectTypeId
     */
    public function toggleActiveStatus(int $iProjectTypeId)
    {
        $oProjectTypeModel = ProjectTypesModel::find($iProjectTypeId);
        $oProjectTypeModel->is_active = !$oProjectTypeModel->is_active;
        $oProjectTypeModel->save();
    }

    /**
     * @param int $iProjectTypeId
     */
    public function deleteProjectType(int $iProjectTypeId)
    {
        $oProjectTypeModel = ProjectTypesModel::find($iProjectTypeId);
        $oProjectTypeModel->delete();
    }

    /**
     * @param int $iProjectTypeId
     */
    public function findProjectType(int $iProjectTypeId)
    {
        $oProjectTypeModel = ProjectTypesModel::find($iProjectTypeId);
        $this->sName = $oProjectTypeModel->name;
        $this->sDescription = $oProjectTypeModel->description;
    }

    /**
     * Show Modal
     * @param int $iProjectTypeId
     */
    public function showEditProjectTypeModal(int $iProjectTypeId)
    {
        $this->findProjectType($iProjectTypeId);
        $this->bShowEditProjectTypeModal = true;
        $this->iProjectTypeId = $iProjectTypeId;
    }

    /**
     *
     */
    public function saveProjectType()
    {
        $this->validate($this->aProjectTypeRule);
        $oProjectTypeModel = ProjectTypesModel::find($this->iProjectTypeId);
        $oProjectTypeModel->name = $this->sName;
        $oProjectTypeModel->description = $this->sDescription;
        ($this->iProjectTypeId <= 0) && $oProjectTypeModel->is_active = true;
        $oProjectTypeModel->save();

        $this->clear();
    }

    /**
     *
     */
    public function clear()
    {
        $this->bShowEditProjectTypeModal = false;
        $this->iProjectTypeId = 0;
        $this->sName = '';
        $this->sDescription = '';
    }

    public function builder(): Builder
    {
        return ProjectTypesModel::query()->with('projects');
    }
}
