<div>
    @section('vendorStyles')
        <link rel="stylesheet" href="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.rtl.css') }}">
    @endsection

    <x-slot name="header">
        <!--begin::Subheader-->
        <div class="py-2 subheader py-lg-6 subheader-solid" id="kt_subheader">
            <div class="flex-wrap container-fluid d-flex align-items-center justify-content-between flex-sm-nowrap">
                <!--begin::Info-->
                <div class="flex-wrap mr-1 d-flex align-items-center">
                    <!--begin::Page Heading-->
                    <div class="flex-wrap mr-5 d-flex align-items-baseline">
                        <!--begin::Page Title-->
                        <h5 class="my-1 mr-5 text-dark font-weight-bold">{{ __('Financial Settings') }}</h5>
                        <!--end::Page Title-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                @can('Create Financial Settings')
                <div class="d-flex align-items-center">
                    <x-add-new-record-button href="{{ route('dashboard.financial-settings.create') }}">{{ __('Add new') }}</x-add-new-record-button>
                </div>
                @endcan
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->
    </x-slot>

    <!--begin::Advance Table Widget 10-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="py-5 border-0 card-header">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">{{ __('Financial Settings') }}</span>
                <span class="mt-3 text-muted font-weight-bold font-size-sm">{{ __('Show All') }}</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="py-0 card-body">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
                    <thead>
                        <tr class="text-left">
                            <th class="pl-0" style="width: 30px">#</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Name') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Percentage') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Start Date') }}</th>
                            <th class="pr-0 text-left" style="min-width: 160px">{{ __('Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($financialSettings as $financialSetting)
                            <tr>
                                <td class="py-6 pl-0">{{ $financialSetting->id }}</td>
                                <td class="pl-0">
                                    <a href="{{ route('dashboard.financial-settings.edit', $financialSetting) }}" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{ $financialSetting->name }}</a>
                                </td>
                                <td class="pl-0">
                                    {{$financialSetting->percentage }}
                                </td>
                                <td class="pl-0">
                                    {{ $financialSetting->start_date }}
                                </td>
                                <td class="pl-0">
                                    @can('Edit Financial Settings')
                                    <x-edit-record-button href="{{ route('dashboard.financial-settings.edit', $financialSetting) }}" />
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-danger font-size-lg">{{ __('No records found') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!--end::Table-->

            {{ $financialSettings->links() }}
        </div>
        <!--end::Body-->
    </div>
    <!--end::Advance Table Widget 10-->
</div>
