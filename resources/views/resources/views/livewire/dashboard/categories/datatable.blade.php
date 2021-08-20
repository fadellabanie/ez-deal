<div>
    <x-alert class="alert-success"></x-alert>

    <!--begin::Advance Table Widget 10-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="py-5 border-0 card-header">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">{{ __('Categories') }}</span>
                <span class="mt-3 text-muted font-weight-bold font-size-sm">{{ __('Show All') }}</span>
            </h3>
            @if(!$onlyTrashed)
            <div class="d-flex align-items-center">
                @canany(['Export Category','Import Category'])
                <x-export field='{{$categories->isEmpty()}}' export='Export Category' import='Import Category'>
                </x-export>
                @endcan
                <x-import-modal file='categories.xlsx'></x-import-modal>
            </div>
            @endif
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
                            <th class="pl-0" style="min-width: 120px">{{ __('SKU') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Products') }}</th>
                            <th class="pr-0 text-left" style="min-width: 160px">{{ __('Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr>
                            <td class="py-6 pl-0">{{ $category->id }}</td>
                            <td class="pl-0">
                                <a href="{{ route('dashboard.categories.edit', $category) }}"
                                    class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{ $category->name }}</a>
                            </td>
                            <td class="pl-0">
                                {{ $category->sku }}
                            </td>
                            <td class="pl-0">
                                {{ __('Products') }} ({{ $category->products_count }})
                            </td>
                            <td class="pr-0 text-left">
                                @if (!$onlyTrashed)
                                @can('Edit Category')
                                <x-edit-record-button href="{{ route('dashboard.categories.edit', $category) }}" />
                                @endcan
                                @can('Delete Category')
                                <x-delete-record-button wire:click="confirm({{ $category->id }})" data-toggle="modal"
                                    data-target="#deleteModal">
                                    </x-delete-modal>
                                    @endcan
                                    @else
                                    <x-restore-button wire:click="restore({{ $category->id }})">
                                    </x-restore-button>
                                    <x-delete-record-button wire:click="delete({{ $category->id }})">
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

            {{ $categories->links() }}
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