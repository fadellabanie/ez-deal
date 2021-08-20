<div>
    <x-alert class="alert-success"></x-alert>

    <!--begin::Advance Table Widget 10-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">{{ __('Inventory Items') }}</span>
                <span class="text-muted mt-3 font-weight-bold font-size-sm">{{ __('Show All') }}</span>
            </h3>
            <div class="d-flex align-items-center">
                @canany(['Export Item inventory','Import Item inventory'])
                <x-export field='{{$inventoryItems->isEmpty()}}' export='Export Item inventory' import='Import Item inventory'>
                </x-export>
                @endcan
                <x-import-modal file='inventory-items.xlsx'></x-import-modal>
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
                            <th class="pl-0" style="min-width: 120px">{{ __('SKU') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Barcode') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Tags') }}</th>
                            <th class="pr-0 text-left" style="min-width: 160px">{{ __('Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($inventoryItems as $inventoryItem)
                        <tr>
                            <td class="pl-0 py-6">{{ $inventoryItem->id }}</td>
                            <td class="pl-0">
                                <a href="{{ route('dashboard.tags.edit', $inventoryItem) }}"
                                    class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{ $inventoryItem->name }}</a>
                            </td>
                            <td class="pl-0">
                                {{ $inventoryItem->sku }}
                            </td>
                            <td class="pl-0">
                                {{ $inventoryItem->barcode }}
                            </td>
                            <td class="pl-0">
                                @foreach ($inventoryItem->tags as $tag)
                                <span class="label label-warning label-pill label-inline mr-2">{{ $tag->name }}</span>
                                @endforeach
                            </td>
                            <td class="pr-0 text-left">
                                @if (!$onlyTrashed)
                                @can('Edit Item inventory')

                                <x-edit-record-button
                                    href="{{ route('dashboard.inventory-items.edit', $inventoryItem) }}" />
                                @endcan
                                @can('Delete Item inventory')

                                    <x-delete-record-button wire:click="confirm({{ $inventoryItem->id }})"
                                    data-toggle="modal" data-target="#deleteModal">
                                    </x-delete-modal>
                                    @endcan
                                    @else
                                    <x-restore-button wire:click="restore({{ $inventoryItem->id }})">
                                    </x-restore-button>
                                    <x-delete-record-button wire:click="delete({{ $inventoryItem->id }})">
                                    </x-delete-record-button>
                                    @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-danger font-size-lg">{{ __('No records found') }}
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!--end::Table-->

            {{ $inventoryItems->links() }}
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