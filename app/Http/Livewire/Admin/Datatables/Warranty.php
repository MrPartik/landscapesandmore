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
            Column::make("Name", 'last_name')
                ->format(function ($mValue, $mRow, $oColumn) {
                    $sPersonalInfo = '';
                    $sPersonalInfo .= sprintf('<strong>Name: </strong>%s<br/>', $mRow->last_name . ', ' . $mRow->first_name);
                    $sPersonalInfo .= sprintf('<strong>Email: </strong>%s<br/>', $mRow->email);
                    $sPersonalInfo .= sprintf('<strong>Phone: </strong>%s<br/>', $mRow->phone);
                    $sPersonalInfo .= sprintf('<strong>Zip Code: </strong>%s<br/>', $mRow->zip_code);
                    return $sPersonalInfo;
                })->html()
                ->searchable(function($oQuery, $sText){
                        return $oQuery
                            ->orwhere('last_name', 'LIKE', '%' . $sText . '%')
                            ->orwhere('first_name', 'LIKE', '%' . $sText . '%')
                            ->orwhere('email', 'LIKE', '%' . $sText . '%')
                            ->orwhere('phone', 'LIKE', '%' . $sText . '%')
                            ->orwhere('zip_code', 'LIKE', '%' . $sText . '%');
                }),
            Column::make("Was Resolved", "was_resolved")
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
            Column::make("Resolved", "was_resolved")
                ->format(function ($mValue, $oRow) {
                    return view('livewire.admin.datatables.warranty')->with([
                        'sType'          => 'is_resolved',
                        'iId'            => $oRow->warranty_id,
                        'sResolvedDate'  => $mValue
                    ]);
                }),
            Column::make("Contacted", "was_contacted")
                ->format(function ($mValue, $oRow) {
                    return view('livewire.admin.datatables.warranty')->with([
                        'sType'          => 'is_contacted',
                        'iId'            => $oRow->warranty_id,
                        'sContactedDate' => $mValue
                    ]);
                }),
            Column::make("Actions", "warranty_id")
                ->format(function ($mValue, $oRow, $oColumn) {
                    return view('livewire.admin.datatables.warranty')->with([
                        'sType' => 'actions',
                        'iId'   => $mValue,
                    ]);
                }),
        ];
    }

    /**
     * @inheritDoc
     */
    public function builder(): Builder
    {
        return WarrantyModel::query()->select()->orderBy('created_at');
    }

    public function initWarrantDetails(int $iId)
    {
        $this->emit('initWarrantDetails', $iId);
    }

    public function markStatusResolve(int $iId, string $sResolutionType)
    {
        $this->emit('showRemarksModal', $iId, $sResolutionType);
    }

    public function saveStatusContact(int $iId)
    {
        $oWarranty = WarrantyModel::find($iId);
        $oWarranty->was_contacted = ($oWarranty->was_contacted === null) ? now() : null;
        $oWarranty->save();
    }

}
