<?php

namespace App\Http\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Services as ServicesModel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class Services extends DataTableComponent
{

    public function configure(): void
    {
        $this->setPrimaryKey('services_id');
    }

    public function columns(): array
    {
        return [
            ImageColumn::make("Image", "image")
                ->location(function($row) {
                    return url($row->image);
                })
                ->attributes(function($row) {
                    return [
                        'style' => 'width: 100px',
                    ];
                }),
            Column::make("Title", "title")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Type", "type")
                ->format(function ($mValue, $oRow, $oColumn)  {
                    return ucwords($mValue);
                })
                ->sortable(),
            Column::make("Redirect Url", "url")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable()
                ->searchable(),
            Column::make('Actions', 'services_id')
                ->format(function ($mValue, $oRow, $oColumn)  {
                    return view('livewire.admin.datatables.services')->with([
                        'iId' => $mValue,
                        'bIsActive' => $oRow->is_active,
                    ]);
                }),
        ];
    }

    /**
     * @inheritDoc
     */
    public function builder(): Builder
    {
        return ServicesModel::query()->select()->orderBy('created_at');
    }

    public function findService(int $iId) {
        $this->emit('findService', $iId);
    }

    public function deleteService(int $iId) {
        $this->emit('deleteService', $iId);
    }

}
