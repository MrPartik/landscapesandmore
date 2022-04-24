
<div class="config block">
    <div class="tab-content">
        <!-- 1st Block of tab-content -->
        <div class="tab-pane active" id="home">
            <div class="container bootstrap snippets bootdey">
                <div class="row">
                    <div class="col-md-2 col-xs-4">
                        <div class="config-one-item animated animation fadeInDown">
                            <a href="javascript:"><i class="fa fa-sticky-note blue"></i></a>
                            <h2>{{ $aCounts['total'] }}</h2>
                            <h4 class="br-blue">Total of Record</h4>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <div class="config-one-item animated animation fadeInDown">
                            <a href="javascript:"><i class="fa fa-phone green"></i></a>
                            <h2>{{ $aCounts['contacted'] }}</h2>
                            <h4 class="br-green">Contacted</h4>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <div class="config-one-item animated animation fadeInDown">
                            <a href="javascript:"><i class="fa fa-check green"></i></a>
                            <h2>{{ $aCounts['resolved'] }}</h2>
                            <h4 class="br-green">Resolved</h4>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <div class="config-one-item animated animation fadeInDown">
                            <a href="javascript:"><i class="fa fa-times orange"></i>&nbsp;<i class="fa fa-phone orange"></i></a>
                            <h2>{{ $aCounts['not_contacted'] }}</h2>
                            <h4 class="br-green">Not yet contacted</h4>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <div class="config-one-item animated animation fadeInDown">
                            <a href="javascript:"><i class="fa fa-times orange"></i>&nbsp;<i class="fa fa-check orange"></i></a>
                            <h2>{{ $aCounts['not_resolved'] }}</h2>
                            <h4 class="br-green">Not yet resolved</h4>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <div class="config-one-item animated animation fadeInDown">
                            <a href="javascript:"><i class="fa fa-times text-danger"></i>&nbsp;<i class="fa fa-map-marker text-danger"></i></a>
                            <h2>{{ $aCounts['serviceable_area'] }}</h2>
                            <h4 class="br-red">Out of serviceable area</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-12">
                    <hr/>
                        <h3>Warranty Claim List</h3>
                    <br/>
                    <livewire:admin.datatables.warranty id="warranty-table" searchable="name, description" exportable />
                </div>
                <x-jet-dialog-modal wire:model="bShowModal" >
                    <x-slot name="title">
                        {{ __('Warranty Review') }}
                    </x-slot>

                    <x-slot name="content">
                        @if($bShowModal === true)<div class="mt-2" x-data="{}">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <h5>Personal Information</h5>
                                </div>
                                <hr class="m-2"/>
                                <div class="col-6">
                                    <strong class="col-form-label">
                                        First Name:
                                    </strong><br>
                                    <label>{{ $aWarrantyModel->first_name }}</label>
                                </div>
                                <div class="col-6">
                                    <strong class="col-form-label">
                                        Last Name:
                                    </strong><br>
                                    <label>{{ $aWarrantyModel->last_name }}</label>
                                </div>
                                <div class="col-6">
                                    <strong class="col-form-label">
                                        Email:
                                    </strong><br>
                                    <label>{{ $aWarrantyModel->email }}</label>
                                </div>
                                <div class="col-6">
                                    <strong class="col-form-label">
                                        Phone:
                                    </strong><br>
                                    <label>{{ $aWarrantyModel->phone }}</label>
                                </div>
                                <hr class="m-2"/>
                                <div class="col-5">
                                    <strong class="col-form-label">
                                        Home Address:
                                    </strong><br>
                                    <label>{{ $aWarrantyModel->home_address }}</label>
                                </div>
                                <div class="col-4">
                                    <strong class="col-form-label">
                                        City Address:
                                    </strong><br>
                                    <label>{{ $aWarrantyModel->city_address }}</label>
                                </div>
                                <div class="col-3">
                                    <strong class="col-form-label">
                                        Zip Code:
                                    </strong><br>
                                    <label>{{ $aWarrantyModel->zip_code }}</label>
                                </div>
                                <div class="col-12 mt-3">
                                    <h5>Warranty Request</h5>
                                </div>
                                <hr class="m-2"/>
                                <div class="col-12">
                                    <strong class="col-form-label">
                                        How often do you water?
                                    </strong><br>
                                    <label>{{ $aWarrantyModel->often_water }}</label>
                                </div>
                                <div class="col-12">
                                    <strong class="col-form-label">
                                        Do you know the name of the plant/tree/bush in question?
                                    </strong><br>
                                    <label>{{ $aWarrantyModel->knowledge_in_plant }}</label>
                                </div>
                                @if(count(json_decode($aWarrantyModel->images ?? '[]', true)) > 0)
                                    <div class="col-12 mt-3">
                                        <h5>Attached Images</h5>
                                    </div>
                                    <hr class="m-2"/>
                                    <div class="col-12">
                                        <div class="row" style="display: inherit">
                                            @foreach(json_decode($aWarrantyModel->images ?? '[]', true) as $sImageUrl)
                                                <a href="{{ url($sImageUrl) }}" target="_blank"><img class="col-3" src="{{ url($sImageUrl) }}"></a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @endif
                    </x-slot>

                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$toggle('bShowModal')" wire:loading.attr="disabled">
                            {{ __('Close') }}
                        </x-jet-secondary-button>
                    </x-slot>
                </x-jet-dialog-modal>

                <x-jet-dialog-modal wire:model="bShowRemarksModal" >
                    <x-slot name="title">
                        {{ __('Warranty Remarks') }}
                    </x-slot>

                    <x-slot name="content">
                        {{ __('Please write your remark.') }}
                        <div class="mt-2" x-data="{}">
                            <div class="mb-3">
                                <label class="col-form-label" for="name">
                                    Name
                                </label>
                                <x-jet-input id=remarks wire:model.lazy="sRemarks"  type="text" class="form-control" placeholder="{{ __('Remarks') }}"/>
                            </div>
                        </div>
                    </x-slot>

                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$toggle('bShowRemarksModal')" wire:loading.attr="disabled">
                            {{ __('Close') }}
                        </x-jet-secondary-button>
                        <x-jet-button class="ml-2" wire:click="markStatusResolve()"  wire:loading.attr="disabled">
                            {{ __('Mark as ' . (($sType === 'resolve') ?  ' Resolved' : 'Un-resolved')) }}
                        </x-jet-button>
                    </x-slot>
                </x-jet-dialog-modal>
            </div>
        </div>
    </div>
</div>
