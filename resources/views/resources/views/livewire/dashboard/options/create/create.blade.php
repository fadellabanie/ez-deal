<div>
    <div wire:ignore.self class="modal fade" id="createOptionModal" tabindex="-1" role="dialog" aria-labelledby="createOptionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form class="form" id="kt_form2">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createOptionModalLabel">{{ __('New Option') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-9">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Name (English)') }}</x-label>
                                    <x-input wire:model.defer="name_en" field='name_en' />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-9">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Name (Arabic)') }}</x-label>
                                    <x-input wire:model.defer="name_ar" field='name_ar' />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-9">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('SKU') }}</x-label>
                                    <x-input wire:model.defer="sku" field='sku' />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-9">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Cost Type') }}</x-label>
                                    <div class="col-9">
                                        <select class="form-control @error('cost_type') is-invalid @enderror" wire:model.lazy="cost_type">
                                            <option value="fixed">{{ __('Fixed') }}</option>
                                            <option value="variable">{{ __('Variable') }}</option>
                                        </select>
                                        <x-error field="cost_type" />
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        @if($cost_type == 'fixed')
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-9">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Cost') }}</x-label>
                                    <x-input type="number" wire:model.defer="cost" field='cost' min="0" />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        @endif
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-9">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Taxes') }}</x-label>
                                    <div class="col-9">
                                        <select class="form-control @error('is_taxable') is-invalid @enderror" wire:model.defer="is_taxable">
                                            <option value="1">{{ __('Taxable') }}</option>
                                            <option value="0">{{ __('Non-taxable') }}</option>
                                        </select>
                                        <x-error field="is_taxable" />
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-9">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Calories') }}</x-label>
                                    <x-input type="number" wire:model.defer="calories" field='calories' min="0" />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-9">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Price') }}</x-label>
                                    <x-input type="number" wire:model.defer="price" field='price' min="0" />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="mr-2 btn btn-primary btn-sm" wire:click.prevent="store" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left">{{ __('Save') }}</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{ __('Close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
