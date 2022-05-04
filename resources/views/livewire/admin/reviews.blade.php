<div class="card shadow bg-light">
    <div class="loading-page" wire:loading.block wire:target="saveRating,clear,toggleEdit,deleteReview">Loading&#8230;</div>
    <style>
        .checked {
            color: green;
        }
    </style>
    <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
        <div class="tab-content">
            <!-- 1st Block of tab-content -->
            <div class="" id="home">
                <div class="row ">
                    <div class="col-12">
                        <div class="m-3" x-data="{}">
                            <strong> {{ __('' . 'Reviews') }}</strong><br>
                            {{ __('You can now manage reviews.') }}
                            <div class="row">
                                <div class="col-2 mb-2">
                                    <label class="col-form-label" for="rating">
                                        Rating (1 - 5)
                                    </label>
                                    <x-jet-input id=rating wire:model="rating"  type="number" class="form-control" placeholder="{{ __('Rating 1 - 5') }}"/>
                                </div>
                                <div class="col-4 mb-2">
                                    <label class="col-form-label" for="summary">
                                        Summary
                                    </label>
                                    <x-jet-input id=summary wire:model="summary"  type="text" class="form-control" placeholder="{{ __('Summary') }}"/>
                                </div>
                                <div class="col-3 mb-2">
                                    <label class="col-form-label" for="snippet">
                                        Snippet
                                    </label>
                                    <x-jet-input id=snippet wire:model="snippet"  type="text" class="form-control" placeholder="{{ __('Snippet') }}"/>
                                </div>
                                <div class="col-3 mb-2">
                                    <label class="col-form-label" for="author">
                                        Author
                                    </label>
                                    <x-jet-input id=author wire:model="author"  type="text" class="form-control" placeholder="{{ __('Author') }}"/>
                                </div>
                                <div class="mb-2">
                                    <label class="col-form-label" for="description">
                                        Description
                                    </label>
                                    <textarea id="description" wire:model="description"  type="text" class="form-control" placeholder="{{ __('Description') }}"> </textarea>
                                </div>
                            </div>
                            <button wire:click="saveRating()" class="mt-4 btn btn-success text-white"><span class="fa fa-save"></span> Save </button>
                            <button wire:click="clear()" class="mt-4 btn btn-warning text-black"><span class="fa fa-eraser"></span> Clear </button>
                        </div>
                        @if(empty($errors->getMessages()) === false)
                            <div class='alert mt-3 alert-danger'>
                                @foreach($errors->getMessages() as $error)
                                    {!!  '- ' . implode(',', $error) . '<br/>' !!}
                                @endforeach
                            </div>
                        @endif
                        <hr/>
                        <h3>List of Customer Reviews</h3>
                        <br/>
                        <livewire:admin.datatables.reviews id="reviews-table" searchable="name, description" exportable/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
