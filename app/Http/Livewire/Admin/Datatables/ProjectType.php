<?php

namespace App\Http\Livewire\Admin\Datatables;

use App\Models\ProjectTypes;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ProjectType extends LivewireDatatable
{
    public $model = ProjectTypes::class;
    public $beforeTableSlot = 'livewire.admin.datatables.project-type';
    public $confirmEdit = false;
    public $confirmAdd = false;
    public $name = '';
    public $email = '';
    public $role = '';
    public $iId = '';
    public $region = '';

    public function columns()
    {
        return [
            NumberColumn::name('project_type_id')->hide(),
            Column::name('name')->label('Name'),
            Column::name('description')->label('Description'),
            DateColumn::name('updated_at')->label('Updated at'),
            Column::callback(['project_type_id', 'is_active'], function ($iId, $sIsActive) {
                return view('livewire.admin.datatables.project-type', [
                    'id'   => $iId,
                    'isActive' => intval($sIsActive) === 1,
                    'type' => 'action'
                ]);
            })->label('Action')
        ];
    }
}
