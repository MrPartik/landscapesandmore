<div>

    <!-- section begin -->
    <section aria-label="section">
        <div class="container">
            <div>
                <div class="mt-3">
                    <strong>Select Type Inquiry</strong>
                    <div class="de_form de_radio">
                        <span class="mr20"> <input wire:model.lazy="typeOfInquiry" id="landscaping-label" name="typeOfInquiry" type="radio" value="landscape" checked="checked"> <label for="landscaping-label">Landscape</label></span>
                        <span class="mr20"><input wire:model.lazy="typeOfInquiry" id="turf-label" name="typeOfInquiry" type="radio" value="maintenance-and-turf-care"> <label for="turf-label">Maintenance and Turf Care</label> </span>
                    </div>
                </div>
            </div>
            <div id="landscaping-inquiry-form" class="{{ ($typeOfInquiry === 'landscape') ? '' : 'hidden'}}">
                <div class="progress-steps mt-3">
                    <div class="row">
                        <div style="text-align-last: center">
                            <h2><strong>Install Landscape and Design</strong></h2>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        </div>
                        <div class="col-md-12 mx-0">
                            <form class="progress-steps-form">
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
                                        <h2 class="fs-title">Contact Us</h2>
                                    </div>
                                    <a href="javascript:;" class="next btn-line-black">Next Step</a>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Consultation</h2>

                                    </div>

                                    <a href="javascript:;" class="previous btn-line-black">Previous Step</a>
                                    <a href="javascript:;" class="next btn-line-black">Next Step</a>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Design</h2>
                                    </div>
                                    <a href="javascript:;" class="previous btn-line-black">Previous Step</a>
                                    <a href="javascript:;" class="next btn-line-black">Next Step</a>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Design Presentation</h2>
                                    </div>
                                    <a href="javascript:;" class="previous btn-line-black">Previous Step</a>
                                    <a href="javascript:;" class="next btn-line-black">Next Step</a>
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
                            <form class="progress-steps-form">
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
                                    </div>
                                    <a href="javascript:;" class="next btn-line-black">Next Step</a>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Consultation</h2>

                                    </div>

                                    <a href="javascript:;" class="previous btn-line-black">Previous Step</a>
                                    <a href="javascript:;" class="next btn-line-black">Next Step</a>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Contract Signing</h2>
                                    </div>
                                    <a href="javascript:;" class="previous btn-line-black">Previous Step</a>
                                    <a href="javascript:;" class="next btn-line-black">Next Step</a>
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
    <script>
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;

        $(".next").click(function(){

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
//Add Class Active
            $(".progress-bar-line li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
            next_fs.show();
//hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now) {
// for making fielset appear animation
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

        $(".previous").click(function(){

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

//Remove class active
            $(".progress-bar-line li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
            previous_fs.show();

//hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now) {
// for making fielset appear animation
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

        $('.radio-group .radio').click(function(){
            $(this).parent().find('.radio').removeClass('selected');
            $(this).addClass('selected');
        });

        $(".submit").click(function(){
            return false;
        })

    </script>
</div>

