<div class="config block">
    <div class="loading-page" wire:loading.block wire:target="save">Loading&#8230;</div>
    <div class="tab-content">
        <!-- 1st Block of tab-content -->
        <div class="tab-pane active" id="home">
            <div class="container bootstrap snippets bootdey">
                <div class="row">
                    <div class="col-2">
                        <button wire:click="addUser()" class="mb-4 btn btn-primary text-white"><span class="fa fa-plus"></span> Add User </button>
                    </div>
                    <div class="col-12">
                        <h3>User's List</h3>
                        <br/>
                        <livewire:admin.datatables.users id="users-table" searchable="name, description" exportable/>
                    </div>
                    <x-jet-dialog-modal wire:model="bShowModal">
                        <x-slot name="title">
                            User's Information
                        </x-slot>
                        <x-slot name="content">
                            {{ __('You can now manage the user\'s information.') }}
                            <div class="mt-2" x-data="{}">
                                <div class="mb-3">
                                    <label class="col-form-label" for="name">
                                        Name
                                    </label>
                                    <x-jet-input id=name wire:model.lazy="name"  type="text" class="form-control" placeholder="{{ __('Enter your name') }}"/>
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label" for="email">
                                        Email
                                    </label>
                                    <x-jet-input id=email wire:model.lazy="email"  type="email" class="form-control" placeholder="{{ __('Enter your email') }}"/>
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label" for="email">
                                        Role
                                    </label>
                                    <select class="form-control select" wire:model.lazy="role">
                                        <option value="" disabled selected>Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                        <option value="content_creator">Content Creator</option>
                                    </select>
                                </div>
                            </div>
                        </x-slot>

                        <x-slot name="footer">
                            <x-jet-secondary-button wire:click="save" wire:loading.attr="disabled">
                                {{ __('Save') }}
                            </x-jet-secondary-button>
                        </x-slot>
                    </x-jet-dialog-modal>
                </div>
            </div>
        </div>
    </div>
</div>
