<div>
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">{{ __('Sizes') }}</span>
            </h3>
            @can('Activate menu')
            <div class="card-toolbar">
                <button type="button" class="btn btn-info btn-sm mr-2" wire:click.prevent="submit" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left">{{ __('Save') }}</button>
            </div>
            @endcan
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-0">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
                    <thead>
                        <tr class="text-left">
                            <th class="pl-0" style="width: 30px">
                            </th>
                            <th class="pl-5" style="min-width: 120px;">{{ __('Name') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($sizes as $key => $size)
                        <tr>
                            <td class="pl-0 py-6">
                                <label class="checkbox checkbox-lg checkbox-inline">
                                    <input type="checkbox" wire:model="selectedSizes" value="{{ $size->id }}">
                                    <span></span>
                                </label>
                            </td>
                            <td class="pl-5">
                                <span class="text-dark-75 font-weight-bolder font-size-lg">{{ $size->name }}</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Body-->
    </div>
</div>
