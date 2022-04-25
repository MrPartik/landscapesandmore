<div class="container">
    <div class="row">
        <div class="col-md-8">
            <form name="contactForm" id='contact_form' action="javascript:void(0);" autocomplete="off">
                <div class="row">
                    <div class="col-md-12 mb10">
                        <h3>Send Us Message</h3>
                        <p>We have a minimum project for landscape design and installation projects that starts at {{ config('pre-defined.price.min_landscape_design') }}. <br/>
                            We have a minimum weekly maintenance service that starts at {{ config('pre-defined.price.min_weekly_maintenance') }} <br/>
                            Turf Care has a minimum of {{ config('pre-defined.price.min_turf_care') }}</p>
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
                        <div id='message_error' class='error'>Please enter your message.</div>
                        <div>
                            <textarea wire:model.lazy="message" style="height: 110px" name='message' id='message' class="form-control" placeholder="Tell us something about your project"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <strong for="reference-contactus">
                            Reference
                        </strong>
                        <select id=reference-contactus wire:model="reference"  type="text" class="form-control" placeholder="{{ __('Reference') }}">
                            <option selected disabled value=""> Select reference </option>
                            <option value="Angi's List"> Angi's List </option>
                            <option value="Bruce Referral"> Bruce Referral </option>
                            <option value="Client Referral"> Client Referral </option>
                            <option value="Designing Spaces Show"> Designing Spaces Show </option>
                            <option value="Existing Customer"> Existing Customer </option>
                            <option value="Google"> Google </option>
                            <option value="Houzz"> Houzz </option>
                            <option value="M360"> M360 </option>
                            <option value="Neighbor"> Neighbor </option>
                            <option value="Facebook"> Facebook </option>
                        </select>

                        <strong class="mt-3">Project Description</strong>
                        <div class="de_form de_radio">
                            <span class="mr20">
                                <input wire:model.lazy="projectDescription" id="project_description_1" name="project_description" type="radio" value="landscape" checked="checked">
                                    <label for="project_description_1">Landscape</label>
                                </span>
                            <span class="mr20">
                                <input wire:model.lazy="projectDescription" id="project_description_2" name="project_description" type="radio" value="maintenance-and-turf-care">
                                    <label for="project_description_2">Maintenance and Turf Care</label>
                                </span>
                        </div>
                        <p id='submit' class="mt20">
                            <input wire:click="submitContactUs" type='submit' value='Submit Form' class="btn btn-line">
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
                            html: 'Thank you for contacting us, one of our representatives will call you to discuss your project further. <br/>' +
                                'Please allow us 24-48hrs to review your information. <br/>' +
                                'You may check the status of your application status here: <a class="btn-link" href="{{ url('/process') }}"> Application Status.</a>',
                            showCancelButton: false,
                            showConfirmButton: false,
                            showCloseButton: true,
                            allowOutsideClick: false,
                        });
                    }

                    function errorNotServiceableArea() {
                        Swal.fire({
                            icon: 'info',
                            html: 'You have entered a non-serviceable area. If you believe there is an error, you may check this page (map) for the area we service',
                            showCancelButton: false,
                            showConfirmButton: false,
                            showCloseButton: true,
                            allowOutsideClick: false,
                        });
                    }

                    window.livewire.on('contact-us-success', function (oResult) {
                        successWarrantySubmission();
                        $('#contact_form').find('input, textarea').not('[type=submit]').val('');
                    });
        </script>
    @endsection
</div>
