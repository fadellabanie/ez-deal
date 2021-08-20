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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('Dashboard') }}</h5>
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
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <x-card-count field="{{$data['inventory_transactions']}}" style="1"
                    url="{{ route('dashboard.inventory-transactions.index') }}">
                    {{__('Total Inventory Transactions')}}</x-card-count>
            </div>
            <div class="col-xl-4">
                <x-card-count field="{{$data['suppliers']}}" style="2" url="{{ route('dashboard.suppliers.index') }}">
                    {{__('Total Suppliers')}}
                </x-card-count>
            </div>
            <div class="col-xl-4">
                <x-card-count field="{{$data['inventory_items']}}" style="4"
                    url="{{ route('dashboard.inventory-items.index') }}">
                    {{__('Total Inventory Items')}}
                </x-card-count>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4">
                <!--begin: Stats Widget 19-->
                <div class="card card-custom bg-light-success card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body my-3">
                        <a href="{{route('dashboard.products.index')}}"
                            class="card-title font-weight-bolder text-success text-hover-state-dark font-size-h6 mb-4 d-block">{{__("Total Products")}}</a>
                        <div class="font-weight-bold text-muted font-size-sm">
                            <span class="text-dark-75 font-size-h2 font-weight-bolder mr-2">{{$data['products']}}</span>
                        </div>
                    </div>
                    <!--end:: Body-->
                </div>
                <!--end: Stats:Widget 19-->
            </div>
            <div class="col-xl-4">
                <!--begin::Stats Widget 20-->
                <div class="card card-custom bg-light-warning card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body my-4">
                        <a href="{{route('dashboard.categories.index')}}"
                            class="card-title font-weight-bolder text-warning font-size-h6 mb-4 text-hover-state-dark d-block">{{__("Total Categories")}}</a>
                        <div class="font-weight-bold text-muted font-size-sm">
                            <span
                                class="text-dark-75 font-weight-bolder font-size-h2 mr-2">{{$data['categories']}}</span>
                        </div>

                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 20-->
            </div>
            <div class="col-xl-4">
                <!--begin::Stats Widget 21-->
                <div class="card card-custom bg-light-info card-stretch gutter-b">
                    <!--begin::ody-->
                    <div class="card-body my-4">
                        <a href="{{route('dashboard.users.index')}}"
                            class="card-title font-weight-bolder text-info font-size-h6 mb-4 text-hover-state-dark d-block">{{__("Total Employees")}}</a>
                        <div class="font-weight-bold text-muted font-size-sm">
                            <span
                                class="text-dark-75 font-weight-bolder font-size-h2 mr-2">{{$data['employees']}}</span>
                        </div>

                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 21-->
            </div>
        </div>


        <div class="row">
            <div class="col-xl-8">
                <div class="card card-custom card-stretch gutter-b card-shadowless">
                    <div class="card-header border-0 py-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bolder text-dark">{{__("Last Orders")}}</span>
                            <span class="text-muted mt-3 font-weight-bold font-size-sm">{{__("Last 10 Orders")}}</span>
                        </h3>

                    </div>
                    <div class="card-body py-0">
                        <div class="table-responsive">
                            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                                <thead>
                                    <tr class="text-left">
                                        <th style="width: 100px">{{__("Cashier")}}</th>
                                        <th style="min-width: 150px">{{__("Order Type")}}</th>
                                        <th style="min-width: 150px">{{__("Total")}}</th>
                                        <th style="min-width: 150px">{{__("Since")}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['orders'] as $order)
                                    <tr>
                                        <td class="pr-0">
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$order->cashier->name ?? "--"}}</span>

                                        </td>
                                        <td class="pl-0">
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$order->orderType->name ?? "--"}}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$order->total ?? "--"}}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$order->created_at->diffForHumans() ?? "--"}}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-admin-layout>