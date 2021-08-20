<div>
    <x-alert class="alert-success"></x-alert>

    <!--begin::Advance Table Widget 10-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">{{ __('Delay Policies') }}</span>
                <span class="text-muted mt-3 font-weight-bold font-size-sm">{{ __('Show All') }}</span>
            </h3>
            <div class="d-flex align-items-center">
                @canany(['Export Delay policies','Import Delay policies'])
                <x-export field='{{$delayPolicies->isEmpty()}}' export='Export Delay policies' import='Import Delay policies'></x-export>
                @endcan
                <x-import-modal file='delay-policies.xlsx'></x-import-modal>

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
                            <th class="pl-0" style="min-width: 120px">{{ __('Calculate after') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Discount from salary') }}</th>
                            <th class="pr-0 text-left" style="min-width: 160px">{{ __('Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($delayPolicies as $delayPolicy)
                        <tr>
                            <td class="pl-0 py-6">{{ $delayPolicy->id }}</td>
                            <td class="pl-0">
                                <a href="{{ route('dashboard.delay-policies.edit', $delayPolicy) }}"
                                    class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{ $delayPolicy->name }}</a>
                            </td>
                            <td class="pl-0">
                                {!! $delayPolicy->calculate_after_format !!}
                            </td>
                            <td class="pl-0">
                                {!! $delayPolicy->discount_from_salary_format !!}
                            </td>
                            <td class="pr-0 text-left">
                                @if (!$onlyTrashed)
                                @can('Edit Delay policies')
                                <x-edit-record-button
                                    href="{{ route('dashboard.delay-policies.edit', $delayPolicy) }}" />
                                @endcan
                                @can('Delete Delay policies')
                                <x-delete-record-button wire:click="confirm({{ $delayPolicy->id }})" data-toggle="modal"
                                    data-target="#deleteModal">
                                    </x-delete-modal>
                                    @endcan
                                    @else
                                    <x-restore-button wire:click="restore({{ $delayPolicy->id }})">
                                    </x-restore-button>
                                    <x-delete-record-button wire:click="delete({{ $delayPolicy->id }})">
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

            {{ $delayPolicies->links() }}
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