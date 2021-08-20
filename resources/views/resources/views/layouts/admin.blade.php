<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if (app()->getLocale() == 'ar') direction="rtl" dir="rtl" style="direction: rtl" @endif>

<head>
    <meta charset="utf-8" />
    <title>eclick</title>
    <meta name="description" content="Page with empty content" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    @yield('vendorStyles')
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    @if (app()->getLocale() == 'en')
        @include('partials._head-ltr')
    @else
        @include('partials._head-rtl')
    @endif
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{ asset('metronic/assets/media/logos/favicon.ico') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    @livewireStyles
    @stack('styles')
</head>

<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
        <!--begin::Logo-->
        <a href="{{ route('dashboard') }}">
            <img alt="Logo" src="{{ asset('metronic/assets/media/logos/logo.svg') }}" height="40" />
        </a>
        <!--end::Logo-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Aside Mobile Toggle-->
            <button class="p-0 btn burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
                <span></span>
            </button>
            <!--end::Aside Mobile Toggle-->
            <!--begin::Header Menu Mobile Toggle-->
            <button class="p-0 ml-4 btn burger-icon" id="kt_header_mobile_toggle">
                <span></span>
            </button>
            <!--end::Header Menu Mobile Toggle-->
            <!--begin::Topbar Mobile Toggle-->
            <button class="p-0 ml-2 btn btn-hover-text-primary" id="kt_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-xl">
                    {{ svg('User') }}
                </span>
            </button>
            <!--end::Topbar Mobile Toggle-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="flex-row d-flex flex-column-fluid page">
            <!--begin::Aside-->
            <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
                <!--begin::Brand-->
                <div class="brand flex-column-auto" id="kt_brand">
                    <!--begin::Logo-->
                    <a href="{{ route('dashboard') }}" class="brand-logo">
                        <img alt="Logo" src="{{ asset('metronic/assets/media/logos/logo.svg') }}" height="40" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Toggle-->
                    <button class="px-0 brand-toggle btn btn-sm" id="kt_aside_toggle">
                        <span class="svg-icon svg-icon-xl">
                            {{ svg('Angle-double-left') }}
                        </span>
                    </button>
                    <!--end::Toolbar-->
                </div>
                <!--end::Brand-->

                @include('layouts.admin-navigation')
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header header-fixed">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">
                        <!--begin::Header Menu Wrapper-->
                        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">

                        </div>
                        <!--end::Header Menu Wrapper-->
                        <!--begin::Topbar-->
                        <div class="topbar">
                            <!--begin::Languages-->
                            <div class="dropdown">
                                <!--begin::Toggle-->
                                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                    <div class="mr-1 btn btn-icon btn-clean btn-dropdown btn-lg">
                                        <span class="mr-3 symbol symbol-20">
                                            @php
                                                $locale = app()->getLocale();
                                            @endphp
                                            <img src="{{ asset(config("languages.{$locale}.flag")) }}"
                                                alt="" />
                                        </span>
                                    </div>
                                </div>
                                <!--end::Toggle-->
                                <!--begin::Dropdown-->
                                <div
                                    class="p-0 m-0 dropdown-menu dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                                    <!--begin::Nav-->
                                    <ul class="py-4 navi navi-hover">
                                        <!--begin::Item-->
                                        <li class="navi-item">
                                            <a href="{{ route('locale', 'en') }}" class="navi-link">
                                                <span class="mr-3 symbol symbol-20">
                                                    <img src="{{ asset('metronic/assets/media/svg/flags/226-united-states.svg') }}"
                                                        alt="" />
                                                </span>
                                                <span class="navi-text">English</span>
                                            </a>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="navi-item active">
                                            <a href="{{ route('locale', 'ar') }}" class="navi-link">
                                                <span class="mr-3 symbol symbol-20">
                                                    <img src="{{ asset('metronic/assets/media/svg/flags/008-saudi-arabia.svg') }}"
                                                        alt="" />
                                                </span>
                                                <span class="navi-text">العربية</span>
                                            </a>
                                        </li>
                                        <!--end::Item-->
                                    </ul>
                                    <!--end::Nav-->
                                </div>
                                <!--end::Dropdown-->
                            </div>
                            <!--end::Languages-->
                            <!--begin::User-->
                            <div class="topbar-item">
                                <div class="w-auto px-2 btn btn-icon btn-icon-mobile btn-clean d-flex align-items-center btn-lg"
                                    id="kt_quick_user_toggle">
                                    <span
                                        class="mr-1 text-muted font-weight-bold font-size-base d-none d-md-inline">{{ __('Hi') }},</span>
                                    <span
                                        class="mr-3 text-dark-50 font-weight-bolder font-size-base d-none d-md-inline">{{ auth()->user()->name }}</span>
                                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                        <span
                                            class="symbol-label font-size-h5 font-weight-bold">{{ ucfirst(mb_substr(auth()->user()->name, 0, 1, 'utf8')) }}</span>
                                    </span>
                                </div>
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    {{ $header }}
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            {{ $slot }}
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="py-4 bg-white footer d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div
                        class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="order-2 text-dark order-md-1">
                            <span class="mr-2 text-muted font-weight-bold">&copy;{{ date('Y') }}</span>
                            <a href="#" target="_blank" class="text-dark-75 text-hover-primary">eClick POS</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Nav-->
                        <div class="nav nav-dark">
                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->
    <!-- begin::User Panel-->
    <div id="kt_quick_user" class="p-10 offcanvas offcanvas-right">
        <!--begin::Header-->
        <div class="pb-5 offcanvas-header d-flex align-items-center justify-content-between">
            <h3 class="m-0 font-weight-bold">{{ __('User Profile') }}</h3>
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
                <i class="ki ki-close icon-xs text-muted"></i>
            </a>
        </div>
        <!--end::Header-->
        <!--begin::Content-->
        <div class="pr-5 offcanvas-content mr-n5">
            <!--begin::Header-->
            <div class="mt-5 d-flex align-items-center">
                <div class="mr-5 symbol symbol-100">
                    <div class="symbol-label" style="background-image:url('{{ auth()->user()->avatar }}')"></div>
                    <i class="symbol-badge bg-success"></i>
                </div>
                <div class="d-flex flex-column">
                    <a href="#"
                        class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{ auth()->user()->name }}</a>
                    <div class="mt-1 text-muted">{{ __(auth()->user()->type) }}</div>
                    <div class="mt-2 navi">
                        <a href="#" class="navi-item">
                            <span class="p-0 pb-2 navi-link">
                                <span class="mr-1 navi-icon">
                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                        {{ svg('Mail-notification') }}
                                    </span>
                                </span>
                                <span class="navi-text text-muted text-hover-primary">{{ auth()->user()->email }}</span>
                            </span>
                        </a>
                        <a href="{{ route('logout') }}"
                            class="px-5 py-2 btn btn-sm btn-light-primary font-weight-bolder"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Separator-->
            <div class="mt-8 mb-5 separator separator-dashed"></div>
            <!--end::Separator-->
            <!--begin::Nav-->
            <div class="p-0 navi navi-spacer-x-0">
                <!--begin::Item-->
                <a href="{{ (auth()->user()->type == 'admin') ? route('manage.profile.index')  : route('dashboard.profile.index') }}" class="navi-item">
                    <div class="navi-link">
                        <div class="mr-3 symbol symbol-40 bg-light">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-md svg-icon-success">
                                    {{ svg('Notification2') }}
                                </span>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold">{{ __('My Profile') }}</div>
                            <div class="text-muted">{{ __('Account settings') }}</div>
                        </div>
                    </div>
                </a>
                <!--end:Item-->
                <!--begin::Item-->
                <a href="{{ (auth()->user()->type == 'admin') ? route('manage.change-password')  : route('dashboard.change-password') }}" class="navi-item">
                    <div class="navi-link">
                        <div class="mr-3 symbol symbol-40 bg-light">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-md svg-icon-danger">
                                    {{ svg('Lock') }}
                                </span>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold">{{ __('Change password') }}</div>
                            <div class="text-muted">{{ __('Account settings') }}</div>
                        </div>
                    </div>
                </a>
                <!--end:Item-->
            </div>
            <!--end::Nav-->
        </div>
        <!--end::Content-->
    </div>
    <!-- end::User Panel-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop">
        <span class="svg-icon">
            {{ svg('Up-2') }}
        </span>
    </div>
    <!--end::Scrolltop-->
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };

    </script>

    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('metronic/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('metronic/assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('metronic/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Vendors(used by this page)-->
    @yield('vendorScripts')
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('metronic/assets/js/pages/widgets.js') }}"></script>
    <!--end::Page Scripts-->
    @livewireScripts
    <script>
        window.addEventListener('alert', event => {
            toastr[event.detail.type](event.detail.message);
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
        });

        window.addEventListener('swal',function(e){
            Swal.fire(e.detail);
        });
    </script>
    @stack('scripts')
</body>
<!--end::Body-->

</html>
