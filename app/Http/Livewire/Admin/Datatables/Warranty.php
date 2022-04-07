<?php

namespace App\Http\Livewire\Admin\Datatables;

use App\Models\Warranty as WarrantyModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Crypt;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Warranty extends DataTableComponent
{
    /**
     *
     */
    public function configure(): void
    {
        $this->setPrimaryKey('warranty_id');
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make("Name", 'warranty_id')
                ->format(function($mValue, $mRow, $oColumn) {
                    return $mRow->last_name . ', ' . $mRow->first_name;
                })
                ->sortable()
                ->searchable(),
            Column::make("Email", "email")
                ->sortable()
                ->searchable(),
            Column::make("Phone", "phone")
                ->collapseOnMobile()
                ->sortable()
                ->searchable(),
            Column::make("Home address", "home_address")
                ->collapseOnMobile()
                ->sortable()
                ->searchable(),
            Column::make("City address", "city_address")
                ->collapseOnMobile()
                ->sortable()
                ->searchable(),
            Column::make("Zip code", "zip_code")
                ->collapseOnMobile()
                ->sortable()
                ->searchable(),
            Column::make("How Often Do You Water", "often_water")
                ->collapseOnMobile()
                ->sortable()
                ->searchable(),
            Column::make("Do you know the name of the plant?", "knowledge_in_plant")
                ->collapseOnMobile()
                ->sortable()
                ->searchable(),
            Column::make("Have you been following the watering guide?", "following_watering_guide")
                ->collapseOnMobile()
                ->sortable()
                ->searchable(),
            Column::make("Updated at", "updated_at")
                ->collapseOnMobile()
                ->sortable()
                ->searchable(),
        ];
    }

    /**
     * @inheritDoc
     */
    public function builder() : Builder
    {
        return WarrantyModel::query()->select();
    }
}
