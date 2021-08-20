<div>
    <div wire:ignore.self class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="editItemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form class="form" id="kt_form2">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editItemModalLabel">{{ $name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-9 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Quantity') }}</x-label>
                                    <div class="col-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">{{ __('Quantity') }}</span></div>
                                            <input type="number" class="form-control @error("quantity") is-invalid @enderror" wire:model.lazy="quantity" min="0" />
                                            <div class="input-group-append"><span class="input-group-text">{{ $unit }}</span></div>
                                            <x-error field="quantity" />
                                        </div>
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-sm mr-2" wire:click.prevent="update" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left">{{ __('Save') }}</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{ __('Close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
