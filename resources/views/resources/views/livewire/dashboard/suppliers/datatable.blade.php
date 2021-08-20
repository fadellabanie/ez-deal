<div>
    <x-alert class="alert Success"></x-alert>

    <!--begin::Advance Table Widget 10-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="py-5 border-0 card-header">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">{{ __('Suppliers') }}</span>
                <span class="mt-3 text-muted font-weight-bold font-size-sm">{{ __('Show All') }}</span>
            </h3>
            <div class="d-flex align-items-center">
                @canany(['Export Suppliers','Import Suppliers'])
                <x-export field='{{$suppliers->isEmpty()}}' export='Export Suppliers' import='Import Suppliers'>
                </x-export>
                @endcan   
                <x-import-modal file='suppliers.xlsx'></x-import-modal>
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
                            <th class="pl-0" style="min-width: 120px">{{ __('Name') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Code') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Contact Name') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Email') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Phone') }}</th>
                            <th class="pr-0 text-left" style="min-width: 160px">{{ __('Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($suppliers as $supplier)
                        <tr>
                            <td class="py-6 pl-0">
                                {{ $supplier->id }}
                            </td>
                            <td class="pl-0">
                                <a href="{{ route('dashboard.suppliers.edit', $supplier) }}"
                                    class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{ $supplier->name }}</a>
                            </td>
                            <td class="pl-0">
                                {{ $supplier->code }}
                            </td>
                            <td class="pl-0">
                                {{ $supplier->contact_name }}
                            </td>
                            <td class="pl-0">
                                {{ $supplier->email }}
                            </td>
                            <td class="pl-0">
                                {{ $supplier->phone }}
                            </td>
                            <td class="pr-0 text-left">
                                @if (!$onlyTrashed)
                                @can('Edit Suppliers')

                                <x-edit-record-button href="{{ route('dashboard.suppliers.edit', $supplier) }}" />
                                @endcan
                                @can('Delete Suppliers')

                                <x-delete-record-button wire:click="confirm({{ $supplier->id }})" data-toggle="modal"
                                    data-target="#deleteModal">
                                    </x-delete-modal>
                                    @endcan
                                    @else
                                    <x-restore-button wire:click="restore({{ $supplier->id }})"> </x-restore-button>
                                    <x-delete-record-button wire:click="delete({{ $supplier->id }})">
                                    </x-delete-record-button>
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

            {{ $suppliers->links() }}
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