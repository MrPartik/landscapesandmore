<?php

namespace App\Http\Livewire\Admin\Datatables;

use App\Models\ProjectTypes;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ProjectType extends DataTableComponent
{
    /**
     * Data Table Model
     * @var string
     */
    protected $model = ProjectTypes::class;


    public $bShowEditProjectTypeModal = false;
    public $sName = '';
    public $sDescription = '';
    public $iProjectTypeId = 0;
    public $iIncr = 1;

    /**
     * @inheritDoc
     */
    public function configure(): void
    {
        $this->setPrimaryKey('project_type_id')
            ->setReorderEnabled();
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
            Column::make('Is Active', 'is_active')
                ->format(function ($mValue, $oRow, Column $oColumn) {
                    return ($mValue === 1) ? 'Active' : 'In-Active';
                })
                ->sortable()
                ->searchable(),
            Column::make('Actions', 'project_type_id')
                ->format(function ($mValue, $oRow, Column $oColumn)  {
                    return view('livewire.admin.datatables.project-type')->with([
                        'iId' => $mValue,
                        'bIsActive' => $oRow->is_active === 1,
                        'iRowCount' => $this->iIncr++
                    ]);
                }),
        ];
    }

    /**
     * @param int $iProjectTypeId
     */
    public function toggleActiveStatus(int $iProjectTypeId)
    {
        $oProjectTypeModel = ProjectTypes::find($iProjectTypeId);
        $oProjectTypeModel->is_active = !$oProjectTypeModel->is_active;
        $oProjectTypeModel->save();
    }

    /**
     * @param int $iProjectTypeId
     */
    public function findProjectType(int $iProjectTypeId)
    {
        $oProjectTypeModel = ProjectTypes::find($iProjectTypeId);
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

    public function saveProjectType()
    {
        $oProjectTypeModel = ProjectTypes::find($this->iProjectTypeId);
        $oProjectTypeModel->name = $this->sName;
        $oProjectTypeModel->description = $this->sDescription;
        ($this->iProjectTypeId <= 0) && $oProjectTypeModel->is_active = true;
        $oProjectTypeModel->save();

        $this->clear();
    }

    public function clear()
    {
        $this->bShowEditProjectTypeModal = false;
        $this->iProjectTypeId = 0;
        $this->sName = '';
        $this->sDescription = '';
    }
}
