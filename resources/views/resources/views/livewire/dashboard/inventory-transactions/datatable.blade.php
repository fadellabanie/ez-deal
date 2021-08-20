<div>
    <x-alert class="alert-success"></x-alert>

    <!--begin::Advance Table Widget 10-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="py-5 border-0 card-header">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">{{ __('Inventory Transactions') }}</span>
                <span class="mt-3 text-muted font-weight-bold font-size-sm">{{ __('Show All') }}</span>
            </h3>
            <div class="d-flex align-items-center">
                @canany(['Export Inventory process','Import Inventory process'])
                <x-export field='{{$inventoryTransactions->isEmpty()}}' export='Export Inventory process'
                    import='Import Inventory process'>
                </x-export>
                @endcan
                <x-import-modal file='inventory-transactions.xlsx'></x-import-modal>
            </div>
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
                            <th class="pl-0" style="min-width: 120px">{{ __('Business Date') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Supplier') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Status') }}</th>
                            <th class="pr-0 text-left" style="min-width: 160px">{{ __('Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($inventoryTransactions as $inventoryTransaction)
                        <tr>
                            <td class="py-6 pl-0">{{ $inventoryTransaction->id }}</td>
                            <td class="pl-0">
                                {{ $inventoryTransaction->business_date->format('Y-m-d') }}
                            </td>
                            <td class="pl-0">
                                {{ $inventoryTransaction->supplier->name ?? "" }}
                            </td>
                            <td class="pl-0">
                                {{ __(Str::ucfirst($inventoryTransaction->status)) }}
                            </td>
                            <td class="pr-0 text-left">
                                @if (!$onlyTrashed)
                                @can('Edit Inventory process')
                                <x-edit-record-button
                                    href="{{ route('dashboard.inventory-transactions.edit', $inventoryTransaction) }}" />
                                @endcan
                                @can('Delete Inventory process')

                                <x-delete-record-button wire:click="confirm({{ $inventoryTransaction->id }})"
                                    data-toggle="modal" data-target="#deleteModal">
                                    </x-delete-modal>
                                @endcan

                                    @else
                                    <x-restore-button wire:click="restore({{ $inventoryTransaction->id }})">
                                    </x-restore-button>
                                    <x-delete-record-button wire:click="delete({{ $inventoryTransaction->id }})">
                                    </x-delete-record-button> 
                                    @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-danger font-size-lg">{{ __('No records found') }}
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!--end::Table-->

            {{ $inventoryTransactions->links() }}
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