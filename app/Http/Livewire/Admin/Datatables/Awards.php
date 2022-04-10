<?php

namespace App\Http\Livewire\Admin\Datatables;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Awards as AwardsModel;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class Awards extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('awards_id');
    }

    public function columns(): array
    {
        return [
            Column::make("Description", "description")
                ->sortable()
                ->searchable(),
            ImageColumn::make('Award', 'url')
                ->location(function($row) {
                    return url($row->url);
                })
                ->attributes(function($row) {
                    return [
                        'style' => 'width: 100px',
                    ];
                }),
            Column::make("URL", "url")
                ->sortable(),
            Column::make("Is Active", "is_active")
                ->format(function ($mValue) {
                    return ($mValue === 1) ? 'Active' : 'In-Active';
                })
                ->sortable()
                ->searchable(),
            Column::make("Updated at", "updated_at")
                ->sortable()
                ->searchable(),
        ];
    }

    /**
     * Query Builder
     * @return Builder
     */
    public function builder(): Builder
    {
        return AwardsModel::query()->with('user');
    }
}
