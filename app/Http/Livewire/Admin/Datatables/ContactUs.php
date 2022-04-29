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
        $this->setColumnSelectStatus(false);
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make("Personal Information", 'first_name')
                ->format(function ($mValue, $mRow, $oColumn) {
                    $sPersonalInfo = '';
                    $sPersonalInfo .= sprintf('<strong>Reference No: </strong>%s<br/>', $mRow->reference_no);
                    $sPersonalInfo .= sprintf('<strong>Name: </strong>%s<br/>', $mRow->last_name . ', ' . $mRow->first_name);
                    $sPersonalInfo .= sprintf('<strong>Email: </strong>%s<br/>', $mRow->email);
                    $sPersonalInfo .= sprintf('<strong>Phone: </strong>%s<br/>', $mRow->phone);
                    $sPersonalInfo .= sprintf('<span class="%s"><strong>Zip Code: </strong>%s</span><br/>', ((in_array($mRow->zip_code, config('landscaping.allowed_zip_code')) === false ? 'text-danger text' : '')), $mRow->zip_code);
                    return $sPersonalInfo;
                })->html()
                ->searchable(function($oQuery, $sText){
                    return $oQuery
                        ->orwhere('reference_no', 'LIKE', '%' . $sText . '%')
                        ->orwhere('last_name', 'LIKE', '%' . $sText . '%')
                        ->orwhere('first_name', 'LIKE', '%' . $sText . '%')
                        ->orwhere('email', 'LIKE', '%' . $sText . '%')
                        ->orwhere('phone', 'LIKE', '%' . $sText . '%')
                        ->orwhere('zip_code', 'LIKE', '%' . $sText . '%');
                }),
            Column::make("Project description", "project_description")
                ->format(function ($mValue) {
                    return ($mValue === 'landscape') ? 'Landscape' : 'Maintenance and Turf Care';
                })
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
