<div>
    <div class="card card-custom mt-5">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    {{ svg('Layout-left-panel-2') }}
                </span>
                <h3 class="card-label">
                    {{ __('Product Sizes') }}
                </h3>
            </div>
           
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
                    <thead>
                        <tr class="text-left">
                            <th class="pl-0" style="min-width: 120px">{{ __('Name') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('SKU') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Price') }}</th>
                            <th class="pr-0 text-left" style="min-width: 160px">{{ __('Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sizes as $size)
                            <tr>
                                <td class="pl-0">
                                    {{ $size->name }}
                                </td>
                                <td class="pl-0">
                                    {{ $size->sku }}
                                </td>
                                <td class="pl-0">
                                    {{ $size->price }}
                                </td>
                                <td class="pr-0 text-left">
                                  
                                    <x-restore-button wire:click="restore({{ $size->id }})"> </x-restore-button>
                                    <x-delete-record-button wire:click="delete({{ $size->id }})"> </x-delete-record-button>
                                   </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-danger font-size-lg">{{ __('No records found') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
