<div class="">
    <button title="View" class="btn btn-primary">
        <span class="fa fa-eye text-white"></span>
    </button>
    <button title="Edit" class="btn btn-warning">
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
</div>
