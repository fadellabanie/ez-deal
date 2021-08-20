<x-admin-layout>
    <x-slot name="header">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('Menu Activation') }}</h5>
                        <!--end::Page Title-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->
    </x-slot>


    <div class="d-flex flex-row">
        <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
            <!--begin::Profile Card-->
            <div class="card card-custom card-stretch">
                <!--begin::Body-->
                <div class="card-body pt-4">
                    <!--begin::Nav-->
                    <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                        <div class="navi-item mb-2">
                            <a href="{{ route('dashboard.menu-activation.products') }}" class="navi-link py-4 active">
                                <span class="navi-text font-size-lg">{{ __('Products') }}</span>
                            </a>
                        </div>
                        <div class="navi-item mb-2">
                            <a href="{{ route('dashboard.menu-activation.categories') }}" class="navi-link py-4">
                                <span class="navi-text font-size-lg">{{ __('Categories') }}</span>
                            </a>
                        </div>
                        <div class="navi-item mb-2">
                            <a href="{{ route('dashboard.menu-activation.sizes') }}" class="navi-link py-4">
                                <span class="navi-text font-size-lg">{{ __('Sizes') }}</span>
                            </a>
                        </div>
                        <div class="navi-item mb-2">
                            <a href="{{ route('dashboard.menu-activation.tags') }}" class="navi-link py-4">
                                <span class="navi-text font-size-lg">{{ __('Tags') }}</span>
                            </a>
                        </div>
                        <div class="navi-item mb-2">
                            <a href="{{ route('dashboard.menu-activation.modifiers') }}" class="navi-link py-4">
                                <span class="navi-text font-size-lg">{{ __('Modifiers') }}</span>
                            </a>
                        </div>
                    </div>
                    <!--end::Nav-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Profile Card-->
        </div>

        <div class="flex-row-fluid ml-lg-8">
            <livewire:dashboard.menu-activation.products>
        </div>
    </div>
</x-admin-layout>
