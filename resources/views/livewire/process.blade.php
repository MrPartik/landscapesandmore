
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
            <div class="mt-3">
                <strong>Do you have existing inquiry in our process?</strong>
                <div class="de_form de_radio">
                    <span class="mr20"> <input wire:model.lazy="isExistingUser" id="existing-yes" name="isExistingUser" type="radio" value="yes" checked="checked"> <label for="existing-yes">Yes</label></span>
                    <span class="mr20"><input wire:model.lazy="isExistingUser" id="existing-no" name="isExistingUser" type="radio" value="no"> <label for="existing-no">No</label> </span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section close -->
