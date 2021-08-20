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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('Business Management') }}</h5>
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
    <!--begin::Advance Table Widget 10-->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="business-info-tab" data-toggle="tab" href="#business-info" role="tab"
                aria-controls="business-info" aria-selected="true">{{__("Business Info")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="system-settings-tab" data-toggle="tab" href="#system-settings" role="tab"
                aria-controls="system-settings" aria-selected="false">{{__("System Settings")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="receipt-designs-tab" data-toggle="tab" href="#receipt-designs" role="tab"
                aria-controls="receipt-designs" aria-selected="false">{{__("Receipt Designs")}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="app-designs-tab" data-toggle="tab" href="#app-designs" role="tab"
                aria-controls="app-designs" aria-selected="false">{{__("App Designs")}}</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="business-info" role="tabpanel" aria-labelledby="business-info-tab">
            <livewire:dashboard.business-info.create />

        </div>
        <div class="tab-pane fade" id="system-settings" role="tabpanel" aria-labelledby="system-settings-tab">
            <livewire:dashboard.system-settings.create />

        </div>
        <div class="tab-pane fade" id="receipt-designs" role="tabpanel" aria-labelledby="receipt-designs-tab">
            <livewire:dashboard.receipt-designs.create />
        </div>
        <div class="tab-pane fade" id="app-designs" role="tabpanel" aria-labelledby="app-designs">
            <livewire:dashboard.app-designs.create />
        </div>
    </div>


</x-admin-layout>