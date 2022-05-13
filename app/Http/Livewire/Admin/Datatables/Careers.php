<?php

namespace App\Http\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Careers as CareersModel;

class Careers extends DataTableComponent
{
    protected $model = CareersModel::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Personal Information", 'name')
                ->format(function ($mValue, $mRow, $oColumn) {
                    $sPersonalInfo = '';
                    $sPersonalInfo .= sprintf('<strong>Name: </strong>%s<br/>', $mRow->name);
                    $sPersonalInfo .= sprintf('<strong>Email: </strong>%s<br/>', $mRow->email);
                    $sPersonalInfo .= sprintf('<strong>Phone: </strong>%s<br/>', $mRow->phone);
                    $sPersonalInfo .= sprintf('<span class="%s"><strong>Zip Code: </strong>%s</span><br/>', ((in_array($mRow->zip_code, config('landscaping.allowed_zip_code')) === false ? 'text-danger text' : '')), $mRow->zip_code);
                    return $sPersonalInfo;
                })->html()
                ->searchable(function ($oQuery, $sText) {
                    return $oQuery
                        ->orwhere('name', 'LIKE', '%' . $sText . '%')
                        ->orwhere('email', 'LIKE', '%' . $sText . '%')
                        ->orwhere('phone', 'LIKE', '%' . $sText . '%')
                        ->orwhere('zip_code', 'LIKE', '%' . $sText . '%');
                }),
            Column::make("Do you have a GA driver’s license?", "driver_license")
                ->format(function ($mValue) {
                    return ucfirst($mValue) ?? '-';
                })
                ->collapseOnMobile()
                ->searchable(),
            Column::make("Position Applying for", "position_applying")
                ->format(function ($mValue) {
                    return ucfirst($mValue) ?? '-';
                })
                ->collapseOnMobile()
                ->searchable(),
            Column::make("Updated at", "updated_at")
                ->format(function ($mValue) {
                    return \Carbon\Carbon::make($mValue)->format('Y-m-d H:i');
                }),
        ];
    }

    /**
     * @inheritDoc
     */
    public function builder(): Builder
    {
        return CareersModel::query()->select()->orderBy('created_at');
    }

}
