<?php

namespace App\Http\Livewire\Admin;

use App\Http\GoogleApi\GoogleClient;
use App\Library\Utilities;
use Livewire\Component;
use App\Models\Reviews as ReviewModel;

class Reviews extends Component
{
    use GoogleClient;

    public $aReviews = [];
    public $author = '';
    public $rating = '';
    public $summary = '';
    public $snippet = '';
    public $description = '';
    public $aDisplayedReviews = [];
    const DISPLAYED_REVIEW_KEYS = 'DISPLAYED_REVIEW_KEYS';
    public $iId = 0;
    protected $listeners = ['toggleEdit', 'deleteReview'];

    private $aReviewRule = [
        'author'      => 'required',
        'rating'      => 'required|min:1|max:5|numeric',
        'summary'     => 'required',
        'snippet'     => 'sometimes',
        'description' => 'required',
    ];


    public function render()
    {
        return view('livewire.admin.reviews');
    }

    public function mount()
    {
        $this->initDisplayReviews();
        $this->initCustomerReviews();
    }

    public function initDisplayReviews()
    {
        $this->aDisplayedReviews = explode(',', env(self::DISPLAYED_REVIEW_KEYS));
    }

    public function initCustomerReviews()
    {
        $this->aReviews = ReviewModel::all();
//        $aResult = $this->get(sprintf('https://maps.googleapis.com/maps/api/place/details/json?place_id=%s&fields=name,rating,formatted_phone_number,reviews&key=%s', config('google.place_key'), config('google.api_key')));
//        $this->aReviews = $aResult['result'] ?? [];
    }

    public function toggleDisplayReview($mValue)
    {
        if (in_array($mValue, $this->aDisplayedReviews) === true) {
            unset($this->aDisplayedReviews[array_search($mValue, $this->aDisplayedReviews)]);
        } else {
            array_push($this->aDisplayedReviews, $mValue);
        }
        Utilities::setEnv(self::DISPLAYED_REVIEW_KEYS, implode(',', $this->aDisplayedReviews));
    }

    public function toggleEdit($iId)
    {
        $this->iId = $iId;
        $oReviewModel = ReviewModel::find($this->iId);
        $this->author = $oReviewModel->author;
        $this->summary = $oReviewModel->summary;
        $this->snippet = $oReviewModel->snippet;
        $this->description = $oReviewModel->description;
        $this->rating = $oReviewModel->rating;
        $this->redirect("#");
    }

    public function deleteReview($iId)
    {
        $oReviewModel = ReviewModel::find($iId);
        $oReviewModel->delete();
        $this->emit('refreshDatatable');
    }

    public function clear()
    {
        $this->author = '';
        $this->summary = '';
        $this->snippet = '';
        $this->description = '';
        $this->rating = '';
        $this->iId = 0;
        $this->emit('refreshDatatable');
    }

    public function saveRating()
    {
        $this->validate($this->aReviewRule);
        $oReviewModel = new ReviewModel();
        if ($this->iId > 0)
        {
            $oReviewModel = ReviewModel::find($this->iId);
        }
        $oReviewModel->author = $this->author;
        $oReviewModel->summary = $this->summary;
        $oReviewModel->snippet = $this->snippet;
        $oReviewModel->description = $this->description;
        $oReviewModel->rating = $this->rating;
        $oReviewModel->date_in_text = '';
        $oReviewModel->is_active = true;
        $oReviewModel->save();
        $this->clear();
    }
}
