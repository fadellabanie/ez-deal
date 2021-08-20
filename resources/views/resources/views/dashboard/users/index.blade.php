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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('Employees') }}</h5>
                        <!--end::Page Title-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                @if(auth()->user()->type == 'owner')
                    <div class="d-flex align-items-center">
                        <x-add-new-record-button href="{{ route('dashboard.users.create') }}">{{ __('Add new') }}</x-add-new-record-button>
                    </div>
                @else
                    @can('Create employee')
                    <div class="d-flex align-items-center">
                        <x-add-new-record-button href="{{ route('dashboard.users.create') }}">{{ __('Add new') }}</x-add-new-record-button>
                    </div>
                    @endcan
                @endif
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->
    </x-slot>


   <livewire:dashboard.users.datatable />
</x-admin-layout>
