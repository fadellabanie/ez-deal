<div>
    <x-alert class="alert-success"></x-alert>

    <!--begin::Advance Table Widget 10-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">{{ __('Discounts') }}</span>
                <span class="text-muted mt-3 font-weight-bold font-size-sm">{{ __('Show All') }}</span>
            </h3>
            <div class="d-flex align-items-center">
                @canany(['Export Discounts','Import Discounts'])
                <x-export field='{{$discounts->isEmpty()}}' export='Export Discounts' import='Import Discounts'>
                </x-export>
                @endcan
                <x-import-modal file='discounts.xlsx'></x-import-modal>
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
                            <th class="pl-0" style="min-width: 120px">{{ __('Value') }}</th>
                            <th class="pr-0 text-left" style="min-width: 160px">{{ __('Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($discounts as $discount)
                        <tr>
                            <td class="pl-0 py-6">{{ $discount->id }}</td>
                            <td class="pl-0">
                                <a href="{{ route('dashboard.discounts.edit', $discount) }}"
                                    class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{ $discount->name }}</a>
                            </td>
                            <td class="pl-0">
                                {!! $discount->value_format !!}
                            </td>
                            <td class="pr-0 text-left">
                                @if (!$onlyTrashed)
                                @can('Edit Discounts')
                                <x-edit-record-button href="{{ route('dashboard.discounts.edit', $discount) }}" />
                                @endcan
                                @can('Delete Discounts')
                                <x-delete-record-button wire:click="confirm({{ $discount->id }})" data-toggle="modal"
                                    data-target="#deleteModal">
                                    </x-delete-modal>
                                    @endcan
                                    @else
                                    <x-restore-button wire:click="restore({{ $discount->id }})">
                                    </x-restore-button>
                                    <x-delete-record-button wire:click="delete({{ $discount->id }})">
                                    </x-delete-record-button>
                                    @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-danger font-size-lg">{{ __('No records found') }}
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!--end::Table-->

            {{ $discounts->links() }}
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