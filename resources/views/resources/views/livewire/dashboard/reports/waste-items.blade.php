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
                        <h5 class="my-1 mr-5 text-dark font-weight-bold">{{ __('Waste Items') }}</h5>
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
                    {{ __('Waste products') }}
                </h3>
            </div>
            <!--begin::Toolbar-->
            @can('Export Reports')

            <div class="card-toolbar">
                <button type="button" class="mr-2 btn btn-info btn-sm" wire:click.prevent="exportByWasteProduct">{{ __('Export') }}</button>
            </div>
            @endcan
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form class="form" id="kt_form1" wire:submit.prevent="exportByWasteProduct">
                @csrf
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Product') }}</x-label>
                            <div class="col-9" wire:ignore>
                                <select class="form-control" id="product">
                                    <option value="all">{{ __('All') }}</option>
                                    @foreach($productSizes as $productSize)
                                        <option value="{{ $productSize->id }}">{{ $productSize->name }}</option>
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
                    {{ __('Waste items') }}
                </h3>
            </div>
            <!--begin::Toolbar-->
            @can('Export Reports')

            <div class="card-toolbar">
                <button type="button" class="mr-2 btn btn-info btn-sm" wire:click.prevent="exportByWasteItem">{{ __('Export') }}</button>
            </div>
            @endcan
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form class="form" id="kt_form1" wire:submit.prevent="exportByWasteItem">
                @csrf
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Items') }}</x-label>
                            <div class="col-9" wire:ignore>
                                <select class="form-control" id="item">
                                    <option value="all">{{ __('All') }}</option>
                                    @foreach($inventoryItems as $inventoryItem)
                                        <option value="{{ $inventoryItem->id }}">{{ $inventoryItem->name }}</option>
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

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#product').select2({
                    placeholder: '',
                }).on('change', function () {
                    @this.product = $(this).val();
                });

                $('#item').select2({
                    placeholder: '',
                }).on('change', function () {
                    @this.item = $(this).val();
                });
            });
        </script>
    @endpush
</div>
