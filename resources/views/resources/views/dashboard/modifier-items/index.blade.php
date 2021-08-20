<x-admin-layout>
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ $modifier->name }}</h5>
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


   <livewire:dashboard.modifier-items :modifier='$modifier'>

    @section('vendorScripts')
        <script src="{{ asset('metronic/assets/js/pages/crud/forms/widgets/select2.js') }}"></script>
        <script>
            window.addEventListener('show-create-item-modal', event => {
                $('#createItemModal').modal('show')
            })

            window.addEventListener('hide-create-item-modal', event => {
                $('#createItemModal').modal('hide')
            })

            window.addEventListener('show-edit-item-modal', event => {
                $('#editItemModal').modal('show')
            })

            window.addEventListener('hide-edit-item-modal', event => {
                $('#editItemModal').modal('hide')
            })
        </script>
    @endsection
</x-admin-layout>
