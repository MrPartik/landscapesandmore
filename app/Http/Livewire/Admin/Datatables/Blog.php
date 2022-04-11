<?php

namespace App\Http\Livewire\Admin\Datatables;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Blog as BlogModel;

class Blog extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('blog_id');
    }

    public function columns(): array
    {
        return [
            Column::make("Title", "title")
                ->sortable()
                ->searchable(),
            Column::make("Description", "description")
                ->format(function ($mValue) {
                    return substr($mValue, 0, 50) . '...';
                })
                ->sortable()
                ->searchable(),
            Column::make("Tags", "tags")
                ->sortable()
                ->searchable(),
            Column::make("Is active", "is_active")
                ->format(function ($mValue) {
                    return ($mValue === 1) ? 'Active' : 'In-Active';
                })
                ->sortable()
                ->searchable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
            Column::make("Actions", "blog_id")
                ->format(function ($mValue, $oRow, $oColumn)  {
                    return view('livewire.admin.datatables.blog')->with([
                        'iId' => $mValue,
                        'bIsActive' => $oRow->is_active === 1
                    ]);
                }),
        ];
    }

    /**
     * @param int $iId
     */
    public function toggleActiveStatus(int $iId)
    {
        $oBlogModel = BlogModel::find($iId);
        $oBlogModel->is_active = !$oBlogModel->is_active;
        $oBlogModel->save();
    }
    /**
     * Query Builder
     * @return Builder
     */
    public function builder(): Builder
    {
        return BlogModel::query()->with('user');
    }
}
