<div>
    <!-- section begin -->
    <section aria-label="section">
        <div class="container">
            <div>
                <div class="mt-3">
                    <strong>Select Type Process</strong>
                    <div class="de_form de_radio">
                        <span class="mr20"> <input wire:model="typeOfInquiry" id="landscaping-label" name="typeOfInquiry" type="radio" value="landscape" checked="checked"> <label wire:click="clearProcessForm" for="landscaping-label">Landscape and Design Project</label></span>
                        <span class="mr20"><input wire:model="typeOfInquiry" id="turf-label" name="typeOfInquiry" type="radio" value="maintenance-and-turf-care"> <label wire:click="clearProcessForm" for="turf-label">Maintenance and Turf Care</label> </span>
                    </div>
                </div>
            </div>
            <div id="landscape-form" aria-label="landscaping-inquiry-form" class="{{ ($typeOfInquiry === 'landscape') ? '' : 'hidden'}}">
                <div class="progress-steps mt-3">
                    <div class="row">
                        <div style="text-align-last: center">
                            <h2><strong>Landscape and Design Project</strong></h2>
                            <p>
                                To check the status of your existing application, please enter the email address you used to create and verify your application. If you want to start your process with Michaelangelo's, submit your inquiry to our <a href="/contact-us">Contact Us Form</a>.
                            </p>
                        </div>
                        <div class="col-md-12 mx-0">
                            <form name="contactForm" id='contact_form' action="javascript:void(0);" autocomplete="off" class="progress-steps-form">
                                <!-- progressbar -->
                                <ul class="progress-bar-line l-5">
                                    <li class="active spinner"><strong>Project Status</strong></li>
                                    <li class="process-5002 process-5004 process-5018 consultation"><strong>Consultation</strong></li>
                                    <li class="process-5003 process-5019 process-5021 design"><strong>Design</strong></li>
                                    <li class="process-5005 signing"><strong>Contract Signing</strong></li>
                                    <li class="process-5010 sold"><strong>Sold Project</strong></li>
                                </ul> <!-- fieldsets -->
                                <fieldset class="process-default">
                                    <div class="form-card">
                                        <h2 class="fs-title">Project Status </h2>
                                        <div class="row" style="color: var(--primary-color-1)">
                                            <div class="col-lg-6 col-md-12">
                                                <div>
                                                    <h3>Email Address</h3>
                                                    <div style="display: {{ $errors->has('emailAddress') ? 'block' : 'none' }}" class='error'>Please enter your valid E-mail ID.</div>
                                                    <input wire:model="emailAddress" type='email' name='Email' id='email' class="form-control" placeholder="Email" required/>
                                                </div>
                                                <p wire:loading wire:target="validateEmailInStreak"><i class="loader-inline"></i> Validating your email, Please wait...</p>
                                                @if(($streakApiResult['status'] ?? 500) === 200 && intval($currentStage) === 5001 && $isProcessed === true)
                                                    <div>
                                                        <strong>Thank you for reaching out to us, one of our representatives will reach out to you within 24-48 hours, please keep your lines open.</strong>
                                                    </div>
                                                @elseif($isProcessed === true && intval($currentStage) === 5017)
                                                    <div>
                                                        <strong>Hi, We noticed that you haven’t responded to us since {{ $sDateContacted }}. </strong>
                                                        <br/>
                                                        <strong>To resume your process, please contact us.</strong>
                                                        <br/>
                                                        <br/>
                                                        <a href="/contact-us?email={{ $emailAddress }}" class="btn-line-black mt-3 ">Redirect to Contact Us Form</a>
                                                        <br/>
                                                        <br/>
                                                    </div>
                                                @elseif(($streakApiResult['status'] ?? 500) === 200 && $isProcessed === true)
                                                    <div>
                                                        <strong>We have updates in your current inquiry, you want to check it?</strong>
                                                        <br/>
                                                        <br/>
                                                            <a href="javascript:;" wire:click="processValidation" class="btn-line-black mt-3 ">Check current status</a>
                                                        <br/>
                                                        <br/>
                                                    </div>
                                                @elseif($isProcessed === true)
                                                    <div>
                                                        <strong>Thank you for reaching out to us, to start your process, please fill out <a href="/contact-us">Contact Us Form</a></strong>
                                                        <br/>
                                                        <br/>
                                                        <a href="/contact-us" class="btn-line-black mt-3 ">Redirect to Contact Us Form</a>
                                                        <br/>
                                                        <br/>
                                                    </div>
                                                @endif
                                            </div>
                                            <div id="sidebar" class="col-md-6">
                                                <div class="widget widget_text">
                                                    <h3>Contact Info</h3>
                                                    <address>
                                                        <span>2204 Justin Trail Suite 1 Alpharetta, GA 30004</span>
                                                        <span><strong>Phone:</strong>{{ env('WEBSITE_PHONE_NO', '(770) 209-2344)') }}   </span>
                                                        <span><strong>Email:</strong><a href="mailto:info@landscapesandmore.com">info@landscapesandmore.com</a></span>
                                                        <span><strong>Web:</strong><a href="https://landscapesandmore.com/">https://landscapesandmore.com</a></span>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="process-5002 process-5018">
                                    <div class="form-card">
                                        <h2 class="fs-title">Consultation</h2>
                                        <div class="row" style="color: var(--primary-color-1)">
                                            <div class="col-lg-6 col-md-12">
                                                @if($currentStage === 5002)
                                                    <strong>
                                                        We have sent your Zoom link to your email address.
                                                        Your consultation date is on:
                                                        {{ $sConsultationDate }}
                                                    </strong>
                                                @else
                                                    <strong>
                                                        Hi, We noticed that you haven’t responded to us since {{ $sConsultationDate }} . To resume your process, <a style="cursor: pointer" onclick="Tawk_API.toggle()" class="">please contact us</a>.
                                                    </strong>
                                                @endif
                                            </div>
                                            <div id="sidebar" class="col-md-6">
                                                <div class="widget widget_text">
                                                    <h3>Contact Info</h3>
                                                    <address>
                                                        <span>2204 Justin Trail Suite 1 Alpharetta, GA 30004</span>
                                                        <span><strong>Phone:</strong>{{ env('WEBSITE_PHONE_NO', '(770) 209-2344)') }}   </span>
                                                        <span><strong>Email:</strong><a href="mailto:info@landscapesandmore.com">info@landscapesandmore.com</a></span>
                                                        <span><strong>Web:</strong><a href="https://landscapesandmore.com/">https://landscapesandmore.com</a></span>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
{{--                                    <a href="javascript:;" class="previous btn-line-black">Previous Step</a>--}}
{{--                                    <a href="javascript:;" class="next btn-line-black">Next Step</a>--}}
                                </fieldset>
                                <fieldset class="process-5003 process-5019 process-5021">
                                    <div class="form-card">
                                        <h2 class="fs-title">Design</h2>
                                        <div class="row" style="color: var(--primary-color-1)">
                                            <div class="col-lg-6 col-md-12">
                                                @if($currentStage === 5003)
                                                    <strong>
                                                        Your architect will contact you for your design appointment date on {{ $sDesignAppointmentDate }}. <br/>We will also send updates for your design appointment.
                                                    </strong>
                                                @else
                                                    <strong>
                                                        Hi, We noticed that you haven’t responded to us since {{ $sDesignAppointmentDate }} . To resume your process, <a style="cursor: pointer" onclick="Tawk_API.toggle()" class="">please contact us</a>.
                                                    </strong>
                                                @endif
                                            </div>
                                            <div id="sidebar" class="col-md-6">
                                                <div class="widget widget_text">
                                                    <h3>Contact Info</h3>
                                                    <address>
                                                        <span>2204 Justin Trail Suite 1 Alpharetta, GA 30004</span>
                                                        <span><strong>Phone:</strong>{{ env('WEBSITE_PHONE_NO', '(770) 209-2344)') }}   </span>
                                                        <span><strong>Email:</strong><a href="mailto:info@landscapesandmore.com">info@landscapesandmore.com</a></span>
                                                        <span><strong>Web:</strong><a href="https://landscapesandmore.com/">https://landscapesandmore.com</a></span>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="process-5004">
                                    <div class="form-card">
                                        <h2 class="fs-title">Estimating </h2>
                                        <div class="row" style="color: var(--primary-color-1)">
                                            <div class="col-lg-6 col-md-12">
                                                <strong>
                                                    We are in the process of creating the estimate of your project, one of our representatives will contact you for an update. <br/>
                                                    Your estimated design presentation date is on: {{ $sDesignPresentationDate }}
                                                </strong>
                                            </div>
                                            <div id="sidebar" class="col-md-6">
                                                <div class="widget widget_text">
                                                    <h3>Contact Info</h3>
                                                    <address>
                                                        <span>2204 Justin Trail Suite 1 Alpharetta, GA 30004</span>
                                                        <span><strong>Phone:</strong>{{ env('WEBSITE_PHONE_NO', '(770) 209-2344)') }}   </span>
                                                        <span><strong>Email:</strong><a href="mailto:info@landscapesandmore.com">info@landscapesandmore.com</a></span>
                                                        <span><strong>Web:</strong><a href="https://landscapesandmore.com/">https://landscapesandmore.com</a></span>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="process-5005">
                                    <div class="form-card">
                                        <h2 class="fs-title">Contract Signing</h2><div class="row" style="color: var(--primary-color-1)">
                                            <div class="col-lg-6 col-md-12">
                                                <strong>We have sent your contract to your email address, please open and sign using your device.  </strong>
                                            </div>
                                            <div id="sidebar" class="col-md-6">
                                                <div class="widget widget_text">
                                                    <h3>Contact Info</h3>
                                                    <address>
                                                        <span>2204 Justin Trail Suite 1 Alpharetta, GA 30004</span>
                                                        <span><strong>Phone:</strong>{{ env('WEBSITE_PHONE_NO', '(770) 209-2344)') }}   </span>
                                                        <span><strong>Email:</strong><a href="mailto:info@landscapesandmore.com">info@landscapesandmore.com</a></span>
                                                        <span><strong>Web:</strong><a href="https://landscapesandmore.com/">https://landscapesandmore.com</a></span>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="process-5010">
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Sold Project</h2> <br><br>
                                        <div class="row" style="color: var(--primary-color-1)">
                                            <div class="col-lg-6 col-md-12" style="text-align-last: center;">
                                                <i class="fa fa-file-invoice-dollar" aria-hidden="true" style="color: var(--primary-color-1);font-size: 75px;margin-bottom: 20px;"></i>
                                                <br>
                                                <strong>Congratulations! Your project is underway. One of our representatives will reach out to you via email for your project updates. </strong>
                                            </div>
                                            <div id="sidebar" class="col-md-6">
                                                <div class="widget widget_text">
                                                    <h3>Contact Info</h3>
                                                    <address>
                                                        <span>2204 Justin Trail Suite 1 Alpharetta, GA 30004</span>
                                                        <span><strong>Phone:</strong>{{ env('WEBSITE_PHONE_NO', '(770) 209-2344)') }}   </span>
                                                        <span><strong>Email:</strong><a href="mailto:info@landscapesandmore.com">info@landscapesandmore.com</a></span>
                                                        <span><strong>Web:</strong><a href="https://landscapesandmore.com/">https://landscapesandmore.com</a></span>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="maintenance-and-turf-care-form" class="{{ ($typeOfInquiry === 'maintenance-and-turf-care') ? '' : 'hidden'}}">
                <div class="progress-steps mt-3">
                    <div class="row">
                        <div style="text-align-last: center">
                            <h2><strong>Maintenance and Turf Care</strong></h2>
                            <p>
                                To check the status of your existing application, please enter the email address you used to create and verify your application. If you want to start your process with Michaelangelo's, submit your inquiry to our <a href="/contact-us">Contact Us form</a>.
                            </p>
                        </div>
                        <div class="col-md-12 mx-0">
                            <form name="contactForm" id='contact_form' action="javascript:void(0);" autocomplete="off" class="progress-steps-form">
                                <!-- progressbar -->
                                <ul class="progress-bar-line l-4">
                                    <li class="active spinner"><strong>Project Status</strong></li>
                                    <li class="process-5002 process-5011 consultation"><strong>Consultation</strong></li>
                                    <li class="process-5004 signing"><strong>Contract Signing</strong></li>
                                    <li class="process-5006 maintenance-service"><strong>Maintenance Service</strong></li>
                                </ul> <!-- fieldsets -->
                                <fieldset class="process-default">
                                    <div class="form-card">
                                        <h2 class="fs-title">Project Status </h2>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div>
                                                    <h3>Email Address</h3>
                                                    <div style="display: {{ $errors->has('emailAddress') ? 'block' : 'none' }}" class='error'>Please enter your valid E-mail ID.</div>
                                                    <input wire:model="emailAddress" type='email' name='Email' id='email' class="form-control" placeholder="Email" required/>
                                                </div>
                                                @if(($streakApiResult['status'] ?? 500) === 200 && $isProcessed === true)
                                                    <div>
                                                        <strong>We have updates in your current inquiry, you want to check it?</strong>
                                                        <br/>
                                                        <br/>
                                                        <a href="javascript:;" wire:click="processValidation" class="btn-line-black mt-3 ">Check current status</a>
                                                        <br/>
                                                        <br/>
                                                    </div>
                                                @elseif($isProcessed === true)
                                                    <div>
                                                        <strong>Thank you for reaching out to us, to start your process, please fill out <a href="/contact-us">Contact Us Form</a></strong>
                                                        <br/>
                                                        <br/>
                                                        <a href="/contact-us" class="btn-line-black mt-3 ">Redirect to Contact Us Form</a>
                                                        <br/>
                                                        <br/>
                                                    </div>
                                                @endif
                                                <p wire:loading wire:target="validateEmailInStreak"><i class="loader-inline"></i> Validating your email, Please wait...</p>
                                            </div>
                                            <div id="sidebar" class="col-md-6">
                                                <div class="widget widget_text">
                                                    <h3>Contact Info</h3>
                                                    <address>
                                                        <span>2204 Justin Trail Suite 1 Alpharetta, GA 30004</span>
                                                        <span><strong>Phone:</strong>{{ env('WEBSITE_PHONE_NO', '(770) 209-2344)') }}   </span>
                                                        <span><strong>Email:</strong><a href="mailto:info@landscapesandmore.com">info@landscapesandmore.com</a></span>
                                                        <span><strong>Web:</strong><a href="https://landscapesandmore.com/">https://landscapesandmore.com</a></span>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="process-5002">
                                    <div class="form-card">
                                        <h2 class="fs-title">Consultation</h2>
                                        <div class="row" style="color: var(--primary-color-1)">
                                            <div class="col-lg-6 col-md-12">
                                                <strong>We have sent your Zoom link to your email address.
                                                    Your consultation date is on:
                                                    {{ $sConsultationDate }}</strong>
                                            </div>
                                            <div id="sidebar" class="col-md-6">
                                                <div class="widget widget_text">
                                                    <h3>Contact Info</h3>
                                                    <address>
                                                        <span>2204 Justin Trail Suite 1 Alpharetta, GA 30004</span>
                                                        <span><strong>Phone:</strong>{{ env('WEBSITE_PHONE_NO', '(770) 209-2344)') }}   </span>
                                                        <span><strong>Email:</strong><a href="mailto:info@landscapesandmore.com">info@landscapesandmore.com</a></span>
                                                        <span><strong>Web:</strong><a href="https://landscapesandmore.com/">https://landscapesandmore.com</a></span>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="process-5011">
                                    <div class="form-card">
                                        <h2 class="fs-title">Opportunity</h2>
                                        <div class="row" style="color: var(--primary-color-1)">
                                            <div class="col-lg-6 col-md-12">
                                                <strong>We have sent your Zoom link to your email address.
                                                    Your consultation date is on:
                                                    {{ $sConsultationDate }}</strong>
                                            </div>
                                            <div id="sidebar" class="col-md-6">
                                                <div class="widget widget_text">
                                                    <h3>Contact Info</h3>
                                                    <address>
                                                        <span>2204 Justin Trail Suite 1 Alpharetta, GA 30004</span>
                                                        <span><strong>Phone:</strong>{{ env('WEBSITE_PHONE_NO', '(770) 209-2344)') }}   </span>
                                                        <span><strong>Email:</strong><a href="mailto:info@landscapesandmore.com">info@landscapesandmore.com</a></span>
                                                        <span><strong>Web:</strong><a href="https://landscapesandmore.com/">https://landscapesandmore.com</a></span>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="process-5004">
                                    <div class="form-card">
                                        <h2 class="fs-title">Contract Signing</h2>
                                        <div class="row" style="color: var(--primary-color-1)">
                                            <div class="col-lg-6 col-md-12">
                                                <strong>We have sent your contract to your email address, please open and sign using your device. </strong>
                                            </div>
                                            <div id="sidebar" class="col-md-6">
                                                <div class="widget widget_text">
                                                    <h3>Contact Info</h3>
                                                    <address>
                                                        <span>2204 Justin Trail Suite 1 Alpharetta, GA 30004</span>
                                                        <span><strong>Phone:</strong>{{ env('WEBSITE_PHONE_NO', '(770) 209-2344)') }}   </span>
                                                        <span><strong>Email:</strong><a href="mailto:info@landscapesandmore.com">info@landscapesandmore.com</a></span>
                                                        <span><strong>Web:</strong><a href="https://landscapesandmore.com/">https://landscapesandmore.com</a></span>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="process-5006">
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Maintenance Service</h2> <br><br>
                                        <div class="row" style="color: var(--primary-color-1)">
                                            <div class="col-lg-6 col-md-12" style="text-align-last: center;">
                                                <i class="fa fa-file-invoice-dollar" aria-hidden="true" style="color: var(--primary-color-1);font-size: 75px;margin-bottom: 20px;"></i>
                                                <br>
                                                <strong> Congratulations! Your maintenance service is underway. One of our representatives will reach out to you via email for your project updates.  </strong>
                                            </div>
                                            <div id="sidebar" class="col-md-6">
                                                <div class="widget widget_text">
                                                    <h3>Contact Info</h3>
                                                    <address>
                                                        <span>2204 Justin Trail Suite 1 Alpharetta, GA 30004</span>
                                                        <span><strong>Phone:</strong>{{ env('WEBSITE_PHONE_NO', '(770) 209-2344)') }}   </span>
                                                        <span><strong>Email:</strong><a href="mailto:info@landscapesandmore.com">info@landscapesandmore.com</a></span>
                                                        <span><strong>Web:</strong><a href="https://landscapesandmore.com/">https://landscapesandmore.com</a></span>
                                                    </address>
                                                </div>
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
        <script>
            window.livewire.on('processCurrentStage', function (sClass, sClassification) {
                let oCurrentStage = $(sClassification).find('li' + sClass);
                let oCurrentSection = $(sClassification).find('fieldset' + sClass).show();
                oCurrentStage.addClass('active').prevAll('li').addClass('active');
                oCurrentSection.siblings('fieldset').hide();
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

