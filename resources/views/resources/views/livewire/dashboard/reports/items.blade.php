<div>
    <x-loader />

    <x-slot name="header">
        <!--begin::Subheader-->
        <div class="py-2 subheader py-lg-6 subheader-solid" id="kt_subheader">
            <div class="flex-wrap container-fluid d-flex align-items-center justify-content-between flex-sm-nowrap">
                <!--begin::Info-->
                <div class="flex-wrap mr-1 d-flex align-items-center">
                    <!--begin::Page Heading-->
                    <div class="flex-wrap mr-5 d-flex align-items-baseline">
                        <!--begin::Page Title-->
                        <h5 class="my-1 mr-5 text-dark font-weight-bold">{{ __('Inventory Items') }}</h5>
                        <!--end::Page Title-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">

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
                    {{ __('Purchase per supplier') }}
                </h3>
            </div>
            <!--begin::Toolbar-->
            @can('Export Reports')

            <div class="card-toolbar">
                <button type="button" class="mr-2 btn btn-info btn-sm" wire:click.prevent="exportPurchasePerSupplier">{{ __('Export') }}</button>
            </div>
            @endcan
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form class="form" id="kt_form1" wire:submit.prevent="exportPurchasePerSupplier">
                @csrf
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Supplier') }}</x-label>
                            <div class="col-9" wire:ignore>
                                <select class="form-control" id="supplier">
                                    <option value="all">{{ __('All') }}</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
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

    <div class="card card-custom mt-7">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    {{ svg('Layers') }}
                </span>
                <h3 class="card-label">
                    {{ __('Item By SKU') }}
                </h3>
            </div>
            <!--begin::Toolbar-->
            @can('Export Reports')

            <div class="card-toolbar">
                <button type="button" class="mr-2 btn btn-info btn-sm" wire:click.prevent="exportByItemSKU">{{ __('Export') }}</button>
            </div>
            @endcan
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form class="form" id="kt_form1" wire:submit.prevent="exportByItemSKU">
                @csrf
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('SKU') }}</x-label>
                            <div class="col-9" wire:ignore>
                                <select class="form-control" id="sku">
                                    <option value="all">{{ __('All') }}</option>
                                    @foreach($itemSkues as $itemSku)
                                        <option value="{{ $itemSku }}">{{ $itemSku }}</option>
                                    @endforeach
                                </select>
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

    <div class="card card-custom mt-7">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    {{ svg('Layers') }}
                </span>
                <h3 class="card-label">
                    {{ __('Item By Type') }}
                </h3>
            </div>
            <!--begin::Toolbar-->
            @can('Export Reports')

            <div class="card-toolbar">
                <button type="button" class="mr-2 btn btn-info btn-sm" wire:click.prevent="exportByItemType">{{ __('Export') }}</button>
            </div>
            @endcan
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form class="form" id="kt_form1" wire:submit.prevent="exportByItemType">
                @csrf
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Type') }}</x-label>
                            <div class="col-9">
                                <select class="form-control" wire:model.defer="type">
                                    <option value="all">{{ __('All') }}</option>
                                    <option value="Raw">{{ __('Raw') }}</option>
                                    <option value="Semi-Finished">{{ __('Semi-Finished') }}</option>
                                </select>
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

    <div class="card card-custom mt-7">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    {{ svg('Layers') }}
                </span>
                <h3 class="card-label">
                    {{ __('Item By Expiration Date') }}
                </h3>
            </div>
            <!--begin::Toolbar-->
            @can('Export Reports')

            <div class="card-toolbar">
                <button type="button" class="mr-2 btn btn-info btn-sm" wire:click.prevent="exportByExpirationDate">{{ __('Export') }}</button>
            </div>
            @endcan
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form class="form" id="kt_form1" wire:submit.prevent="exportByExpirationDate">
                @csrf
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Expiration Date') }}</x-label>
                            <x-date-picker field="expiration_date" wire:model="expiration_date" />
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->
            </form>
        </div>
        <!--begin::Card body-->
    </div>

    <div class="card card-custom mt-7">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    {{ svg('Layers') }}
                </span>
                <h3 class="card-label">
                    {{ __('Item By Cost') }}
                </h3>
            </div>
            <!--begin::Toolbar-->
            @can('Export Reports')

            <div class="card-toolbar">
                <button type="button" class="mr-2 btn btn-info btn-sm" wire:click.prevent="exportByItemCost">{{ __('Export') }}</button>
            </div>
            @endcan
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form class="form" id="kt_form1" wire:submit.prevent="exportByItemCost">
                @csrf
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Cost') }}</x-label>
                            <x-input type="number" field="cost" wire:model.defer="cost" />
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->
            </form>
        </div>
        <!--begin::Card body-->
    </div>

    <div class="card card-custom mt-7">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    {{ svg('Layers') }}
                </span>
                <h3 class="card-label">
                    {{ __('Item By Type and Cost') }}
                </h3>
            </div>
            <!--begin::Toolbar-->
            @can('Export Reports')

            <div class="card-toolbar">
                <button type="button" class="mr-2 btn btn-info btn-sm" wire:click.prevent="exportByItemTypeAndCost">{{ __('Export') }}</button>
            </div>
            @endcan
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form class="form" id="kt_form1" wire:submit.prevent="exportByItemTypeAndCost">
                @csrf
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Type') }}</x-label>
                            <div class="col-9">
                                <select class="form-control" wire:model.defer="type">
                                    <option value="all">{{ __('All') }}</option>
                                    <option value="Raw">{{ __('Raw') }}</option>
                                    <option value="Semi-Finished">{{ __('Semi-Finished') }}</option>
                                </select>
                            </div>
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
                            <x-label>{{ __('Cost') }}</x-label>
                            <x-input type="number" field="cost" wire:model.defer="cost" />
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->
            </form>
        </div>
        <!--begin::Card body-->
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#supplier').select2({
                    placeholder: '',
                }).on('change', function () {
                    @this.supplier = $(this).val();
                });

                $('#sku').select2({
                    placeholder: '',
                }).on('change', function () {
                    @this.sku = $(this).val();
                });
            });
        </script>
    @endpush
</div>
