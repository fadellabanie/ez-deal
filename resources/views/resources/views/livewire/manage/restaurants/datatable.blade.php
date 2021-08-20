<div>
        <x-alert class="alert-success"></x-alert>

    <!--begin::Advance Table Widget 10-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="py-5 border-0 card-header">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">{{ __('Restaurants') }}</span>
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
                            <th class="pl-0" style="min-width: 120px">{{ __('Account Number') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Registered At') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Subscription End Date') }}</th>
                            <th class="pr-0 text-left" style="min-width: 160px">{{ __('Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($restaurants as $restaurant)
                        <tr>
                            <td class="py-6 pl-0">{{ $restaurant->id }}</td>
                            <td class="pl-0">
                                <a href="{{ route('manage.restaurants.edit', $restaurant) }}"
                                    class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{ $restaurant->name }}</a>
                            </td>
                            <td class="pl-0">
                                {{ $restaurant->account_number }}
                            </td>
                            <td class="pl-0">
                                {{ Carbon\Carbon::parse($restaurant->registered_at)->format('Y M d')}}
                            </td>
                            <td class="pl-0">
                                {{ Carbon\Carbon::parse($restaurant->subscription_end_date)->format('Y M d') }}
                            </td>
                            <td class="pr-0 text-left">
                                <x-edit-record-button href="{{ route('manage.restaurants.edit', $restaurant) }}" />
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-danger font-size-lg">{{ __('No records found') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!--end::Table-->

            {{ $restaurants->links() }}
        </div>
        <!--end::Body-->
    </div>
    <!--end::Advance Table Widget 10-->
</div>