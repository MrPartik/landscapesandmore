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
        'findAward',
        'initAwardsDashboardCounter'
    ];

    public $pictureOfAward = '';
    public $description = '';
    public $redirectUrl = '';
    public $iAwardId = 0;

    public $aCounts = [
        'total'    => 0,
        'active'   => 0,
        'inactive' => 0
    ];

    private $aAwardRule = [
        'pictureOfAward' => 'required',
        'description' => 'required',
        'redirectUrl' => 'required',
    ];

    public function render()
    {
        $this->initAwardsDashboardCounter();
        return view('livewire.admin.awards');
    }


    public function removePictureOfAward()
    {
        $this->pictureOfAward = '';
    }

    public function initAwardsDashboardCounter()
    {
        $aModel = AwardsModel::all();
        $this->aCounts = [
            'total'    => $aModel->count(),
            'active'   => $aModel->where('is_active', true)->count(),
            'inactive' => $aModel->where('is_active', false)->count(),
        ];
    }

    /**
     * @param int $iId
     */
    public function findAward(int $iId)
    {
        $oAwardModel = AwardsModel::find($iId);
        $this->description = $oAwardModel->description;
        $this->pictureOfAward = $oAwardModel->url;
        $this->redirectUrl = $oAwardModel->redirect_url;
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
        $oAward->redirect_url = $this->redirectUrl;
        $oAward->user_id = Auth::id();
        $oAward->save();
        $this->emit('refreshDatatable');
        $this->iAwardId = 0;
        $this->pictureOfAward = '';
        $this->description = '';

    }
}
