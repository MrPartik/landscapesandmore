<div class="row my-3 ">
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
    <div class="col-12">
        <div class="card shadow bg-light">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top ">
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
                            <strong> {{($iAwardId <= 0) ? __('Add Award') : __('Edit Award') }}</strong><br>
                            {{ __('You can now ' . (($iAwardId <= 0) ? 'add' : 'edit') . ' the basic info.') }}
                            <div class="mb-2">
                                <label class="col-form-label" for="description">
                                    Description
                                </label>
                                <x-jet-input id="description" wire:model.lazy="description"  type="text" class="form-control" placeholder="{{ __('Description') }}"/>
                            </div>
                            <div class="mb-2">
                                <label class="col-form-label" for="redirectUrl">
                                    Redirect To
                                </label>
                                <x-jet-input id="redirectUrl" wire:model.lazy="redirectUrl"  type="text" class="form-control" placeholder="{{ __('Redirect To') }}"/>
                            </div>
                            <div class="mb-3">
                                <div class="de_form">
                                    <label class="de_form" for="input_7_9">Please Provide Pictures Of Your Award</label>
                                    <div>
                                        <input id="uploadPicturesOfLandscapes" style="display: none" wire:model="pictureOfAward" type="file" accept="image/*">
                                        <button onclick="$('#uploadPicturesOfLandscapes').click()" class="btn btn-primary text-white">
                                            <span class="fa fa-file"> </span> Upload Image
                                        </button>
                                        <span>Max. file size: 5 MB.</span>
                                        @if($pictureOfAward !== null && $pictureOfAward !== '')
                                            <div class=" mt-3 row" style="text-align:center; display:flow-root; padding: 10px; ">
                                                <div class="image-preview-container row">
                                                    <div style="background: url('{{ (is_object($pictureOfAward)) ? url($pictureOfAward->temporaryUrl()) : url($pictureOfAward) }}') no-repeat center"
                                                         class="image col-3 m-1"></div>
                                                    <div class="overlay col-3">
                                                        <a href="javascript:" wire:click="removePictureOfAward()" class="icon" title="Remove">
                                                            <i class="fa fa-close"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <button wire:click="saveAward()" class="mt-4 btn btn-success text-white"><span class="fa fa-save"></span> Save </button>
                            @if($iAwardId > 0)
                                <button wire:click="backToAdd" class="mt-4 btn btn-primary text-white"><span class="fa fa-arrow-left"></span> Back to Add </button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <hr/>
                    <h3>Award's List</h3>
                    <br/>
                    <livewire:admin.datatables.awards id="awards-table" searchable="name, description" exportable />
                </div>
            </div>
        </div>
    </div>
</div>
