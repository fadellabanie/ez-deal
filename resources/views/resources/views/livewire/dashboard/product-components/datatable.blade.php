<div>
    @section('vendorStyles')
        <link rel="stylesheet" href="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.rtl.css') }}">
    @endsection

    <x-slot name="header">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ $product->name }}</h5>
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

    <div class="card card-custom mt-5">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    {{ svg('Layout-left-panel-2') }}
                </span>
                <h3 class="card-label">
                    {{ __('Ingredients') }}
                </h3>
            </div>
            <div class="card-toolbar">
                <x-add-new-record-button href="javascript:void(0)" wire:click="create">{{ __('Add new ingredient') }}</x-add-new-record-button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
                    <thead>
                        <tr class="text-left">
                            <th class="pl-0" style="min-width: 120px">{{ __('Name') }}</th>
                            <th class="pr-0 text-left" style="min-width: 160px">{{ __('Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productComponents as $productComponent)
                            <tr>
                                <td class="pl-0">
                                    {{ $productComponent->component->name }}
                                </td>
                                <td class="pr-0 text-left">
                                    <x-edit-record-button href="javascript:void(0)" wire:click="selectItem({{ $productComponent->component_id }}, 'update')" />
                                    <x-delete-record-button href="javascript:void(0)" wire:click="selectItem({{ $productComponent->component_id }}, 'delete')"  />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center text-danger font-size-lg">{{ __('No records found') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('livewire.dashboard.product-components.create')
    @include('livewire.dashboard.product-components.update')

    @section('vendorScripts')
        <script src="{{ asset('metronic/assets/js/pages/crud/forms/widgets/select2.js') }}"></script>
        <script>
            window.addEventListener('show-create-component-modal', event => {
                        $('#createComponentModal').modal('show')
                    })

                    window.addEventListener('hide-create-component-modal', event => {
                        $('#createComponentModal').modal('hide')
                    })

                    window.addEventListener('show-edit-component-modal', event => {
                        $('#editComponentModal').modal('show')
                    })

                    window.addEventListener('hide-edit-component-modal', event => {
                        $('#editComponentModal').modal('hide')
                    })
        </script>
    @endsection
</div>
