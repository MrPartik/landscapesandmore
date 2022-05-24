<?php

namespace App\Http\Livewire\Admin\Datatables;

use Illuminate\Database\Eloquent\Builder;
use Livewire\WithFileUploads;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Awards as AwardsModel;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class Awards extends DataTableComponent
{

    public function configure(): void
    {
        $this->setPrimaryKey('awards_id');
        $this->setColumnSelectStatus(false);
    }

    public function findAward(int $iId) {
        $this->emit('findAward', $iId);
    }

    public function columns(): array
    {
        return [
            ImageColumn::make('Award', 'url')
                ->location(function($row) {
                    return url($row->url);
                })
                ->attributes(function($row) {
                    return [
                        'style' => 'width: 100px',
                    ];
                }),
            Column::make("Description", "description")
                ->sortable()
                ->searchable(),
            Column::make("Redirect Url", "redirect_url")
                ->sortable(),
            Column::make("URL", "url")
                ->sortable(),
            Column::make("Is Active", "is_active")
                ->format(function ($mValue) {
                    return ($mValue) ? 'Active' : 'In-Active';
                })
                ->sortable()
                ->searchable(),
            Column::make("Updated at", "updated_at")
                ->sortable()
                ->searchable(),
            Column::make('Actions', 'awards_id')
                ->format(function ($mValue, $oRow, $oColumn)  {
                    return view('livewire.admin.datatables.awards')->with([
                        'iId' => $mValue,
                        'bIsActive' => $oRow->is_active,
                    ]);
                }),
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

    /**
     * @param int $iId
     */
    public function toggleActiveStatus(int $iId)
    {
        $oAwardModel = AwardsModel::find($iId);
        $oAwardModel->is_active = !$oAwardModel->is_active;
        $oAwardModel->save();
        $this->emit('initAwardsDashboardCounter');
    }
}
