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
        <script>

            function successWarrantySubmission() {
                Swal.fire({
                    icon: 'success',
                    html: 'Thank you for your interest in applying at Michaelangelo’s. Our HR team will reach out to you soon.',
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
