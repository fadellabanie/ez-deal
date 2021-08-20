<div>
    <div wire:ignore.self class="modal fade" id="createComponentModal" tabindex="-1" role="dialog" aria-labelledby="createComponentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form class="form" id="kt_form2">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createComponentModalLabel">{{ __('New ingredient') }}</h5>
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
                                    <x-label>{{ __('Product') }}</x-label>
                                    <div class="col-9">
                                        <select class="form-control @error('component_id') is-invalid @enderror" wire:model.defer="component_id">
                                            <option value=""></option>
                                            @foreach ($components as $component)
                                                <option value="{{ $component->id }}">{{ $component->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-error field="component_id" />
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        @foreach($productSizes as $key => $productSize)
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-9 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ $productSize->name }}</x-label>
                                    <div class="col-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">{{ __('Quantity') }}</span></div>
                                            <input type="number" class="form-control @error("quantity.$key") is-invalid @enderror" wire:model.defer="quantity.{{ $key }}" min="0" />
                                            <x-error field="quantity.{{ $key }}" />
                                        </div>
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-sm mr-2" wire:click.prevent="store" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left">{{ __('Save') }}</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{ __('Close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
