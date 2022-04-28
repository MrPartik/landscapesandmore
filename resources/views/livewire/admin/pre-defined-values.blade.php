<div class="row my-5">
    <div class="loading-page" wire:loading.block wire:target="saveStreak, saveContactUs">Loading&#8230;</div>
    <div class="col-12">
        <div class="card shadow bg-light">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                <div class="row justify-content-end">
                    <div class="mt-3 col-12" x-data="{}">
                        <h2> {{ __('Contact Us')  }}</h2>
                        <p>{{ __('Modify default prices in contact us page') }}</p>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-2">
                                    <label class="col-form-label" for="min-price-landscape">
                                        Minimum Price for Landscape Design and Installation
                                    </label>
                                    <x-jet-input id="min-price-landscape" wire:model="minLandscape" type="text" class="form-control" placeholder="{{ __('Minimum Price for Landscape Design and Installation ') }}"/>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-2">
                                    <label class="col-form-label" for="min-price-maintenance">
                                        Minimum Price for Weekly Maintenance Service
                                    </label>
                                    <x-jet-input id="min-price-maintenance" wire:model="minMaintenance" type="text" class="form-control" placeholder="{{ __('Minimum Price for Weekly Maintenance Service') }}"/>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-2">
                                    <label class="col-form-label" for="min-price-turf">
                                        Minimum Price for Turf Care
                                    </label>
                                    <x-jet-input id="min-price-turf" wire:model="minTurf" type="text" class="form-control" placeholder="{{ __('Minimum Price for Turf Care') }}"/>
                                </div>
                            </div>
                        </div>
                        <button wire:click="saveContactUs()" class="mt-4 btn btn-success text-white"><span class="fa fa-save"></span> Save </button>
                    </div>
                    <hr class="mt-3"/>
                    <div class="mt-3 col-12" x-data="{}">
                        <h2> {{ __('Streak API')  }}</h2>
                        <p>{{ __('Modify streak api values for warranty, contact us pages') }}</p>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-2">
                                    <label class="col-form-label" for="pipeline-key-landscape">
                                        Pipeline Key for Landscape Design and Installation
                                    </label>
                                    <textarea rows="4" id="pipeline-key-landscape" wire:model="pipelineKeyLandscape" type="text" class="form-control" placeholder="{{ __('Pipeline Key for Landscape Design and Installation ') }}"> </textarea>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-2">
                                    <label class="col-form-label" for="pipeline-key-maintenance">
                                        Pipeline Key for Weekly Maintenance Service
                                    </label>
                                    <textarea rows="4" id="pipeline-key-maintenance" wire:model="pipelineKeyMaintenance" type="text" class="form-control" placeholder="{{ __('Pipeline Key for Weekly Maintenance Service') }}"> </textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-2">
                                    <label class="col-form-label" for="pipeline-key-turf">
                                        Pipeline Key for Warranty Claim
                                    </label>
                                    <textarea rows="4" id="pipeline-key-turf" wire:model="pipelineKeyWarranty" type="text" class="form-control" placeholder="{{ __('Pipeline Key for Warranty Claim') }}"> </textarea>
                                </div>
                            </div>
                        </div>
                        <button wire:click="saveStreak()" class="mt-4 btn btn-success text-white"><span class="fa fa-save"></span> Save </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
