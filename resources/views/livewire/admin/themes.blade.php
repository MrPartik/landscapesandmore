<div class="row my-3">
    <style>
        .mr-1 {
            margin-right: 10px;
        }
        .font-weight-bold {
            font-weight: bold;
        }
        .row-logo-manager {
            border: 1px solid gray;
            border-radius: 10px;
            padding: 10px;
            text-align-last: center;
        }
    </style>
    <div class="loading-page" wire:loading.block wire:target="uploadSmallLogo, uploadLightLogo, saveLogo, deleteLogo, uploadDarkLogo, bannerImage, saveBanner">Loading&#8230;</div>
    <div class="col-12">
        <div class="card shadow bg-light">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                <div class="row justify-content-end">
                    <div class="mt-3 col-12" x-data="{}">
                        <h2> {{ __('Homepage')  }}</h2>
                        <p>{{ __('Customize some fields in homepage.') }}</p>
                        <div class="row mb-4">
                            <div class="col-4">
                                <label class="font-weight-bold">Banner Description</label>
                                <br/>
                                <span>Add carousel description in homepage banner, (should be separated with comma (,))</span>
                                <br/>
                                <br/>
                                <textarea class="form-control mb-2" rows="10" wire:model="bannerDescription"></textarea>
                                <button wire:click="saveBanner('description')" class="btn btn-success text-white"><i class="fa fa-save"></i> Save</button>
                            </div>
                            <div class="col-8"  >
                                <label class="font-weight-bold">Banner Image</label>
                                <br/>
                                <span>Change the homepage banner image</span>
                                <br/>
                                <br/>
                                <br/>
                                <img  class="mb-2" style="border-radius: 10px;border: 1px dashed; max-width: 100%;" src="{{ url((is_object($bannerImage) ? $bannerImage->temporaryUrl() : env('BANNER_IMAGE_URL', '/img/landscapes/frontyard.png'))) }}"/>
                                <br/>
                                <input id="uploadBannerImage" style="display: none" wire:model="bannerImage" type="file" accept="image/*"/>
                                <button onclick="$('#uploadBannerImage').click()" class="btn btn-primary text-white">
                                    <span class="fa fa-file"> </span> Upload Image
                                </button>
                                <p>Max. file size: 10 MB.</p>
                                @if($bannerImage !== '')
                                    <button wire:click="saveBanner('image')" class="btn btn-success text-white"><i class="fa fa-save"></i> Save</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="mt-3 col-12" x-data="{}">
                        <h2> {{ __('Logo')  }}</h2>
                        <p>{{ __('Customize Logo that are being used in the website.') }}</p>
                        <div class="row" style="justify-content: center;">
                            <div class="row-logo-manager mr-1 col-lg-3 col-md-3 col-sm-12">
                                <div class="mb-2">
                                    <label class="col-form-label" for="">
                                        <label class="col-form-label font-weight-bold" for="">
                                            Small Logo
                                        </label>
                                        <div>
                                            <input id="uploadSmallLogo" style="display: none" wire:model="uploadSmallLogo" type="file" accept="image/*">
                                            <button onclick="$('#uploadSmallLogo').click()" class="btn btn-primary text-white">
                                                <span class="fa fa-file"> </span> Upload Image
                                            </button>
                                            <p>Max. file size: 10 MB.</p>
                                            @if($uploadSmallLogo !== '')
                                                <button wire:click="saveLogo('small')" class="btn btn-success text-white"><i class="fa fa-save"></i> Save</button>
                                            @endif
                                        </div>
                                    </label>
                                </div>
                                <div>
                                    <hr/>
                                    @foreach($this->aSmallLogo as $iKey => $aFileName)
                                        <div style="border: 1px dashed gray; padding: 10px; border-radius: 10px; margin-bottom: 5px">
                                            <br/>
                                            <a href="{{ url($aFileName['formatted']) }}" target="_blank"><img style="max-width: 100px;" class="logo" src="{{ url($aFileName['formatted']) }}" alt=""></a>
                                            <br/>
                                            <br/>
                                            @if(env('LOGO_SMALL_URL') !== $aFileName['formatted'])
                                                <button wire:click="useLogo({{ $iKey }}, 'small')" class="btn btn-success text-white"><i class="fa fa-check"></i></button>
                                            @else
                                                <p class="text-success font-weight-bold"> Current</p>
                                            @endif
                                            <button wire:click="deleteLogo({{ $iKey }}, 'small')" class="btn btn-danger text-white"><i class="fa fa-trash"></i></button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row-logo-manager mr-1 col-lg-4 col-md-4 col-sm-12" style="background: #474747;color: white;">
                                <div class="mb-2">
                                    <label class="col-form-label" for="">
                                        <label class="col-form-label font-weight-bold" for="">
                                            Light Logo
                                        </label>
                                        <div>
                                            <input id="uploadLightLogo" style="display: none" wire:model="uploadLightLogo" type="file" accept="image/*">
                                            <button onclick="$('#uploadLightLogo').click()" class="btn btn-primary text-white">
                                                <span class="fa fa-file"> </span> Upload Image
                                            </button>
                                            <p>Max. file size: 10 MB.</p>
                                            @if($uploadLightLogo !== '')
                                                <button wire:click="saveLogo('light')" class="btn btn-success text-white"><i class="fa fa-save"></i> Save</button>
                                            @endif
                                        </div>
                                    </label>
                                    <div>
                                        <hr/>
                                        @foreach($this->aLightLogo as $iKey => $aFileName)
                                            <div style="border: 1px dashed gray; padding: 10px; border-radius: 10px; margin-bottom: 5px">
                                                <br/>
                                                <a href="{{ url($aFileName['formatted']) }}" target="_blank"><img style="max-height: 50px;" class="logo" src="{{ url($aFileName['formatted']) }}" alt=""></a>
                                                <br/>
                                                <br/>
                                                @if(env('LOGO_LIGHT_URL') !== $aFileName['formatted'])
                                                    <button wire:click="useLogo({{ $iKey }}, 'light')" class="btn btn-success text-white"><i class="fa fa-check"></i></button>
                                                @else
                                                    <p class="text-success font-weight-bold"> Current</p>
                                                @endif
                                                <button wire:click="deleteLogo({{ $iKey }}, 'light')" class="btn btn-danger text-white"><i class="fa fa-trash"></i></button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row-logo-manager col-lg-4 col-md-4 col-sm-12">
                                <div class="mb-2">
                                    <label class="col-form-label" for="">
                                        <label class="col-form-label font-weight-bold" for="">
                                            Dark Logo
                                        </label>
                                        <div>
                                            <input id="uploadDarkLogo" style="display: none" wire:model="uploadDarkLogo" type="file" accept="image/*">
                                            <button onclick="$('#uploadDarkLogo').click()" class="btn btn-primary text-white">
                                                <span class="fa fa-file"> </span> Upload Image
                                            </button>
                                            <p>Max. file size: 10 MB.</p>
                                            @if($uploadDarkLogo !== '')
                                                <button wire:click="saveLogo('dark')" class="btn btn-success text-white"><i class="fa fa-save"></i> Save</button>
                                            @endif
                                        </div>
                                    </label>
                                    <div>
                                        <hr/>
                                        @foreach($this->aDarkLogo as $iKey => $aFileName)
                                            <div style="border: 1px dashed gray; padding: 10px; border-radius: 10px; margin-bottom: 5px">
                                                <br/>
                                                <a href="{{ url($aFileName['formatted']) }}" target="_blank"><img style="max-height: 50px;" class="logo" src="{{ url($aFileName['formatted']) }}" alt=""></a>
                                                <br/>
                                                <br/>
                                                @if(env('LOGO_DARK_URL') !== $aFileName['formatted'])
                                                    <button wire:click="useLogo({{ $iKey }}, 'dark')" class="btn btn-success text-white"><i class="fa fa-check"></i></button>
                                                @else
                                                    <p class="text-success font-weight-bold"> Current</p>
                                                @endif
                                                <button wire:click="deleteLogo({{ $iKey }}, 'dark')" class="btn btn-danger text-white"><i class="fa fa-trash"></i></button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
