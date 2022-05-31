<div class="">
    <button wire:click="showEditModal({{ $iId }})" title="Edit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-modal">
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
{{--        <button wire:click="deleteProjectType({{ $iId }})" title="Delete Permanently" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#edit-project-type-modal">--}}
{{--            <span class="fa text-white fa-trash"></span>--}}
{{--        </button>--}}
    @endif
</div>
