<?php

namespace App\Http\Livewire\Admin\Datatables;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Reviews as ReviewModel;

class Reviews extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('review_id');
    }

    public function toggleDisplay($iId) {
        $oReviewModel = ReviewModel::find($iId);
        $oReviewModel->is_active = !$oReviewModel->is_active;
        $oReviewModel->save();

    }

    public function columns(): array
    {
        return [
            Column::make("Review Details", "created_at")
                ->format(function ($mValue, $mRow, $oColumn) {
                    $aRatingHtml = '<span wire:click="sample" style="font-size: 15px;">
                                        <span class="fa fa-star ' . (($mRow->rating >= 1) ? 'checked' : '') . '"></span>
                                        <span class="fa fa-star ' . (($mRow->rating >= 2) ? 'checked' : '') . '"></span>
                                        <span class="fa fa-star ' . (($mRow->rating >= 3) ? 'checked' : '') . '"></span>
                                        <span class="fa fa-star ' . (($mRow->rating >= 4) ? 'checked' : '') . '"></span>
                                        <span class="fa fa-star ' . (($mRow->rating >= 5) ? 'checked' : '') . '"></span>
                                    </span>';
                    $sReviewDetails = '';
                    $sReviewDetails .= sprintf('<strong>Rating: </strong>%s<br/>', $aRatingHtml);
                    $sReviewDetails .= sprintf('<strong>Display Status: </strong><button class="btn %s text-white" wire:click="toggleDisplay(%s)">%s</button><br/>', (!$mRow->is_active) ? 'btn-danger ' : 'btn-success', $mRow->review_id, ($mRow->is_active) ? 'Displayed' : 'Don\'t Display');
                    $sReviewDetails .= sprintf('<strong>Summary: </strong>%s<br/>', $mRow->summary);
                    $sReviewDetails .= sprintf('<strong>Snippet: </strong>%s<br/>', $mRow->snippet);
                    $sReviewDetails .= sprintf('<strong>Description: </strong>%s<br/>', $mRow->description);
                    $sReviewDetails .= sprintf('<strong>Date in Text: </strong>%s<br/>', $mRow->date_in_text);
                    $sReviewDetails .= sprintf('<strong>Created at: </strong>%s<br/><br/>', \Carbon\Carbon::make($mRow->created_at)->format('Y-m-d H:i'));
                    $sReviewDetails .= sprintf('<strong>Actions: </strong><button class="btn btn-warning" wire:click="toggleEdit(%s)" ><i class="fa fa-pencil text-white"></i></button><button class="btn btn-danger" wire:click="deleteReview(%s)"><i class="fa fa-trash text-white"></i></button><br/><br/>', $mRow->review_id, $mRow->review_id);
                    return $sReviewDetails;
                })->html()
                ->sortable()
                ->searchable(function($oQuery, $sText){
                    return $oQuery
                        ->orwhere('summary', 'LIKE', '%' . $sText . '%')
                        ->orwhere('snippet', 'LIKE', '%' . $sText . '%')
                        ->orwhere('description', 'LIKE', '%' . $sText . '%');
                }),
        ];
    }

    public function toggleEdit($iId) {
        $this->emit('toggleEdit', $iId);
    }

    public function deleteReview($iId) {
        $this->emit('deleteReview', $iId);
    }

    /**
     * @inheritDoc
     */
    public function builder(): Builder
    {
        return ReviewModel::query()->select()->orderBy('created_at');
    }
}
