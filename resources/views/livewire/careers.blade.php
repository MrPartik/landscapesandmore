<div class="container">
    <div class="row">
        <div class="col-md-8">
            <form name="contactForm" id='contact_form' action="javascript:void(0);" autocomplete="off">
                <div class="row">
                    <div class="col-md-12 mb10">
                        <h3>Send Us Message</h3>
                        <p></p>
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
                            <input wire:model.lazy="homeAddress" type='text' name='home_address' id='home_address' class="form-control" placeholder="Home Address" required></input>
                        </div>
                        <div id='driver_license_error' class='error'>Please enter your driver license.</div>
                        <div>
                            <input wire:model.lazy="driverLicense" type='text' name='driver_license' id='driver_license' class="form-control" placeholder="Driver License"></input>
                        </div>
                    </div>
                    <div class="col-md-12">

                        <strong class="mt-3">Position Applying for</strong>
                        <div class="de_form de_checkbox">
                            @foreach(explode(',', env('CAREERS_AVAILABLE_POSITION', '')) ?? [] as $iKey => $sPosition )
                                <span class="mb20">
                                    <input wire:model="careersPosition" name="career_position" id="position_{{ $iKey }}" type="radio" value="{{ $sPosition }}" >
                                <label for="position_{{ $iKey }}" style="margin-bottom: 10px;">{{ $sPosition }}</label>
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
