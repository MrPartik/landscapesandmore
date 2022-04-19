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
        $this->setColumnSelectStatus(false);
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make("Name", 'warranty_id')
                ->format(function ($mValue, $mRow, $oColumn) {
                    return $mRow->last_name . ', ' . $mRow->first_name;
                })
                ->searchable(),
            Column::make("Email", "email")
                ->searchable(),
            Column::make("Phone", "phone")
                ->collapseOnMobile()
                ->searchable(),
            Column::make("Zip code", "zip_code")
                ->collapseOnMobile()
                ->searchable(),
            Column::make("Date Resolved", "was_resolved")
                ->format(function ($mValue) {
                    return ($mValue) ? \Carbon\Carbon::make($mValue)->format('Y-m-d H:i') : '<span class="text-danger">Not Resolved</span>';
                })->html()
                ->searchable(),
            Column::make("Remarks", "remarks")
                ->format(function ($mValue) {
                    return ($mValue) ?? '-';
                })
                ->collapseOnMobile()
                ->searchable(),
            Column::make("Updated at", "updated_at")
                ->format(function ($mValue) {
                    return \Carbon\Carbon::make($mValue)->format('Y-m-d H:i');
                }),
            Column::make("Actions", "warranty_id")
                ->format(function ($mValue, $oRow, $oColumn) {
                    return view('livewire.admin.datatables.warranty')->with([
                        'iId' => $mValue,
                    ]);
                }),
        ];
    }

    /**
     * @inheritDoc
     */
    public function builder(): Builder
    {
        return WarrantyModel::query()->select()->orderBy('updated_at');
    }

    public function initWarrantDetails(int $iId)
    {
        $this->emit('initWarrantDetails', $iId);
    }
}
