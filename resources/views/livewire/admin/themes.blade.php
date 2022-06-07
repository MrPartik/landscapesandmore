<div class="row my-3">
    <style>
        .image-preview-container {
            position: relative;
            width: 100%;
        }

        /* Make the image to responsive */
        .image-preview-container .image {
            display: inline-block;
            border: 1px dashed gray;
            border-radius: 10px;
            width: 100px;
            height: 100px;
            background-size:100% !important;
        }

        /* The overlay effect (full height and width) - lays on top of the container and over the image */
        .image-preview-container .overlay {
            position: absolute;
            top: -95px;
            bottom: 0;
            right: 10px;
            height: 25px;
            width: 10px;
            border-radius: 100px;
            opacity: 0;
            transition: .3s ease;
            background-color: salmon;
        }

        /* When you mouse over the container, fade in the overlay icon*/
        .image-preview-container:hover .overlay {
            opacity: 1;
        }

        /* The icon inside the overlay is positioned in the middle vertically and horizontally */
        .image-preview-container .icon {
            color: white;
            font-size: 13px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        /* When you move the mouse over the icon, change color */
        .image-preview-container .fa-close:hover {
            color: #eee;
        }
    </style>
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
    <div class="loading-page" wire:loading.block wire:target="saveAnnouncements, saveVideoAfterCounterTheme, saveProjectTracker, deleteService, setCurrentTab, uploadSmallLogo, uploadLightLogo, saveService, pictureOfService, saveLogo, deleteLogo, uploadDarkLogo, bannerImage, saveBanner">Loading&#8230;</div>
    <div class="col-12">
        <div class="card shadow bg-light">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                <ul class="mb-2 nav nav-tabs" id="themes_tab" role="tablist">
                    <li class="nav-item " role="presentation">
                        <button class="nav-link {{ $sCurrentTab === 'announcement' ? 'active' : '' }}" wire:click="setCurrentTab('announcement')" id="announcement-tab" data-bs-toggle="tab" data-bs-target="#announcement-tab-content" type="button" role="tab" aria-controls="announcement-tab" aria-selected="false">Announcements </button>
                    </li>
                    <li class="nav-item " role="presentation">
                        <button class="nav-link {{ $sCurrentTab === 'services' ? 'active' : '' }}" wire:click="setCurrentTab('services')" id="services-tab" data-bs-toggle="tab" data-bs-target="#services-tab-content" type="button" role="tab" aria-controls="services-tab" aria-selected="false">Homepage Services Offered </button>
                    </li>
                    <li class="nav-item " role="presentation">
                        <button class="nav-link {{ $sCurrentTab === 'our_process' ? 'active' : '' }}" wire:click="setCurrentTab('our_process')" id="our_process-tab" data-bs-toggle="tab" data-bs-target="#our_process-tab-content" type="button" role="tab" aria-controls="our_process-tab" aria-selected="false">Homepage</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $sCurrentTab === 'banner' ? 'active' : '' }}" wire:click="setCurrentTab('banner')" id="banner-tab" data-bs-toggle="tab" data-bs-target="#banner-tab-content" type="button" role="tab" aria-controls="banner-tab" aria-selected="true">Homepage Banner</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $sCurrentTab === 'logo' ? 'active' : '' }}" wire:click="setCurrentTab('logo')" id="logo-tab" data-bs-toggle="tab" data-bs-target="#logo-tab-content" type="button" role="tab" aria-controls="logo-tab" aria-selected="true">Logos</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show {{ $sCurrentTab === 'announcement' ? 'active' : '' }}" id="announcement-tab-content" role="tabpanel" aria-labelledby="announcement-tab">
                        <div class="row justify-content-end">
                            <div class="mt-3 col-12" x-data="{}">
                                <h2> {{ __('Announcements')  }}</h2>
                                <p>{{ __('Manages announcements.') }}</p>
                                <hr/>
                                <div class="col-12">
                                    <label class="font-weight-bold">Announcements</label>
                                    <br/>
                                    <span>Announcement items are separated by new lines. </span>
                                    <br/><span style="color: blue">Format: [Link text Here](https://link-url-here.org)</span>
                                    <br/>
                                    <br/>
                                    <textarea class="form-control mb-2" rows="10" wire:model="announcements"></textarea>
                                    <button wire:click="saveAnnouncements" class="btn btn-success text-white"><i class="fa fa-save"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show {{ $sCurrentTab === 'services' ? 'active' : '' }}" id="services-tab-content" role="tabpanel" aria-labelledby="services-tab">
                        <div class="row justify-content-end">
                            <div class="mt-3 col-12" x-data="{}">
                                <h2> {{ __('Services we offer')  }}</h2>
                                <p>{{ __('Manages the list of services that we offer.') }}</p>
                                <hr/>
                                <div class="row justify-content-end config block">
                                    <div class="col-8 tab-content mt-5">
                                        <div class="container bootstrap snippets bootdey">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="config-one-item animated animation fadeInDown">
                                                        <i class="fa fa-sticky-note blue"></i>
                                                        <h2>{{ $aServicesCounts['total'] }}</h2>
                                                        <h4 class="br-blue">Total of Records</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-3" x-data="{}">
                                            <strong> {{($iServicesId <= 0) ? __('Add Service') : __('Edit Service') }}</strong><br>
                                            {{ __('You can now ' . (($iServicesId <= 0) ? 'add' : 'edit') . ' the basic info.') }}
                                            <div class="row">
                                                <div class="col-8 mb-2">
                                                    <label class="col-form-label" for="title">
                                                        Title
                                                    </label>
                                                    <x-jet-input id="title" wire:model="serviceTitle"  type="text" class="form-control" placeholder="{{ __('Title') }}"/>
                                                </div>
                                                <div class="col-4 mb-2">
                                                    <label class="col-form-label" for="title">
                                                        Redirect URL
                                                    </label>
                                                    <x-jet-input id="title" wire:model="serviceRedirectUrl"  type="text" class="form-control" placeholder="{{ __('Redirect URL') }}"/>
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <label class="col-form-label" for="description">
                                                    Description
                                                </label>
                                                <textarea rows="5" id="description" wire:model="serviceDescription"  type="text" class="form-control" placeholder="{{ __('Description') }}"> </textarea>
                                            </div>
                                            <div class="mb-3">
                                                <div class="de_form">
                                                    <label class="de_form" for="input_7_9">Please Provide Pictures Of Service</label>
                                                    <div>
                                                        <input id="uploadPicturesOfLandscapes" style="display: none" wire:model="pictureOfService" type="file" accept="image/*">
                                                        <button onclick="$('#uploadPicturesOfLandscapes').click()" class="btn btn-primary text-white">
                                                            <span class="fa fa-file"> </span> Upload Image
                                                        </button>
                                                        <span>Max. file size: 5 MB.</span>
                                                        @if($pictureOfService !== null && $pictureOfService !== '')
                                                            <div class=" mt-3 row" style="text-align:center; display:flow-root; padding: 10px; ">
                                                                <div class="image-preview-container row">
                                                                    <div style="background: url('{{ (is_object($pictureOfService)) ? url($pictureOfService->temporaryUrl()) : url($pictureOfService) }}') no-repeat center"
                                                                         class="image col-3 m-1"></div>
                                                                    <div class="overlay col-3">
                                                                        <a href="javascript:" wire:click="removePictureOfService()" class="icon" title="Remove">
                                                                            <i class="fa fa-close"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <button wire:click="saveService()" class=" btn btn-success text-white"><span class="fa fa-save"></span> Save </button>
                                            @if($iServicesId > 0)
                                                <button wire:click="backToAddService" class=" btn btn-primary text-white"><span class="fa fa-arrow-left"></span> Back to Add </button>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <hr/>
                                    <h3>Services we offer List</h3>
                                    <br/>
                                    <livewire:admin.datatables.services id="services-table" searchable="name, description" exportable />
                                </div>
                            </div>
                            <hr/>
                        </div>
                    </div>
                    <div class="tab-pane fade show {{ $sCurrentTab === 'our_process' ? 'active' : '' }}" id="our_process-tab-content" role="tabpanel" aria-labelledby="our_process-tab">
                        <div class="row justify-content-end">
                            <div class="mt-3 col-12" x-data="{}">
                                <h2> {{ __('Home Video')  }}</h2>
                                <p>{{ __('Video after counter text in welcome section.') }}</p>
                                <hr/>
                                <div class="mt-4">
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <label class="col-form-label" for="rightVideoAfterCounter">
                                            Video URL
                                        </label>
                                        <x-jet-input id="rightVideoAfterCounter" wire:model="rightVideoAfterCounter"  type="text" class="form-control" placeholder="{{ __('Video URL') }}"/>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label class="col-form-label" for="rightVideoAfterCounterThumbnail">
                                            Video Thumbnail URL
                                        </label>
                                            <div class="">
                                                <x-jet-input class="col-6" id="rightVideoAfterCounterThumbnail" wire:model="rightVideoAfterCounterThumbnail"  type="text" class="form-control" placeholder="{{ __('Video ThumbnailURL') }}"/>
                                                <br/>
                                                <input id="uploadThumbnailrightVideoAfterCounterThumbnail" style="display: none" wire:model="rightVideoAfterCounterThumbnail" type="file" accept="image/*">
                                                <button onclick="$('#uploadThumbnailrightVideoAfterCounterThumbnail').click()" class="btn btn-primary text-white">
                                                    <span class="fa fa-file"> </span> Upload Image
                                                </button>
                                                <span>Max. file size: 10 MB.</span>
                                                @if($rightVideoAfterCounterThumbnail !== null && $rightVideoAfterCounterThumbnail !== '')
                                                    <div class=" mt-3 row" style="text-align:center; display:flow-root; padding: 10px; ">
                                                        <div class="image-preview-container row">
                                                            <div style="background: url('{{ (is_object($rightVideoAfterCounterThumbnail)) ? url($rightVideoAfterCounterThumbnail->temporaryUrl()) : url($rightVideoAfterCounterThumbnail) }}') no-repeat center"
                                                                 class="image col-3 m-1"></div>
                                                            <div class="overlay-not col-3">
                                                                <a href="javascript:" wire:click="" class="icon" title="Remove">
                                                                    <i class="fa fa-close"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                    </div>
                                </div>
                                <button wire:click="saveVideoAfterCounterTheme()" class=" btn btn-success text-white"><span class="fa fa-save"></span> Save </button>
                            </div>
                            <hr style="margin-top: 10px" />
                            <div class="mt-3 col-12" x-data="{}">
                                <h2> {{ __('Project Tracker')  }}</h2>
                                <p>{{ __('Videos describing project tracker.') }}</p>
                                <hr/>
                                <div class="mt-4">
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <label class="col-form-label" for="ourProcessVideo">
                                            Our Process Video URL
                                        </label>
                                        <x-jet-input id="ourProcessVideo" wire:model="ourProcessVideoUrl"  type="text" class="form-control" placeholder="{{ __('Our Process Video URL') }}"/>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label class="col-form-label" for="ourProcessVideoThumbnail">
                                            Video Thumbnail URL
                                        </label>
                                        <x-jet-input id="ourProcessVideoThumbnail" wire:model="ourProcessVideoThumbnail"  type="text" class="form-control" placeholder="{{ __('Video ThumbnailURL') }}"/>
                                        <div class=""> <br/>
                                            <input id="uploadThumbnailourProcessVideoThumbnail" style="display: none" wire:model="ourProcessVideoThumbnail" type="file" accept="image/*">
                                            <button onclick="$('#uploadThumbnailourProcessVideoThumbnail').click()" class="btn btn-primary text-white">
                                                <span class="fa fa-file"> </span> Upload Image
                                            </button>
                                            <span>Max. file size: 10 MB.</span>
                                            @if($ourProcessVideoThumbnail !== null && $ourProcessVideoThumbnail !== '')
                                                <div class=" mt-3 row" style="text-align:center; display:flow-root; padding: 10px; ">
                                                    <div class="image-preview-container row">
                                                        <div style="background: url('{{ (is_object($ourProcessVideoThumbnail)) ? url($ourProcessVideoThumbnail->temporaryUrl()) : url($ourProcessVideoThumbnail) }}') no-repeat center"
                                                             class="image col-3 m-1"></div>
                                                        <div class="overlay-not col-3">
                                                            <a href="javascript:" wire:click="" class="icon" title="Remove">
                                                                <i class="fa fa-close"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label class="col-form-label" for="ourProcessDescription">
                                            Our Process Description
                                        </label>
                                        <textarea id="ourProcessDescription" wire:model="ourProcessDescription" type="text" class="form-control" rows="10" placeholder="{{ __('Our Process Description') }}"> </textarea>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-6">
                                        <h5>Landscape and Design Project</h5>
                                        <div class="col-12 mb-2">
                                            <label class="col-form-label" for="projectTrackerLandscapeVideo">
                                                Video URL
                                            </label>
                                            <x-jet-input id="projectTrackerLandscapeVideo" wire:model="projectTrackerLandscapeVideo"  type="text" class="form-control" placeholder="{{ __('Video URL') }}"/>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <label class="col-form-label" for="projectTrackerLandscapeThumbnail">
                                                Video Thumbnail URL
                                            </label>
                                            <x-jet-input id="projectTrackerLandscapeThumbnail" wire:model="projectTrackerLandscapeThumbnail"  type="text" class="form-control" placeholder="{{ __('Video ThumbnailURL') }}"/>
                                            <div class=""> <br/>
                                                <input id="uploadThumbnailprojectTrackerLandscapeThumbnail" style="display: none" wire:model="projectTrackerLandscapeThumbnail" type="file" accept="image/*">
                                                <button onclick="$('#uploadThumbnailprojectTrackerLandscapeThumbnail').click()" class="btn btn-primary text-white">
                                                    <span class="fa fa-file"> </span> Upload Image
                                                </button>
                                                <span>Max. file size: 10 MB.</span>
                                                @if($projectTrackerLandscapeThumbnail !== null && $projectTrackerLandscapeThumbnail !== '')
                                                    <div class=" mt-3 row" style="text-align:center; display:flow-root; padding: 10px; ">
                                                        <div class="image-preview-container row">
                                                            <div style="background: url('{{ (is_object($projectTrackerLandscapeThumbnail)) ? url($projectTrackerLandscapeThumbnail->temporaryUrl()) : url($projectTrackerLandscapeThumbnail) }}') no-repeat center"
                                                                 class="image col-3 m-1"></div>
                                                            <div class="overlay-not col-3">
                                                                <a href="javascript:" wire:click="" class="icon" title="Remove">
                                                                    <i class="fa fa-close"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h5>Maintenance and Turf Care</h5>
                                        <div class="col-12 mb-2">
                                            <label class="col-form-label" for="projectTrackerTurfVideo">
                                                Video URL
                                            </label>
                                            <x-jet-input id="projectTrackerTurfVideo" wire:model="projectTrackerTurfVideo"  type="text" class="form-control" placeholder="{{ __('Video URL') }}"/>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <label class="col-form-label" for="projectTrackerTurfThumbnail">
                                                Video Thumbnail URL
                                            </label>
                                            <x-jet-input id="projectTrackerTurfThumbnail" wire:model="projectTrackerTurfThumbnail"  type="text" class="form-control" placeholder="{{ __('Video ThumbnailURL') }}"/>
                                            <div class=""> <br/>
                                                <input id="uploadThumbnailprojectTrackerTurfThumbnail" style="display: none" wire:model="projectTrackerTurfThumbnail" type="file" accept="image/*">
                                                <button onclick="$('#uploadThumbnailprojectTrackerTurfThumbnail').click()" class="btn btn-primary text-white">
                                                    <span class="fa fa-file"> </span> Upload Image
                                                </button>
                                                <span>Max. file size: 10 MB.</span>
                                                @if($projectTrackerTurfThumbnail !== null && $projectTrackerTurfThumbnail !== '')
                                                    <div class=" mt-3 row" style="text-align:center; display:flow-root; padding: 10px; ">
                                                        <div class="image-preview-container row">
                                                            <div style="background: url('{{ (is_object($projectTrackerTurfThumbnail)) ? url($projectTrackerTurfThumbnail->temporaryUrl()) : url($projectTrackerTurfThumbnail) }}') no-repeat center"
                                                                 class="image col-3 m-1"></div>
                                                            <div class="overlay-not col-3">
                                                                <a href="javascript:" wire:click="" class="icon" title="Remove">
                                                                    <i class="fa fa-close"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button wire:click="saveProjectTracker()" class=" btn btn-success text-white"><span class="fa fa-save"></span> Save </button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show {{ $sCurrentTab === 'banner' ? 'active' : '' }}" id="banner-tab-content" role="tabpanel" aria-labelledby="banner-tab">
                        <div class="row justify-content-end">
                            <div class="mt-3 col-12" x-data="{}">
                                <h2> {{ __('Homepage Banner')  }}</h2>
                                <p>{{ __('Customize some fields in homepage banner.') }}</p>
                                <hr/>
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
                        </div>
                    </div>
                    <div class="tab-pane fade show {{ $sCurrentTab === 'logo' ? 'active' : '' }}" id="logo-tab-content" role="tabpanel" aria-labelledby="logo-tab">
                        <div class="row justify-content-end">
                            <div class="mt-3 col-12" x-data="{}">
                                <h2> {{ __('Logo')  }}</h2>
                                <p>{{ __('Customize Logo that are being used in the website.') }}</p>
                                <hr/>
                                <div class="row" style="justify-content: center;">
                                    <div class="row-logo-manager mr-1 col-lg-3 col-md-3 col-sm-12">
                                        <div class="mb-2">
                                            <label class="col-form-label" for="">
                                                <label class="col-form-label font-weight-bold" for="">
                                                    Admin/ Small Logo
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
                                                    <a href="{{ url($aFileName['formatted']) }}" target="_blank"><img style="max-width: 100%;" class="logo" src="{{ url($aFileName['formatted']) }}" alt=""></a>
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
                                    <div class="row-logo-manager mr-1 col-lg-4 col-md-4 col-sm-12">
                                        <div class="mb-2">
                                            <label class="col-form-label" for="">
                                                <label class="col-form-label font-weight-bold" for="">
                                                    Header Logo
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
                                                        <a href="{{ url($aFileName['formatted']) }}" target="_blank"><img style="max-width: 100%;" class="logo" src="{{ url($aFileName['formatted']) }}" alt=""></a>
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
                                    <div class="row-logo-manager col-lg-4 col-md-4 col-sm-12" style="background: #474747;color: white;">
                                        <div class="mb-2">
                                            <label class="col-form-label" for="">
                                                <label class="col-form-label font-weight-bold" for="">
                                                    Footer Logo
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
                                                        <a href="{{ url($aFileName['formatted']) }}" target="_blank"><img style="max-width: 100%;" class="logo" src="{{ url($aFileName['formatted']) }}" alt=""></a>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
