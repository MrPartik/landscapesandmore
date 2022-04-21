@section('extra-css')
    <style>
        .image-preview-container {
            position: relative;
            display: inline;
            width: 100%;
        }

        /* Make the image to responsive */
        .image-preview-container .image {
            display: inline-block;
            border: 1px dashed gray;
            border-radius: 10px;
            width: 100px;
            height: 100px;
            background-size:100% !important;
        }

        /* The overlay effect (full height and width) - lays on top of the container and over the image */
        .image-preview-container .overlay {
            position: absolute;
            top: -95px;
            bottom: 0;
            right: 10px;
            height: 25px;
            width: 10px;
            border-radius: 100px;
            opacity: 0;
            transition: .3s ease;
            background-color: salmon;
        }

        /* When you mouse over the container, fade in the overlay icon*/
        .image-preview-container:hover .overlay {
            opacity: 1;
        }

        /* The icon inside the overlay is positioned in the middle vertically and horizontally */
        .image-preview-container .icon {
            color: white;
            font-size: 13px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        /* When you move the mouse over the icon, change color */
        .image-preview-container .fa-close:hover {
            color: #eee;
        }
    </style>
@endsection
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <form name="contactForm" id='contact_form' action="javascript:void(0);" autocomplete="off">
                <div class="row">
                    <div class="col-md-12 mb10">
                        <h3>Warranty Review</h3>
                        <p>Per our agreements, we have a “One-year limited warranty on all plants and sod (with one replacement) and proper irrigation.
                            Plants and sod not properly cared for will void the warranty. Perennials are not covered under any warranty.”
                            If you believe you are under warranty please fill out the form below for our team to review.</p>
                    </div>
                    <div class="col-md-6">
                        <div id='first_name_error' class='error'>Please enter your first name.</div>
                        <div>
                            <input wire:model.lazy="firstName" type='text' name='first_name' id='first_name' class="form-control" placeholder="First Name" required>
                        </div>
                        <div id='last_name_error' class='error'>Please enter your last name.</div>
                        <div>
                            <input wire:model.lazy="lastName" type='text' name='last_name' id='last_name' class="form-control" placeholder="Last Name" required>
                        </div>

                        <div id='email_error' class='error'>Please enter your valid E-mail ID.</div>
                        <div>
                            <input wire:model.lazy="emailAddress" type='email' name='Email' id='email' class="form-control" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id='home_address_error' class='error'>Please enter your home address.</div>
                        <div>
                            <input wire:model.lazy="homeAddress" type='text' name='home_address' id='home_address' class="form-control" placeholder="Home Address" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div id='city_address_error' class='error'>Please enter your city address.</div>
                                <input wire:model.lazy="cityAddress" type='text' name='city_address' id='city_address' class="form-control" placeholder="City Address" required>
                            </div>
                            <div class="col-md-6">
                                <div id='zip_code_error' class='error'>Please enter your zip code</div>
                                <input oninput="return this.value = '{{ $zipCode }}'" value="{{ $zipCode }}" type='text' name='zip_code' id='zip_code' class="form-control" placeholder="Zip Code" required>
                            </div>
                        </div>
                        <div id='phone_error' class='error'>Please enter your phone number.</div>
                        <div>
                            <input wire:model.lazy="phoneNo" type='text' name='phone' id='phone' class="form-control" placeholder="Phone" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id='message_error' class='error'>Please enter your answer.</div>
                        <div>
                            <textarea wire:model.lazy="oftenDoYouWater" style="height: 110px" name='message' id='message' class="form-control" placeholder="How Often Do You Water?"></textarea>
                        </div>
                        <div id='message_error' class='error'>Please enter your answer.</div>
                        <div>
                            <textarea wire:model.lazy="plantName" style="height: 110px" name='message' id='message' class="form-control" placeholder="Do You Know The Name Of The Plant/Tree/Bush In Question?"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-12">
                        <strong>Have you been following the watering guide that has been given to you?</strong>
                        <div class="de_form de_radio">
                            <span class="mr20">
                                <input wire:model.lazy="doYouFollowWateringGuide" id="project_description_1" name="doYouFollowWateringGuide[]" type="radio" value="yes" checked="checked">
                                    <label for="project_description_1">Yes</label>
                                </span>
                            <span class="mr20">
                                <input wire:model.lazy="doYouFollowWateringGuide" id="project_description_2" name="doYouFollowWateringGuide[]" type="radio" value="no">
                                    <label for="project_description_2">No</label>
                                </span>
                        </div>
                        <br/>
                        <div class="de_form">
                            <strong class="de_form" for="input_7_9">Please Provide Pictures Of Your Landscape In Question</strong>
                            <div>
                                <input id="uploadPicturesOfLandscapes" style="display: none" wire:model="picturesOfLandscapes" type="file" accept="image/*" multiple>
                                <input id="uploadPictureDummyButton" onclick="$('#uploadPicturesOfLandscapes').click()" value='Upload Images' class="btn btn-primary">
                                <span>Max. file size: 2 GB.</span>
                            </div>
                        </div>
                        @if(count($picturesOfLandscapes) > 0)
                            <div class=" mt20 row" style="display:flow-root; border:1px black dashed; padding: 10px; ">
                                @foreach($picturesOfLandscapes as $iKey => $image)
                                    <div class="image-preview-container row">
                                        <div style="background: url('{{ $image->temporaryUrl() }}') no-repeat center"  class="image col-3 m-1" > </div>
                                        <div class="overlay col-3">
                                            <a href="javascript:" wire:click="unsetUploadImage({{$iKey}})" class="icon" title="Remove">
                                                <i class="fa fa-close"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="g-recaptcha" data-sitekey="6LfHDjsdAAAAANyZQJeyAUNIjTPCB-5PodXpdloe"></div>
                        <p id='submit' class="mt20">
                            <input wire:click="submitWarrantyForm" type='submit' value='Submit Form' class="btn btn-line">
                        </p>
                        <div id='mail_success' class='success'>Your message has been sent successfully.</div>
                        <div id='mail_fail' class='error'>Sorry, error occured this time sending your message.</div>
                    </div>
                    <div class="col-md-12 mb10">
                        <p>Please review our disclaimer that is apart of all of our contracts:</p>
                        <p>This is a binding contract. By signing this, you agree to accept in full the monetary responsibilities of this contract and you understand the scope, cost, and warranty for this installation.
                            Payment to Michaelangelo’s Sustainable Landscape and Design Group is due as per terms specified on contract.
                            “Due upon completion” means customer will pay Michaelangelo’s the day of completion.
                            Failure to pay as agreed will void all Michaelangelo’s Sustainable Landscape and Design responsibilities.
                            Any prior payments made by customer shall be forfeited, and applied as liquidation damages.
                            If unpaid balance is collected by or through an attorney, 10% of the principle and interest due will be added to the balance as attorney’s fees together with all cost of collection until the full amount has been paid.
                            One year limited warranty on all plants and sod (with one replacement) and proper irrigation.
                            Plants and sod not properly cared for will void the warranty. Perennials are not covered under any warranty.</p>
                    </div>
                </div>
            </form>
        </div>
        <div id="sidebar" class="col-md-4">
            <div class="widget widget_text">
                <h3>Contact Info</h3>
                <address>
                    <span>2204 Justin Trail Suite 1 Alpharetta, GA 30004</span>
                    <span><strong>Phone:</strong>(770) 209-2344</span>
                    <span><strong>Email:</strong><a href="mailto:info@landscapesandmore.com">info@landscapesandmore.com</a></span>
                    <span><strong>Web:</strong><a href="https://landscapesandmore.com/">https://landscapesandmore.com</a></span>
                </address>
            </div>
        </div>
    </div>
    @section('extra-js')
        <script async src="{{ url('js/google-api/maps.js?callback=initAutocomplete') }}"></script>
        <script>
                let oAutocomplete;
                let oAddressField;

                /**
                 * Initialized Auto Complete Places Google API
                 */
                function initAutocomplete() {
                    oAddressField = document.querySelector('#home_address');
                    oAutocomplete = new google.maps.places.Autocomplete(oAddressField, {
                        componentRestrictions: {country: ['us', 'ca', 'ga', 'ph']},
                        fields: ['address_components', 'geometry'],
                        types: ['address'],
                    });

                    oAutocomplete.addListener('place_changed', fillInAddress);
                    oAddressField.addEventListener('input', function (oThis) {
                        if (oThis.target.value.length <= 10) {
                        @this.set('zipCode', '');
                        @this.set('cityAddress', '');
                        }
                    });
                }

                /**
                 * Fill in the address
                 */
                function fillInAddress() {
                    const oPlace = oAutocomplete.getPlace();
                    let sAddress = '';
                    let sCity = '';
                    let sPostalCode = '';
                    for (const oComponent of oPlace.address_components) {
                        const componentType = oComponent.types[0];
                        switch (componentType) {
                            case 'street_number': {
                                sAddress = `${oComponent.long_name} ${sAddress}`;
                                break;
                            }
                            case 'route': {
                                sAddress += oComponent.short_name;
                                break;
                            }
                            case 'administrative_area_level_1': {
                                sAddress += ', ' + oComponent.long_name;
                                break;
                            }
                            case 'country': {
                                sAddress += ', ' + oComponent.long_name;
                                break;
                            }
                            case 'locality': {
                                sCity = oComponent.long_name;
                                break;
                            }
                            case 'postal_code': {
                                sPostalCode = `${oComponent.long_name}${sPostalCode}`;
                                break;
                            }
                        }
                    }
                @this.set('homeAddress', sAddress);
                @this.set('zipCode', (sPostalCode.length <= 0) ? '-' : sPostalCode);
                @this.set('cityAddress', sCity);
                }

                function successWarrantySubmission() {
                    Swal.fire({
                        icon: 'success',
                        html: 'Thank you for submitting your warranty claim. <br/>' +
                            'Please allow us 14days to review your warranty claim. <br/>' +
                            'We will reach out to you after review',
                        showCancelButton: false,
                        showConfirmButton: false,
                        showCloseButton: true,
                        allowOutsideClick: false,
                    });
                }

                function errorNotServiceableArea() {
                    Swal.fire({
                        icon: 'error',
                        html: 'You have entered a non-serviceable area. If you believe there is an error, you may check this page (map) for the area we service',
                        showCancelButton: false,
                        showConfirmButton: false,
                        showCloseButton: true,
                        allowOutsideClick: false,
                    });
                }

                window.livewire.on('warranty-success', function (oResult) {
                    successWarrantySubmission();
                    $('#contact_form').find('input, textarea').not('[type=submit],#uploadPictureDummyButton').val('');
                });
        </script>
    @endsection
</div>
