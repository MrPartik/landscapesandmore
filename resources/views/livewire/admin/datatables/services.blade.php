<div>
    <button wire:click="findService({{ $iId }})" title="Edit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-project-type-modal">
        <span class="fa fa-pencil"></span>
    </button>

    <button title="Delete" class="btn btn-danger" wire:click="deleteService({{ $iId }})">
        <span class="fa fa-trash text-white"></span>
    </button>
</div>
