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
                    <div class="col-3">
                        <h1>Summary </h1>
                        <hr/>
                        <div class="row">

                            <div class="">
                                <h4 class="">Total Record:  {{ $aCounts['total'] }}</h4>
                            </div>
                                <div class="">
                                    <h4 class="">Rating : </h4>
                                    <p style="font-size: 15px;">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span> : {{ $aCounts['star5'] }}
                                    </p>
                                    <p style="font-size: 15px;">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span> : {{ $aCounts['star4'] }}
                                    </p>
                                    <p style="font-size: 15px;">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star"></span> : {{ $aCounts['star3'] }}
                                    </p>
                                    <p style="font-size: 15px;">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star"></span> : {{ $aCounts['star2'] }}
                                    </p>
                                    <p style="font-size: 15px;">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star"></span> : {{ $aCounts['star1'] }}
                                    </p>
                                </div>
                        </div>
                    </div>
                    <div class="col-9">
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
                    </div>
                    <div class="col-12 mt-3">
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="daterange" value="" />
                                </div>
                                <div class="col-6">
                                    <button wire:click="generatePdfReport" class="mb-4 btn btn-success text-white"><span class="fa fa-download"></span> Generate Report </button>
                                </div>
                            </div>
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
    <script>
        $(function() {
            let startDate = moment().subtract(30, 'days');
            let endDate = moment();
        @this.set('startDate', startDate);
        @this.set('endDate', endDate);
            $('input[name="daterange"]').daterangepicker({
                opens: 'left',
                startDate: startDate,
                endDate: endDate
            }, function(start, end, label) {
            @this.set('startDate', start);
            @this.set('endDate', end);
            });
        });
    </script>
</div>
