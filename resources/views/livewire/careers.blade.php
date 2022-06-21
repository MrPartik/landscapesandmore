<div class="container">
    <div class="loading-page" wire:loading.block wire:target="submitCareers">Loading&#8230;</div>
    <div class="row">
        <div class="col-md-8">
            <form name="contactForm" id='contact_form' action="javascript:void(0);" autocomplete="off">
                <div class="row">
                    <div class="col-md-12 mb10">
                        <h3>Send Us Message</h3>
                        <p>Be part of our growing team! Don't miss out on this opportunity! Send us a message and we’ll reach out to you.</p>
                    </div>
                    <div class="col-md-6">
                        <div id='first_name_error' class='error'>Please enter your first name.</div>
                        <div>
                            <input wire:model.lazy="name" type='text' name='name' id='first_name' class="form-control" placeholder=" Name" required>
                        </div>

                        <div id='email_error' class='error'>Please enter your valid E-mail ID.</div>
                        <div>
                            <input wire:model.lazy="emailAddress" type='email' name='Email' id='email' class="form-control" placeholder="Email" required>
                        </div>

                        <div id='phone_error' class='error'>Please enter your phone number.</div>
                        <div>
                            <input wire:model.lazy="phoneNo" type='text' name='phone' id='phone' class="form-control" placeholder="Phone" required>
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
                                <input oninput="return this.value = '{{ $zipCode }}'" value="{{ $zipCode }}" type='text' name='zip_code' id='zip_code' class="form-control" placeholder="Zip Code">
                            </div>
                        </div>
                        <div>
                            <strong class="mt-3">Do you have a GA driver’s license?</strong>
                            <div class="de_form de_radio">
                            <span class="mb20" style="margin-top: 10px;">
                                <input wire:model.lazy="driverLicense" id="drivers_license_1" type="radio" value="yes" checked="checked">
                                    <label for="drivers_license_1">Yes</label>
                                </span>
                                <span class="mr20">
                                <input wire:model.lazy="driverLicense" id="drivers_license_2" type="radio" value="no">
                                    <label for="drivers_license_2">No</label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">

                        <strong class="mt-3">Position Applying for</strong>
                        <div class="de_form de_checkbox">
                            @foreach(array_filter(explode(',', env('CAREERS_AVAILABLE_POSITION', ''))) ?? [] as $iKey => $sPosition )
                                <span class="mb20">
                                    <input wire:model="careersPosition" name="careerPosition" id="position_{{ $iKey }}" type="radio" value="{{ $sPosition }}" >
                                <label for="position_{{ $iKey }}"  style="margin-bottom: 10px;">{{ $sPosition }}</label>
                            </span>
                            @endforeach
                        </div>
                        <p id='submit' class="mt20">
                            <input wire:click="submitCareers" type='submit' value='Submit Form' class="btn btn-line">
                        </p>
                        <div id='mail_success' class='success'>Your message has been sent successfully.</div>
                        <div id='mail_fail' class='error'>Sorry, error occured this time sending your message.</div>
                    </div>
                </div>
            </form>
        </div>
        <div id="sidebar" class="col-md-4">
            <div class="widget widget_text">
                <h3>Contact Info</h3>
                <address>
                    <span>2204 Justin Trail Suite 1 Alpharetta, GA 30004</span>
                    <span><strong>Phone:</strong>{{ env('WEBSITE_PHONE_NO', '(770) 209-2344') }}   </span>
                    <span><strong>Email:</strong><a href="mailto:info@landscapesandmore.com">info@landscapesandmore.com</a></span>
                    <span><strong>Web:</strong><a href="{{ env('APP_URL') }}/">{{ env('APP_URL') }}</a></span>
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
                    html: 'Thank you for submitting your application.' +
                        ' If we do not contact you within 24-48 business hours (Monday - Friday 8:00 am -5:00 pm) from the time you submit this form,' +
                        ' please email us at info@landscapesandmore.com or call us at {{ env('WEBSITE_PHONE_NO', '(770) 209-2344') }}.',
                    showCancelButton: false,
                    showConfirmButton: false,
                    showCloseButton: true,
                    allowOutsideClick: false,
                });
            }

            window.livewire.on('careers-success', function (oResult) {
                successWarrantySubmission();
                $('#contact_form').find('input, textarea').not('[type=submit]').val('');
            });
        </script>
    @endsection
</div>
