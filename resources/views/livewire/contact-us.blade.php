<div class="container">
    <div class="row">
        <div class="col-md-8">
            <form name="contactForm" id='contact_form' action="javascript:void(0);" autocomplete="off">
                <div class="row">
                    <div class="col-md-12 mb10">
                        <h3>Send Us Message</h3>
                        <p>We have a minimum project for landscape design and installation projects that starts at $20,000. <br/>
                            We have a minimum weekly maintenance service that starts at $450.00 <br/>
                            Turf Care has a minimum of $50.00</p>
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
                                <input wire:model.lazy="zipCode" type='text' name='zip_code' id='zip_code' class="form-control" placeholder="Zip Code" required>
                            </div>
                        </div>
                        <div id='message_error' class='error'>Please enter your message.</div>
                        <div>
                            <textarea wire:model.lazy="message" style="height: 110px" name='message' id='message' class="form-control" placeholder="Your Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <strong>Project Description</strong>
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
                        <div class="g-recaptcha" data-sitekey="6LfHDjsdAAAAANyZQJeyAUNIjTPCB-5PodXpdloe"></div>
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
        <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNB_ctjnT8IlQWxuGF-S56hhhtML9dlPE&callback=initAutocomplete&libraries=places&v=weekly"></script>
        <script>
            let autocomplete;
            let address1Field;
            let address2Field;
            let postalField;

            function initAutocomplete() {
                address1Field = document.querySelector("#home_address");
                address2Field = document.querySelector("#city_address");
                postalField = document.querySelector("#zip_code");
                // Create the autocomplete object, restricting the search predictions to
                // addresses in the US and Canada.
                autocomplete = new google.maps.places.Autocomplete(address1Field, {
                    componentRestrictions: { country: ["us", "ca", "ga", "ph"] },
                    fields: ["address_components", "geometry"],
                    types: ["address"],
                });
                address1Field.focus();
                // When the user selects an address from the drop-down, populate the
                // address fields in the form.
                autocomplete.addListener("place_changed", fillInAddress);
            }

            function fillInAddress() {
                // Get the place details from the autocomplete object.
                const place = autocomplete.getPlace();
                let address1 = "";
                let postcode = "";

                // Get each component of the address from the place details,
                // and then fill-in the corresponding field on the form.
                // place.address_components are google.maps.GeocoderAddressComponent objects
                // which are documented at http://goo.gle/3l5i5Mr
                console.log(place.address_components);
                for (const component of place.address_components) {
                    const componentType = component.types[0];
                    switch (componentType) {
                        case "street_number": {
                            address1 = `${component.long_name} ${address1}`;
                            break;
                        }

                        case "route": {
                            address1 += component.short_name;
                            break;
                        }

                        case "postal_code": {
                            postcode = `${component.long_name}${postcode}`;
                            break;
                        }
                    }
                }

                address1Field.value = address1;
                postalField.value = postcode;
                // After filling the form with address components from the Autocomplete
                // prediction, set cursor focus on the second address line to encourage
                // entry of subpremise information such as apartment, unit, or floor number.
                address2Field.focus();
            }
        </script>
        <script>
            function successContactUsSubmission() {
                Swal.fire({
                    icon: 'success',
                    html: 'Thank you for contacting us, one of our representatives will call you to discuss your project further. <br/>' +
                        'Please allow us 24-48hrs to review your information. <br/>' +
                        'You may check the status of your application status here: <a href="javascript:"> Application Status.</a>',
                    showCancelButton: false,
                    showConfirmButton: false,
                    showCloseButton: true,
                    allowOutsideClick: false,
                })
            }

            window.livewire.on('contact-us-success', function(oResult) {
                successContactUsSubmission();
                $('#contact_form').find('input, textarea').not('[type=submit]').val('');
            });
        </script>
    @endsection
</div>
