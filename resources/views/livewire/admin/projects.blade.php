<div class="row my-3">
    <style>
        .image-preview-container {
            position: relative;
            display: inline;
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

        /* The overlay effect (full height and width) - lays on top of the container and over the image */
        .image-preview-container .video-overlay {
            position: absolute;
            top: -95px;
            bottom: 0;
            right: 40px;
            height: 25px;
            width: 10px;
            border-radius: 100px;
            opacity: 0;
            transition: .3s ease;
            background-color: green;
        }

        /* When you mouse over the container, fade in the overlay icon*/
        .image-preview-container:hover .overlay {
            opacity: 1;
        }
        /* When you mouse over the container, fade in the overlay icon*/
        .image-preview-container:hover .video-overlay {
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
        /* When you move the mouse over the icon, change color */
        .image-preview-container .fa-video:hover {
            color: #eee;
        }
    </style>
    <div class="col-12">
        <div class="loading-page" wire:loading.block wire:target="uploadProjectModalImages, unsetUploadImage, pictureOfProject, thumbnailVideo, setCurrentTab, saveProject">Loading&#8230;</div>
        <div class="card shadow bg-light">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                <ul class="nav nav-tabs" id="ProjectTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $sCurrentTab === 'projects' ? 'active' : '' }}" wire:click="setCurrentTab('projects')" id="projects-tab" data-bs-toggle="tab" data-bs-target="#projects-tab-content" type="button" role="tab" aria-controls="projects-tab" aria-selected="true">Projects</button>
                    </li>
                    <li class="nav-item " role="presentation">
                        <button class="nav-link {{ $sCurrentTab === 'project_types' ? 'active' : '' }}" wire:click="setCurrentTab('project_types')" id="projects-types-tab" data-bs-toggle="tab" data-bs-target="#projects-types-tab-content" type="button" role="tab" aria-controls="projects-types-tab" aria-selected="false">Project Types</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show {{ $sCurrentTab === 'projects' ? 'active' : '' }}" id="projects-tab-content" role="tabpanel" aria-labelledby="projects-tab">
                        <div class="row">
                            <div class="col-2">
                                <button wire:click="showAddProjectModal()" class="mt-4 btn btn-primary text-white"><span class="fa fa-plus"></span> Add Project </button>
                            </div>
                            <div class="mt-3 form-control col-3">
                                <label class="col-form-label" for="project_type">
                                    Project Type
                                </label>
                                <select id=project_type wire:model.lazy="iProjectTypeIdForProjectSelection"  type="text" class="form-control" placeholder="{{ __('Project Type') }}">
                                    <option selected value=""> All Projects </option>
                                    @foreach($aProjectTypes as $aProjectType)
                                        <option value="{{ $aProjectType['project_type_id'] }}">{{ ucfirst($aProjectType['type']) }} - {{ $aProjectType['name'] }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-2 row" style="display:flow-root; border:1px black dashed; padding: 10px; ">
                            @foreach($aProjects as $iKey => $aProject)
                                <div class="image-preview-container row"
                                     title="{{ $aProject->description . '(' . $aProject->projectType->name . ')'}}">
                                    <div style="background: url('{{ ($aProject->type === 'video-external') ? $aProject->thumbnail_url : $aProject->url }}') no-repeat center"
                                         class="image col-3 m-1"></div>
                                    <div class="overlay col-3">
                                        <a href="javascript:" wire:click="deleteProject({{ $aProject->project_id }})" class="icon" title="Remove">
                                            <i class="fa fa-close"></i>
                                        </a>
                                    </div>
                                    @if($aProject->type === 'video-external')
                                        <div class="video-overlay col-3">
                                            <a href="{{ url($aProject->url) }}" target="_blank" class="icon" title="Redirect">
                                                <i class="fa fa-video"></i>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade show {{ $sCurrentTab === 'project_types' ? 'active' : '' }}" id="projects-types-tab-content" role="tabpanel" aria-labelledby="projects-types-tab">
                        <div class="row justify-content-end config block">
                            <div class="col-8 tab-content mt-5">
                                <div class="container bootstrap snippets bootdey">
                                    <div class="row">
                                        <div class="col-md-4 col-xs-4">
                                            <div class="config-one-item animated animation fadeInDown">
                                                <i class="fa fa-sticky-note blue"></i>
                                                <h2>{{ $aCounts['total'] }}</h2>
                                                <h4 class="br-blue">Total of Records</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-4">
                                            <div class="config-one-item animated animation fadeInDown">
                                                <i class="fa fa-check text-success"></i>
                                                <h2>{{ $aCounts['active'] }}</h2>
                                                <h4 class="br-green">Active</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-4">
                                            <div class="config-one-item animated animation fadeInDown">
                                                <i class="fa fa-times text-danger"></i></a>
                                                <h2>{{ $aCounts['inactive'] }}</h2>
                                                <h4 class="br-red">Inactive</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3" x-data="{}">
                                    <strong> {{ __('Add Project Type') }}</strong><br>
                                    {{ __('You can now edit the basic info.') }}
                                    <div class="mb-2">
                                        <label class="col-form-label" for="name">
                                            Name
                                        </label>
                                        <x-jet-input id=name wire:model.lazy="sNameProjectType"  type="text" class="form-control" placeholder="{{ __('Name') }}"/>
                                    </div>
                                    <div class="mb-2">
                                        <label class="col-form-label" for="purpose_type">
                                            Purpose Type
                                        </label>
                                        <select id=purpose_type wire:model.lazy="purposeType"  type="text" class="form-control" placeholder="{{ __('Purpose Type') }}">
                                            <option selected value="gallery"> Gallery </option>
                                            <option value="3D video"> 3D Videos </option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label class="col-form-label" for="description">
                                            Description
                                        </label>
                                        <x-jet-input id="description" wire:model.lazy="sDescriptionProjectType"  type="text" class="form-control" placeholder="{{ __('Description') }}"/>
                                    </div>
                                    <button wire:click="saveProjectType()" class="mt-4 btn btn-success text-white"><span class="fa fa-save"></span> Save </button>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <hr/>
                            <h3>Project Type List</h3>
                            <br/>
                            <livewire:admin.datatables.project-type id="user-table" searchable="name, description" exportable />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="bShowAddProjectModal">
        <x-slot name="title">
            {{ __('Add Project') }}
        </x-slot>

        <x-slot name="content">
            {{ __('You can now add the basic information of project.') }}
            <div class="mt-2" x-data="{}">
                <div class="mb-3">
                    <label class="col-form-label" for="name">
                        Name
                    </label>
                    <x-jet-input id=name wire:model.lazy="sNameOfProject"  type="text" class="form-control" placeholder="{{ __('Name') }}"/>
                </div>
                <div class="mb-3">
                    <label class="col-form-label" for="project_type">
                        Project Type
                    </label>
                    <select id=project_type wire:model.lazy="iProjectTypeIdForProject" wire:change="setIsGallery"  type="text" class="form-control" placeholder="{{ __('Project Type') }}">
                        <option selected value="0" disabled> Select Project Type </option>
                        @foreach($aProjectTypes as $aProjectType)
                            <option value="{{ $aProjectType['project_type_id'] }}"> {{ ucfirst($aProjectType['type']) }} - {{ $aProjectType['name'] }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="col-form-label" for="project_type">
                        Media Type
                    </label>
                    <select id=media_type wire:model="mediaType"  type="text" class="form-control" placeholder="{{ __('Media Type') }}">
                        <option selected value="image"> Upload Image </option>
                        <option value="image-external"> External Image </option>
                        @if($isGallery === false)
                            <option value="video-external"> External Video </option>
                        @endif
                    </select>
                </div>
                @if($mediaType === 'image')
                    <div class="mb-3">
                        <div class="de_form">
                            <label class="de_form" for="input_7_9">Please Provide Pictures Of Your Project</label>
                            <div>
                                <input id="uploadPicturesOfLandscapes" style="display: none" wire:model="pictureOfProject" type="file" accept="image/*">
                                <button onclick="$('#uploadPicturesOfLandscapes').click()" class="btn btn-primary text-white">
                                    <span class="fa fa-file"> </span> Upload Image
                                </button>
                                <span>Max. file size: 10 MB.</span>
                                @if($pictureOfProject !== null && $pictureOfProject !== '')
                                    <div class=" mt-3 row" style="text-align:center; display:flow-root; padding: 10px; ">
                                        <div class="image-preview-container row">
                                            <div style="background: url('{{ $pictureOfProject->temporaryUrl() ?? '' }}') no-repeat center"
                                                 class="image col-3 m-1"></div>
                                            <div class="overlay col-3">
                                                <a href="javascript:" wire:click="removePictureOfProject()" class="icon" title="Remove">
                                                    <i class="fa fa-close"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="mb-3">
                        <label class="col-form-label" for="external-media">
                            External Media
                        </label>
                        <x-jet-input id=external-media wire:model.lazy="sUrlMedia"  type="text" class="form-control" placeholder="{{ __('External Media') }}"/>
                    </div>
                @endif
                @if($mediaType === 'video-external')
                    <div class="mb-3">
                        <div class="de_form">
                            <label class="de_form" for="input_7_9">Please Provide Thumbnail</label>
                            <div>
                                <input id="uploadThumbnail" style="display: none" wire:model="thumbnailVideo" type="file" accept="image/*">
                                <button onclick="$('#uploadThumbnail').click()" class="btn btn-primary text-white">
                                    <span class="fa fa-file"> </span> Upload Image
                                </button>
                                <span>Max. file size: 10 MB.</span>
                                @if($thumbnailVideo !== null && $thumbnailVideo !== '')
                                    <div class=" mt-3 row" style="text-align:center; display:flow-root; padding: 10px; ">
                                        <div class="image-preview-container row">
                                            <div style="background: url('{{ $thumbnailVideo->temporaryUrl() ?? '' }}') no-repeat center"
                                                 class="image col-3 m-1"></div>
                                            <div class="overlay col-3">
                                                <a href="javascript:" wire:click="removeThumbnailOfVideo()" class="icon" title="Remove">
                                                    <i class="fa fa-close"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                @if($isGallery === true)
                    <hr/>
                    <div class="de_form">
                        <h5 class="de_form" for="input_7_9">Modal Data</h5>
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label class="col-form-label" for="project-modal-title">
                                    Title
                                </label>
                                <x-jet-input id=project-modal-title wire:model.lazy="projectModalTitle"  type="text" class="form-control" placeholder="{{ __('Title') }}"/>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="col-form-label" for="project-modal-date">
                                    Date
                                </label>
                                <x-jet-input id=project-modal-date wire:model.lazy="projectModalDate"  type="text" class="form-control" placeholder="{{ __('Date') }}"/>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="col-form-label" for="project-modal-location">
                                    Location
                                </label>
                                <x-jet-input id=project-modal-location wire:model.lazy="projectModalLocation"  type="text" class="form-control" placeholder="{{ __('Location') }}"/>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="col-form-label" for="project-modal-value">
                                    Value
                                </label>
                                <x-jet-input id=project-modal-value wire:model.lazy="projectModalValue"  type="text" class="form-control" placeholder="{{ __('Value') }}"/>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="col-form-label" for="project-modal-category">
                                    Category
                                </label>
                                <x-jet-input id=project-modal-category wire:model.lazy="projectModalCategory"  type="text" class="form-control" placeholder="{{ __('Category') }}"/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label" for="project-modal-description">
                                Description (supported html code)
                            </label>
                            <div wire:ignore>
                                <textarea id="project-modal-description"><p></p></textarea>
                                <script type="application/javascript">
                                    window.oKothingEditor = null;
                                    function initializeWysiwyg() {
                                        if (window.oKothingEditor !== null) {
                                            window.oKothingEditor.destroy();
                                            window.oKothingEditor = null;
                                        }
                                        window.oKothingEditor = window.KothingEditor.create('project-modal-description', {
                                            display: "block",
                                            width: "100%",
                                            height: "auto",
                                            popupDisplay: "full",
                                            toolbarItem: [
                                                ["undo", "redo"],
                                                ["font", "fontSize", "formatBlock"],
                                                [
                                                    "bold",
                                                    "underline",
                                                    "italic",
                                                    "strike",
                                                    "subscript",
                                                    "superscript",
                                                    "fontColor",
                                                    "hiliteColor",
                                                ],
                                                ["outdent", "indent", "align", "list", "horizontalRule"],
                                                ["lineHeight", "paragraphStyle", "textStyle"],
                                                ["preview", "fullScreen"],
                                            ],
                                            charCounter: true,
                                        });
                                    }
                                    initializeWysiwyg();
                                </script>
                            </div>
                        </div>
                        <div class="mb-3 de_form">
                            <label class="de_form" for="input_7_9">Provide featured images in project modal</label>
                            <div>
                                <input id="uploadProjectModalImages" style="display: none" wire:model="uploadProjectModalImages" type="file" accept="image/*">
                                <button onclick="$('#uploadProjectModalImages').click()" class="btn btn-primary text-white">
                                    <span class="fa fa-file"> </span> Upload Images
                                </button>
                                <span>Max. file size: 10 MB.</span>
                            </div>
                        </div>
                        @if(count($uploadProjectModalImages) > 0)
                            <div class=" mt20 row" style="display:flow-root; border:1px black dashed; padding: 10px; ">
                                @foreach($uploadProjectModalImages as $iKey => $image)
                                    <div class="image-preview-container row">
                                        <div style="background: url('{{ $image->temporaryUrl() }}') no-repeat center"  class="image col-3 m-1" > </div>
                                        <div class="overlay col-3">
                                            <a href="javascript:" wire:click="unsetUploadImage({{$iKey}})" class="icon" title="Remove">
                                                <i class="fa fa-close"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('bShowAddProjectModal')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-button id="saveProject" class="ml-2" wire:click="saveProject"  wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    <script>
        $('#saveProject').click(function(){
            @this.set('projectModalDescription', window.oKothingEditor.getContents());
        });
    </script>
</div>
