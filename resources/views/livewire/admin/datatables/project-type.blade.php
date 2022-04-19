<div class="">
    <button wire:click="showEditProjectTypeModal({{ $iId }})" title="Edit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-project-type-modal">
        <span class="fa fa-pencil"></span>
    </button>
    @if($bIsActive === true)
        <button title="Deactivate" class="btn btn-danger" wire:click="toggleActiveStatus({{ $iId }})">
            <span class="fa fa-ban text-white"></span>
        </button>
    @else
        <button title="Activate" class="btn btn-success" wire:click="toggleActiveStatus({{ $iId }})">
            <span class="fa fa-check text-white"></span>
        </button>
    @endif
    @if($iTotalProjects <= 0)
        <button wire:click="deleteProjectType({{ $iId }})" title="Delete Permanently" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#edit-project-type-modal">
            <span class="fa text-white fa-trash"></span>
        </button>
    @endif
</div>
<x-jet-dialog-modal wire:model="bShowEditProjectTypeModal">
        <x-slot name="title">
            {{ __('Edit Project Description') }}
        </x-slot>

        <x-slot name="content">
            {{ __('You can now edit the basic info.') }}
            <div class="mt-2" x-data="{}">
                <div class="mb-3">
                    <label class="col-form-label" for="name">
                        Name
                    </label>
                    <x-jet-input id=name wire:model="sName"  type="text" class="form-control" placeholder="{{ __('Name') }}"/>
                </div>
                <div class="mb-3">
                    <label class="col-form-label" for="description">
                        Description
                    </label>
                    <x-jet-input id="description" wire:model="sDescription"  type="text" class="form-control" placeholder="{{ __('Description') }}"/>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('bShowEditProjectTypeModal')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="saveProjectType"  wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
