<div>
    <x-alert class="alert-success"></x-alert>

    <!--begin::Advance Table Widget 10-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">{{ __('Products') }}</span>
                <span class="text-muted mt-3 font-weight-bold font-size-sm">{{ __('Show All') }}</span>
            </h3>
            <div class="d-flex align-items-center">
                @canany(['Export Products','Import Products'])
                <x-export field='{{$products->isEmpty()}}' export='Export Products' import='Import Products'>
                </x-export>
                @endcan   
                <x-import-modal file='products.xlsx'></x-import-modal>
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
                            <th class="pl-0" style="min-width: 120px">{{ __('Category') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Sizes') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Modifiers') }}</th>
                            <th class="pr-0 text-left" style="min-width: 160px">{{ __('Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td class="pl-0 py-6">{{ $product->id }}</td>
                            <td class="pl-0">
                                <a href="{{ route('dashboard.products.edit', $product) }}"
                                    class="text-dark-75 font-weight-bolder text-hover Primary font-size-lg">{{ $product->name }}</a>
                            </td>
                            <td class="pl-0">
                                {{ $product->sku }}
                            </td>
                            <td class="pl-0">
                                {{ $product->category->name }}
                            </td>
                            <td class="pl-0">
                                {{ __('Sizes') }} ({{ $product->product_sizes_count }})
                            </td>
                            <td class="pl-0">
                                {{ __('Modifiers') }} ({{ $product->product_modifiers_count }})
                            </td>
                            <td class="pr-0 text-left">
                                <a href="{{ route('dashboard.products.items.index', $product) }}"
                                    class="btn btn-light btn-text Primary btn-hover-text Primary font-weight-bold btn-sm">{{ __('Ingredients') }}</a>
                                @if (!$onlyTrashed)
                                @can('Edit Products')
                                <x-edit-record-button href="{{ route('dashboard.products.edit', $product) }}" />
                                @endcan
                                @can('Delete Products')
                                <x-delete-record-button wire:click="confirm({{ $product->id }})" data-toggle="modal"
                                    data-target="#deleteModal">
                                    </x-delete-modal>
                                    @endcan

                                    @else
                                    <x-restore-button wire:click="restore({{ $product->id }})">
                                    </x-restore-button>
                                    <x-delete-record-button wire:click="delete({{ $product->id }})">
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

            {{ $products->links() }}
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