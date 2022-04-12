<div class="">
    <a href="{{ url('/blog/' . str_replace(' ', '-', $sTitle) . '/' . $iId) }}" target="_blank" title="View" class="btn btn-primary">
        <span class="fa fa-eye text-white"></span>
    </a>
    <a href="{{ url('/admin/blog/edit/' . $iId) }}" title="Edit" class="btn btn-warning">
        <span class="fa fa-pencil"></span>
    </a>
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
