<div class="" style="text-align-last: center;">
    @if($sType === 'actions')
        <button wire:click="initWarrantDetails({{$iId}})" title="View" class="btn btn-primary">
            <span class="fa fa-eye text-white"></span>
        </button>
{{--        <button title="Resolve" class="btn btn-success" wire:click="">--}}
{{--            <span class="fa fa-check text-white"></span>--}}
{{--        </button>--}}
    @elseif($sType === 'is_contacted')
        @if(is_null($sContactedDate) === true)
            <button title="Contacted" class="btn btn-success" wire:click="saveStatusContact({{ $iId }})">
                <span class="fa fa-check text-white"></span>
            </button>
        @else
            <button title="Not Contacted" class="btn btn-danger" wire:click="saveStatusContact({{ $iId }})">
                <span class="fa fa-times text-white"></span>
            </button>
            <br/>
            {{ \Carbon\Carbon::make($sContactedDate)->format('Y-m-d H:i') }}
        @endif
    @elseif($sType === 'is_resolved')
        @if(is_null($sResolvedDate) === true)
            <button title="Resolve" class="btn btn-success" wire:click="markStatusResolve({{$iId}}, 'resolve')">
                <span class="fa fa-check text-white"></span>
            </button>
        @else

            <button title="Resolve" class="btn btn-danger" wire:click="markStatusResolve({{$iId}}, 'unresolved')">
                <span class="fa fa-times text-white"></span>
            </button>
            <br/>
            {{ \Carbon\Carbon::make($sResolvedDate)->format('Y-m-d H:i') }}
        @endif
    @endif
</div>
