<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Warranty as WarrantyModel;

class Warranty extends Component
{
    use WithFileUploads;

    /**
     * First Name
     * @var string
     */
    public $firstName = '';
    /**
     * Last Name
     * @var string
     */
    public $lastName = '';
    /**
     * Email Address
     * @var string
     */
    public $emailAddress = '';
    /**
     * Phone No.
     * @var string
     */
    public $phoneNo = '';
    /**
     * Home Address
     * @var string
     */
    public $homeAddress = '';
    /**
     * City Address
     * @var string
     */
    public $cityAddress = '';
    /**
     * Zip Code
     * @var string
     */
    public $zipCode = '';
    /**
     * Often do you water?
     * @var string
     */
    public $oftenDoYouWater = '';
    /**
     * Do you know the plan name?
     * @var string
     */
    public $plantName = '';
    /**
     * Do you follow watering guide?
     * @var string
     */
    public $doYouFollowWateringGuide = 'yes';
    /**
     * Pictures of landscape
     * @var string
     */
    public $picturesOfLandscapes = [];
    /**
     * Validation Rules
     *
     * @var array
     */
    private $aWarrantyRule = [
        'firstName'                => 'required',
        'lastName'                 => 'required',
        'emailAddress'             => 'required|email',
        'phoneNo'                  => 'required',
        'homeAddress'              => 'required',
        'cityAddress'              => 'sometimes',
        'zipCode'                  => 'sometimes',
        'oftenDoYouWater'          => 'sometimes',
        'plantName'                => 'sometimes',
        'doYouFollowWateringGuide' => 'required',
        'picturesOfLandscapes'     => 'sometimes',
    ];

    public function render()
    {
        return view('livewire.warranty');
    }


    /**
     * @param int $iKey
     */
    public function unsetUploadImage(int $iKey)
    {
        unset($this->picturesOfLandscapes[$iKey]);
    }


    /**
     * Submit form
     */
    public function submitWarrantyForm()
    {
        $aValidated = $this->validate($this->aWarrantyRule);
        $aFilePaths = [];
        foreach ($this->picturesOfLandscapes as $iIndex => $oImage) {
            $sFIlePath = $oImage->storeAs('public', 'warranty-' . time() . '-' . $iIndex . '.' . $oImage->getClientOriginalExtension());
            $sFIlePath = '/' . str_replace('public', 'storage', $sFIlePath);
            $aFilePaths[] = $sFIlePath;
        }
        $oWarrantyModel = new WarrantyModel();
        $oWarrantyModel->first_name = $aValidated['firstName'] ?? '-';
        $oWarrantyModel->last_name = $aValidated['lastName'] ?? '-';
        $oWarrantyModel->email = $aValidated['emailAddress'] ?? '-';
        $oWarrantyModel->phone = $aValidated['phoneNo'] ?? '-';
        $oWarrantyModel->home_address = $aValidated['homeAddress'] ?? '-';
        $oWarrantyModel->city_address = $aValidated['cityAddress'] ?? '-';
        $oWarrantyModel->zip_code = $aValidated['zipCode'] ?? '-';
        $oWarrantyModel->often_water = $aValidated['oftenDoYouWater'];
        $oWarrantyModel->knowledge_in_plant = $aValidated['plantName'];
        $oWarrantyModel->following_watering_guide = $aValidated['doYouFollowWateringGuide'];
        $oWarrantyModel->images = json_encode($aFilePaths, true);
        $oWarrantyModel->save();

        $this->emit('warranty-success');
    }
}
