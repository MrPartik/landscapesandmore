<?php

namespace App\Http\Livewire\Admin\Datatables;

use App\Models\User as UserModel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Users extends DataTableComponent
{
    public function configure()
    : void
    {
        $this->setPrimaryKey('id');
    }

    public function columns()
    : array
    {
        return [
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Email", "email")
                ->sortable()
                ->searchable(),
            Column::make("Role", "role")
                ->format(function ($mValue) {
                    return ucfirst(str_replace('_', ' ', $mValue));
                })->sortable()
                ->searchable(),
            Column::make("Updated at", "updated_at")
                ->format(function ($mValue) {
                    return \Carbon\Carbon::make($mValue)->format('Y-m-d H:i');
                })->sortable(),
            Column::make("Actions", "id")
                ->format(function ($mValue, $oRow, $oColumn) {
                    return view('livewire.admin.datatables.users')->with([
                        'iId'       => $mValue,
                        'bIsActive' => $oRow->is_active,
                    ]);
                }),
        ];
    }

    /**
     * @inheritDoc
     */
    public function builder()
    : Builder
    {
        return UserModel::query()->select()->orderBy('created_at');
    }

    public function showEditModal($iId)
    {
        $this->emit('showEditModal', $iId);
    }

    public function toggleActiveStatus($iId)
    {
        $this->emit('toggleActiveStatus', $iId);
    }
}
