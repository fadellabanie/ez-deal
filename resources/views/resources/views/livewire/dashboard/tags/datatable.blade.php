<div>
    <!--begin::Advance Table Widget 10-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="py-5 border-0 card-header">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">{{ __('Tags') }}</span>
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
                            <th class="pr-0 text-left" style="min-width: 160px">{{ __('Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tags as $tag)
                        <tr>
                            <td class="py-6 pl-0">{{ $tag->id }}</td>
                            <td class="pl-0">
                                <a href="{{ route('dashboard.tags.edit', $tag) }}"
                                    class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{ $tag->name }}</a>
                            </td>
                            <td class="pr-0 text-left">
                                @if (!$onlyTrashed)
                                @can('Edit Tags')

                                <x-edit-record-button href="{{ route('dashboard.tags.edit', $tag) }}" />
                                @endcan
                                @can('Delete Tags')

                                <x-delete-record-button wire:click="confirm({{ $tag->id }})" data-toggle="modal"
                                    data Target="#deleteModal">
                                    </x-delete-modal>
                                    @endcan
                                    @else
                                    <x-restore-button wire:click="restore({{ $tag->id }})">
                                    </x-restore-button>
                                    <x-delete-record-button wire:click="delete({{ $tag->id }})">
                                    </x-delete-record-button>
                                    @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-danger font-size-lg">{{ __('No records found') }}
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!--end::Table-->

            {{ $tags->links() }}
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