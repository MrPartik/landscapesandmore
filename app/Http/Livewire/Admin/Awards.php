<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Awards as AwardsModel;

class Awards extends Component
{
    use WithFileUploads;

    public $listeners = [
        'findAward'
    ];

    public $pictureOfAward = '';
    public $description = '';
    public $iAwardId = 0;

    private $aAwardRule = [
        'pictureOfAward' => 'required',
        'description' => 'required',
    ];

    public function render()
    {
        return view('livewire.admin.awards');
    }

    public function removePictureOfAward()
    {
        $this->pictureOfAward = '';
    }

    /**
     * @param int $iId
     */
    public function findAward(int $iId)
    {
        $oAwardModel = AwardsModel::find($iId);
        $this->description = $oAwardModel->description;
        $this->pictureOfAward = $oAwardModel->url;
        $this->iAwardId = $iId;
    }

    public function backToAdd()
    {
        $this->iAwardId = 0;
        $this->pictureOfAward = '';
        $this->description = '';
    }

    public function saveAward()
    {
        $this->validate($this->aAwardRule);
        $mFilePath = $this->pictureOfAward;
        if (is_object($mFilePath)) {
            $mFilePath = $this->pictureOfAward->storeAs('public', 'awards/' . time() . '.' . $this->pictureOfAward->getClientOriginalExtension());
            $mFilePath = '/' . str_replace('public', 'storage', $mFilePath);
        }
        $oAward = ($this->iAwardId <= 0) ? new AwardsModel() : AwardsModel::find($this->iAwardId);
        $oAward->description = $this->description;
        $oAward->url = $mFilePath;
        $oAward->user_id = Auth::id();
        $oAward->save();
        $this->emit('refreshDatatable');
        $this->iAwardId = 0;
        $this->pictureOfAward = '';
        $this->description = '';

    }
}
