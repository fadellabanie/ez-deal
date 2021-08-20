<div>
    <x-alert class="alert-success"></x-alert>

    <!--begin::Advance Table Widget 10-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">{{ __('Payment Methods') }}</span>
                <span class="text-muted mt-3 font-weight-bold font-size-sm">{{ __('Show All') }}</span>
            </h3>
            <div class="d-flex align-items-center">
                @canany(['Export Payment method','Import Payment method'])
                <x-export field='{{$paymentMethods->isEmpty()}}' export='Export Payment method'
                    import='Import Payment method'>
                </x-export>
                @endcan
                <x-import-modal file='payment-methods.xlsx'></x-import-modal>

            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-0">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
                    <thead>
                        <tr class="text-left">
                            <th class="pl-0" style="width: 30px">#</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Name') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Code') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Type') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Auto open cash drawer') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Active') }}</th>
                            <th class="pr-0 text-left" style="min-width: 160px">{{ __('Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($paymentMethods as $paymentMethod)
                        <tr>
                            <td class="pl-0 py-6">{{ $paymentMethod->id }}</td>
                            <td class="pl-0">
                                @if($paymentMethod->type != 'Cash')
                                <a href="{{ route('dashboard.payment-methods.edit', $paymentMethod) }}"
                                    class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{ $paymentMethod->name }}</a>
                                @else
                                <span
                                    class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{ $paymentMethod->name }}</span>
                                @endif
                            </td>
                            <td class="pl-0">
                                {{ $paymentMethod->code }}
                            </td>
                            <td class="pl-0">
                                {{ __($paymentMethod->type) }}
                            </td>
                            <td class="pl-0">
                                {!! $paymentMethod->cash_drawer_status !!}
                            </td>
                            <td class="pl-0">
                                {!! $paymentMethod->status !!}
                            </td>
                            <td class="pr-0 text-left">
                                @if($paymentMethod->type != 'Cash')
                                @can('Edit Payment method')

                                <x-edit-record-button
                                    href="{{ route('dashboard.payment-methods.edit', $paymentMethod) }}" />
                                @endcan
                                @can('Delete Payment method')

                                <x-delete-record-button wire:click="confirm({{ $paymentMethod->id }})">
                                    </x-delete-modal>
                                    @endcan
                                    @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-danger font-size-lg">{{ __('No records found') }}
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!--end::Table-->

            {{ $paymentMethods->links() }}
        </div>
        <!--end::Body-->
    </div>
    <!--end::Advance Table Widget 10-->
    <x-delete-modal></x-delete-modal>
</div>

@section('scripts')

<script type="text/javascript">
    window.livewire.on('openDeleteModal', () => {
        $('#deleteModal').modal('show');
    });
</script>
@endsection