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
                            <x-input wire:model.defer="name_en" field='name_en' />
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
                            <x-input wire:model.defer="name_ar" field='name_ar' />
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
                            <x-input wire:model.defer="sku" field='sku' />
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
                            <x-input wire:model.defer="barcode" field='barcode' />
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
                            <x-label>{{ __('Is Multiple') }}</x-label>
                            <div class="col-9">
                                <select class="form-control @error('is_multiple') is-invalid @enderror" wire:model.lazy="is_multiple">
                                    <option value="1">{{ __('Yes') }}</option>
                                    <option value="0">{{ __('No') }}</option>
                                </select>
                                <x-error field="is_multiple" />
                            </div>
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->
            </form>
        </div>
        <!--begin::Card body-->
    </div>

    @if($is_multiple)
        <livewire:dashboard.options.update :modifier='$modifier' />
    @endif

    @section('vendorScripts')
        <script src="{{ asset('metronic/assets/js/pages/crud/forms/widgets/select2.js') }}"></script>
        <script>
            window.addEventListener('show-create-option-modal', event => {
                $('#createOptionModal').modal('show')
            })

            window.addEventListener('hide-create-option-modal', event => {
                $('#createOptionModal').modal('hide')
            })

            window.addEventListener('show-edit-option-modal', event => {
                $('#editOptionModal').modal('show')
            })

            window.addEventListener('hide-edit-option-modal', event => {
                $('#editOptionModal').modal('hide')
            })
        </script>
    @endsection
</div>
