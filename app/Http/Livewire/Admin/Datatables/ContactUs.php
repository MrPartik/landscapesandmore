<?php

namespace App\Http\Livewire\Admin\Datatables;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Crypt;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\ContactUs as ContactUsModel;

class ContactUs extends DataTableComponent
{
    /**
     *
     */
    public function configure(): void
    {
        $this->setPrimaryKey('contact_us_id');
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make("Name", 'contact_us_id')
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
            Column::make("Project description", "project_description")
                ->collapseOnMobile()
                ->sortable()
                ->searchable(),
            Column::make("Message", "message")
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
        return ContactUsModel::query()->select();
    }
}
