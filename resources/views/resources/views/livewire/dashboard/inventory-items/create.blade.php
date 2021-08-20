<div>
    <x-alert class="alert-success"></x-alert>

    <x-auth-validation-errors></x-auth-validation-errors>

    <div class="card card-custom">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    {{ svg('Layers') }}
                </span>
                <h3 class="card-label">
                    {{ __('Basic Data') }}
                </h3>
            </div>
            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <button type="button" class="btn btn-info btn-sm mr-2" wire:click.prevent="submit" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left">{{ __('Save') }}</button>
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form class="form" id="kt_form1">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Name (English)') }}</x-label>
                            <x-input wire:model.lazy="name_en" field='name_en' />
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Name (Arabic)') }}</x-label>
                            <x-input wire:model.lazy="name_ar" field='name_ar' />
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Type') }}</x-label>
                            <div class="col-9">
                                <select class="form-control @error('type') is-invalid @enderror" wire:model.lazy="type">
                                    <option value="Raw">{{ __('Raw') }}</option>
                                    <option value="Semi-Finished">{{ __('Semi-Finished') }}</option>
                                </select>
                                <x-error field="type" />
                            </div>
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('SKU') }}</x-label>
                            <x-input wire:model.lazy="sku" field='sku' />
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Barcode') }}</x-label>
                            <x-input wire:model.lazy="barcode" field='barcode' />
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Tags') }}</x-label>
                            <div class="col-9" wire:ignore>
                                <select class="form-control select2 @error('itemTags') is-invalid @enderror" id="kt_select2_3" name="itemTags" multiple="multiple">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                <x-error field="itemTags" />
                            </div>
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Purchase Unit') }}</x-label>
                            <x-input wire:model.lazy="purchase_unit" field='purchase_unit' />
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Storage Unit') }}</x-label>
                            <x-input wire:model.lazy="storage_unit" field='storage_unit' />
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Ingredient Unit') }}</x-label>
                            <x-input wire:model.lazy="ingredient_unit" field='ingredient_unit' />
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Purchase To Storage Factor') }}</x-label>
                            <x-input type="number" wire:model.lazy="purchase_to_storage_factor" field='purchase_to_storage_factor' />
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Storage To Ingredient Factor') }}</x-label>
                            <x-input type="number" wire:model.lazy="storage_to_ingredient_factor" field='storage_to_ingredient_factor' />
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Cost Type') }}</x-label>
                            <div class="col-9">
                                <select class="form-control @error('cost_type') is-invalid @enderror" wire:model.lazy="cost_type">
                                    <option value="fixed">{{ __('Fixed cost per') }} {{ $storage_unit }}</option>
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
                    <div class="col-xl-7 my-2">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Cost') }}</x-label>
                            <x-input type="number" wire:model.lazy="cost" field='cost' />
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->
                @endif
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Minimum Level Alert') }}</x-label>
                            <x-input type="number" wire:model.lazy="minimum_level_alert" field='minimum_level_alert' />
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->
            </form>
        </div>
        <!--begin::Card body-->
    </div>

    @section('vendorScripts')
        <script src="{{ asset('metronic/assets/js/pages/crud/forms/widgets/select2.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#kt_select2_3').select2({
                    placeholder: '',
                }).on('change', function () {
                    @this.itemTags = $(this).val();
                });
            });

            window.addEventListener('show-create-ingredient-modal', event => {
                $('#createIngredientModal').modal('show')
            })

            window.addEventListener('hide-create-ingredient-modal', event => {
                $('#createIngredientModal').modal('hide')
            })

            window.addEventListener('show-edit-ingredient-modal', event => {
                $('#editIngredientModal').modal('show')
            })

            window.addEventListener('hide-edit-ingredient-modal', event => {
                $('#editIngredientModal').modal('hide')
            })
        </script>
    @endsection
</div>
