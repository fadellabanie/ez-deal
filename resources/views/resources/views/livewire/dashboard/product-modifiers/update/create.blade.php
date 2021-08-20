<div>
    <div wire:ignore.self class="modal fade" id="createModifierModal" tabindex="-1" role="dialog" aria-labelledby="createModifierModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form class="form" id="kt_form2">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModifierModalLabel">{{ __('New Modifier') }}</h5>
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
                                    <x-label>{{ __('Modifier') }}</x-label>
                                    <div class="col-9">
                                        <select class="form-control @error('modifier') is-invalid @enderror" wire:model.defer="modifier">
                                            <option value=""></option>
                                            @foreach ($modifiers as $modifier)
                                                <option value="{{ $modifier->id }}">{{ $modifier->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-error field="modifier" />
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-9 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Minimum Options') }}</x-label>
                                    <x-input type="number" min="1" wire:model.defer="minimum_options" field='minimum_options' />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-9 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Maximum Options') }}</x-label>
                                    <x-input type="number" min="1" wire:model.defer="maximum_options" field='maximum_options' />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
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
