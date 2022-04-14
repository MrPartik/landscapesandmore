<div>

    <!-- section begin -->
    <section aria-label="section">
        <div class="container">
            <div>
                <div class="mt-3">
                    <strong>Select Type Process</strong>
                    <div class="de_form de_radio">
                        <span class="mr20"> <input wire:model="typeOfInquiry" id="landscaping-label" name="typeOfInquiry" type="radio" value="landscape" checked="checked"> <label wire:click="clearProcessForm" for="landscaping-label">Landscape</label></span>
                        <span class="mr20"><input wire:model="typeOfInquiry" id="turf-label" name="typeOfInquiry" type="radio" value="maintenance-and-turf-care"> <label wire:click="clearProcessForm" for="turf-label">Maintenance and Turf Care</label> </span>
                    </div>
                </div>
            </div>
            <div id="landscaping-inquiry-form" aria-label="landscaping-inquiry-form" class="{{ ($typeOfInquiry === 'landscape') ? '' : 'hidden'}}">
                <div class="progress-steps mt-3">
                    <div class="row">
                        <div style="text-align-last: center">
                            <h2><strong>Install Landscape and Design</strong></h2>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        </div>
                        <div class="col-md-12 mx-0">
                            <form name="contactForm" id='contact_form' action="javascript:void(0);" autocomplete="off" class="progress-steps-form">
                                <!-- progressbar -->
                                <ul class="progress-bar-line l-5">
                                    <li class="active contact-us"><strong>Contact Us</strong></li>
                                    <li class="consultation"><strong>Consultation</strong></li>
                                    <li class="design"><strong>Design</strong></li>
                                    <li class="design-presentation"><strong>Design Presentation</strong></li>
                                    <li class="sold"><strong>Sold Project</strong></li>
                                </ul> <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Contact Us </h2>
                                        <br/>
                                        <p wire:loading wire:target="validateEmailInStreak"><i class="loader-inline"></i> Validating your email, Please wait...</p>

                                        {{ json_encode($streakApiResult) }}
                                        <div class="row">
                                            <div class="col-lg-8 col-md-12">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <div>
                                                            <input wire:model="emailAddress" type='email' name='Email' id='email' class="form-control" placeholder="Email" required/>
                                                        </div>
                                                        <div>
                                                            <input wire:model.lazy="phoneNo" type='text' name='phone' id='phone' class="form-control" placeholder="Phone" required>
                                                        </div>
                                                        <div>
                                                            <input wire:model.lazy="firstName" type='text' name='first_name' id='first_name' class="form-control" placeholder="First Name" required>
                                                        </div>
                                                        <div>
                                                            <input wire:model.lazy="lastName" type='text' name='last_name' id='last_name' class="form-control" placeholder="Last Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div id='home_address_error' class='error'>Please enter your home address.</div>
                                                        <div>
                                                            <input wire:model.lazy="homeAddress" type='text' name='home_address' id='home_address_landscape' class="form-control" placeholder="Home Address" required>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-12">
                                                                <div id='city_address_error' class='error'>Please enter your city address.</div>
                                                                <input wire:model.lazy="cityAddress" type='text' name='city_address' id='city_address' class="form-control" placeholder="City Address" required>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12">
                                                                <div id='zip_code_error' class='error'>Please enter your zip code</div>
                                                                <input oninput="return this.value = '{{ $zipCode }}'" value="{{ $zipCode }}" type='text' name='zip_code' id='zip_code' class="form-control" placeholder="Zip Code" required>
                                                            </div>
                                                        </div>
                                                        <div id='message_error' class='error'>Please enter your message.</div>
                                                        <div>
                                                            <textarea wire:model.lazy="message" style="height: 110px" name='message' id='message' class="form-control" placeholder="Tell us something about your project"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
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
                                        <a href="javascript:;" class="btn-line-black">Submit</a>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Consultation</h2>

                                    </div>
{{--                                    <a href="javascript:;" class="previous btn-line-black">Previous Step</a>--}}
{{--                                    <a href="javascript:;" class="next btn-line-black">Next Step</a>--}}
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Design</h2>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Design Presentation</h2>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Sold Project</h2> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                        </div> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5>You Have Successfully Signed Up</h5>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="maintenance-inquiry-form" class="{{ ($typeOfInquiry === 'maintenance-and-turf-care') ? '' : 'hidden'}}">
                <div class="progress-steps mt-3">
                    <div class="row">
                        <div style="text-align-last: center">
                            <h2><strong>Maintenance and Turf Care</strong></h2>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        </div>
                        <div class="col-md-12 mx-0">
                            <form name="contactForm" id='contact_form' action="javascript:void(0);" autocomplete="off" class="progress-steps-form">
                                <!-- progressbar -->
                                <ul class="progress-bar-line l-4">
                                    <li class="active contact-us"><strong>Contact Us</strong></li>
                                    <li class="consultation"><strong>Consultation</strong></li>
                                    <li class="signing"><strong>Contract Signing</strong></li>
                                    <li class="maintenance-service"><strong>Maintenance Service</strong></li>
                                </ul> <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Contact Us</h2>
                                        <br/>
                                        <p wire:loading wire:target="validateEmailInStreak"><i class="loader-inline"></i> Validating your email, Please wait...</p>

                                        {{ json_encode($streakApiResult) }}
                                        <div class="row">
                                            <div class="col-lg-8 col-md-12">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <div>
                                                            <input wire:model="emailAddress" type='email' name='Email' id='email' class="form-control" placeholder="Email" required/>
                                                        </div>
                                                        <div>
                                                            <input wire:model.lazy="phoneNo" type='text' name='phone' id='phone' class="form-control" placeholder="Phone" required>
                                                        </div>
                                                        <div>
                                                            <input wire:model.lazy="firstName" type='text' name='first_name' id='first_name' class="form-control" placeholder="First Name" required>
                                                        </div>
                                                        <div>
                                                            <input wire:model.lazy="lastName" type='text' name='last_name' id='last_name' class="form-control" placeholder="Last Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div id='home_address_error' class='error'>Please enter your home address.</div>
                                                        <div>
                                                            <input wire:model.lazy="homeAddress" type='text' name='home_address' id='home_address_maintenance' class="form-control" placeholder="Home Address" required>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-12">
                                                                <div id='city_address_error' class='error'>Please enter your city address.</div>
                                                                <input wire:model.lazy="cityAddress" type='text' name='city_address' id='city_address' class="form-control" placeholder="City Address" required>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12">
                                                                <div id='zip_code_error' class='error'>Please enter your zip code</div>
                                                                <input oninput="return this.value = '{{ $zipCode }}'" value="{{ $zipCode }}" type='text' name='zip_code' id='zip_code' class="form-control" placeholder="Zip Code" required>
                                                            </div>
                                                        </div>
                                                        <div id='message_error' class='error'>Please enter your message.</div>
                                                        <div>
                                                            <textarea wire:model.lazy="message" style="height: 110px" name='message' id='message' class="form-control" placeholder="Tell us something about your project"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
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
                                        <a href="javascript:;" class="btn-line-black">Submit</a>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Consultation</h2>

                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Contract Signing</h2>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Maintenance Service</h2> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                        </div> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5>You Have Successfully Signed Up</h5>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section close -->
    @section('extra-js')
        <script src="{{ url('js/google-api/maps.js') }}"></script>
        <script>
            initAutocomplete('#home_address_landscape');
            initAutocomplete('#home_address_maintenance');
            /**
             * Initialized Auto Complete Places Google API
             */
            function initAutocomplete(sQuery) {
                let oAddressField = document.querySelector(sQuery);
                let oAutocomplete = new google.maps.places.Autocomplete(oAddressField, {
                    componentRestrictions: {country: ['us', 'ca', 'ga', 'ph']},
                    fields: ['address_components', 'geometry'],
                    types: ['address'],
                });

                oAutocomplete.addListener('place_changed', function () {
                    fillInAddress(oAutocomplete);
                });
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
            function fillInAddress(oAutocomplete) {
                const oPlace = oAutocomplete.getPlace();
                if (oPlace === undefined) return false;
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
                        'You may check the status of your application status here: <a href="javascript:"> Application Status.</a>',
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

        <script>
            let current_fs, next_fs, previous_fs;
            let opacity;

            $(".next").click(function () {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();
                $(".progress-bar-line li").eq($("fieldset").index(next_fs)).addClass("active");

                next_fs.show();
                current_fs.animate({opacity: 0}, {
                    step: function (now) {
                        opacity = 1 - now;
                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({'opacity': opacity});
                    },
                    duration: 600
                });
            });

            $(".previous").click(function () {
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();
                $(".progress-bar-line li").eq($("fieldset").index(current_fs)).removeClass("active");
                previous_fs.show();
                current_fs.animate({opacity: 0}, {
                    step: function (now) {
                        opacity = 1 - now;
                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({'opacity': opacity});
                    },
                    duration: 600
                });
            });

            $('.radio-group .radio').click(function () {
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });
            $('[id=email]').donetyping(function() {
                @this.call('validateEmailInStreak');
            });
        </script>
    @endsection
</div>

