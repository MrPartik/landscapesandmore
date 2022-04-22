<?php

namespace App\Http\Livewire;

use App\Http\StreakApi\StreakFunctions;
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
     *Have you been following the watering guide that has been given to you
     * @var array
     */
    private $aWarrantyRule = [
        'firstName' => 'required',
        'lastName' => 'required',
        'emailAddress' => 'required|email',
        'phoneNo' => 'required',
        'homeAddress' => 'required',
        'cityAddress' => 'sometimes',
        'zipCode' => 'sometimes',
        'oftenDoYouWater' => 'sometimes',
        'plantName' => 'sometimes',
        'doYouFollowWateringGuide' => 'required',
        'picturesOfLandscapes' => 'sometimes',
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
            $sFIlePath = $oImage->storeAs('public', 'warranty/' . time() . '-' . $iIndex . '.' . $oImage->getClientOriginalExtension());
            $sFIlePath = '/' . str_replace('public', 'storage', $sFIlePath);
            $aFilePaths[] = $sFIlePath;
        }
        $oWarrantyModel = new WarrantyModel();
        $oWarrantyModel->first_name = $aValidated['firstName'] ?? '-';
        $oWarrantyModel->last_name = $aValidated['lastName'] ?? '-';
        $oWarrantyModel->reference_no = 'WARRANTY-CLAIM-' . date('Y') . '-' . (time() + time() - 500);
        $oWarrantyModel->email = $aValidated['emailAddress'] ?? '-';
        $oWarrantyModel->phone = $aValidated['phoneNo'] ?? '-';
        $oWarrantyModel->home_address = $aValidated['homeAddress'] ?? '-';
        $oWarrantyModel->city_address = $aValidated['cityAddress'] ?? '-';
        $oWarrantyModel->zip_code = $aValidated['zipCode'] ?? '-';
        $oWarrantyModel->often_water = $aValidated['oftenDoYouWater'];
        $oWarrantyModel->knowledge_in_plant = $aValidated['plantName'];
        $oWarrantyModel->following_watering_guide = $aValidated['doYouFollowWateringGuide'] === 'yes';
        $oWarrantyModel->images = json_encode($aFilePaths, true);
        $oWarrantyModel->save();
        $this->createBox($oWarrantyModel);
        $this->emit('warranty-success');
        $this->clear();
    }

    private function clear()
    {
        $this->firstName = '';
        $this->lastName = '';
        $this->emailAddress = '';
        $this->phoneNo = '';
        $this->homeAddress = '';
        $this->cityAddress = '';
        $this->zipCode = '';
        $this->doYouFollowWateringGuide = 'yes';
        $this->plantName = '';
        $this->oftenDoYouWater = '';
        $this->picturesOfLandscapes = [];
    }

    /**
     * @param $oWarrantyModel
     * @return mixed
     */
    private function createBox($oWarrantyModel)
    {
        $aImages = json_decode($oWarrantyModel->images ?? '[]', true);
        $aNewImages = [];
        foreach ($aImages as $sImageUrl) {
            $aNewImages[] = config('app.url') . $sImageUrl;
        }
        $aResponse = (new StreakFunctions())->createBox(config('streak.warranty_claim_pipeline_key'),  [
            'name'     => sprintf('%s, %s', $oWarrantyModel->last_name, $oWarrantyModel->first_name),
            'stageKey' => 5001,
            'assignedToSharingEntries' => [
                [
                    'email' => 'csr@landscapesandmore.com'
                ]
            ],
            'notes' => '',
            'fields' => [
                1006 => $oWarrantyModel->reference_no,
                1008 => implode(', ', $aNewImages)
            ]
        ]);
        $aSearchedContacts = (new StreakFunctions())->search($oWarrantyModel->email);
        if (empty($aSearchedContacts['results']['contacts'][0]['emailAddresses'][0]) === false && $aSearchedContacts['results']['contacts'][0]['emailAddresses'][0] === $oWarrantyModel->email) {
            $aResponse = (new StreakFunctions())->updateBox($aResponse['boxKey'], [
                'contacts' => [
                    [
                        'isStarred'   => false,
                        'isAutoboxed' => false,
                        'key'         => $aSearchedContacts['results']['contacts'][0]['key']
                    ]
                ]
            ]);
        }
        return $aResponse;
    }
}
