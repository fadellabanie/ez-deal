<div>
    <x-slot name="header">
        <!--begin::Subheader-->
        <div class="py-2 subheader py-lg-6 subheader-solid" id="kt_subheader">
            <div class="flex-wrap container-fluid d-flex align-items-center justify-content-between flex-sm-nowrap">
                <!--begin::Info-->
                <div class="flex-wrap mr-1 d-flex align-items-center">
                    <!--begin::Page Heading-->
                    <div class="flex-wrap mr-5 d-flex align-items-baseline">
                        <!--begin::Page Title-->
                        <h5 class="my-1 mr-5 text-dark font-weight-bold">{{ __('Edit tax') }}</h5>
                        <!--end::Page Title-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <x-back-button href="{{ route('dashboard.financial-settings.index') }}"></x-back-button>
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->
    </x-slot>

    <div class="card card-custom">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    {{ svg('Layers') }}
                </span>
                <h3 class="card-label">
                    {{ __('Edit tax') }}
                </h3>
            </div>
            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <button type="button" class="mr-2 btn btn-info btn-sm" wire:click.prevent="submit" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left">{{ __('Save') }}</button>
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form class="form" id="kt_form1" wire:submit.prevent="submit">
                @csrf
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Name') }}</x-label>
                            <x-input wire:model.defer="financialSetting.name" field='financialSetting.name' />
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->

                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Percentage') }}</x-label>
                            <x-input type="number" wire:model.defer="financialSetting.percentage" field='financialSetting.percentage' />
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->

                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Start Date') }}</x-label>
                            <x-date-picker field="financialSetting.start_date" wire:model="financialSetting.start_date" minDate="new Date()" />
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->
            </form>
        </div>
        <!--begin::Card body-->
    </div>
</div>
