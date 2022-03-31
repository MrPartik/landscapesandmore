<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

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
        'cityAddress'              => 'required',
        'zipCode'                  => 'required',
        'oftenDoYouWater'          => 'nullable',
        'plantName'                => 'nullable',
        'doYouFollowWateringGuide' => 'required',
        'picturesOfLandscapes'     => 'required|image|mimes:jpeg,jpg,png,gif',
    ];

    public function render()
    {
        return view('livewire.warranty');
    }


    public function unsetUploadImage(int $iKey)
    {
        unset($this->picturesOfLandscapes[$iKey]);
    }


    /**
     * Submit form
     */
    public function submitWarrantyForm()
    {
        dd($this->picturesOfLandscapes);
    }
}
