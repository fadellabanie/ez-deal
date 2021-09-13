<div>
    <x-alert id='alert' class="alert-success"></x-alert>
    <div class="card card-flush mt-6 mt-xl-9">

        <div class="card-header mt-5">

            <div class="card-title flex-column">
                <h3 class="fw-bolder mb-1">{{__("Attributes")}}</h3>
                <div class="fs-6 text-gray-400">{{__("Show All")}}</div>
            </div>

            <div class="card-toolbar my-1">
                <div class="d-flex align-items-center position-relative my-1">
                    <x-search-input></x-search-input>
                </div>
                <div class="me-6 my-1">
                    @can('export attributes')
                    <x-export-button></x-export-button>
                    @endcan
                </div>
            </div>
        </div>

        <div class="card-body pt-0">
            <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table
                        class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder dataTable no-footer"
                        role="grid">
                        <thead class="fs-7 text-gray-400 text-uppercase">
                            <tr role="row">
                                <th wire:click="sortBy('id')" data-sort="{{$sortDirection}}">{{__("#")}}
                                    <x-sort field="id" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}"></x-sort>
                                </th>
                                <th wire:click="sortBy('en_name')" data-sort="{{$sortDirection}}" class="min-w-50px">
                                    {{__("Name")}}
                                    <x-sort field="name" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('en_description')" data-sort="{{$sortDirection}}"
                                    class="min-w-50px">
                                    {{__("Description")}}
                                    <x-sort field="en_description" sortBy="{{$sortBy}}"
                                        sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('price')" data-sort="{{$sortDirection}}" class="min-w-90px">
                                    {{__("Price")}}
                                    <x-sort field="price" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('count')" data-sort="{{$sortDirection}}" class="min-w-90px">
                                    {{__("Count")}}
                                    <x-sort field="count" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('status')" data-sort="{{$sortDirection}}" class="min-w-90px">
                                    {{__("status")}}
                                    <x-sort field="status" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>

                                <th wire:click="sortBy('created_at')" data-sort="{{$sortDirection}}" class="min-w-90px">
                                    {{__("Regester")}}
                                    <x-sort field="created_at" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th class="min-w-50px text-end" style="width: 87.075px;">{{__("Action")}}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="fs-6">
                            @forelse($attributes as $key => $attribute)
                            <tr wire:loading.class="opacity-50">
                                <td>{{$loop->iteration}}</td>

                                <td>{{$attribute->en_name}}</td>
                                <td>{{$attribute->en_description}}</td>
                                <td>{{$attribute->price}}</td>
                                <td>{{$attribute->count}}</td>
                                <td>{!!isActive($attribute->status)!!}</td>

                                <td>{{$attribute->created_at->format('m-d-Y')}}</td>
                                <td>
                                    <div class="d-flex justify-content-end flex-shrink-0">
                                        @can('edit attributes')
                                        <x-edit-button href="{{route('admin.attributes.edit',$attribute)}}" />
                                        @endcan
                                        @can('delete attributes')
                                        <x-delete-record-button wire:click="confirm({{ $attribute->id }})" />
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-danger font-size-lg">
                                    {{ __('No records found') }}
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div
                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                    </div>
                    <div
                        class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                        {{$attributes->links()}}
                    </div>
                </div>
            </div>
            <!--end::Table-->

            <!--end::Table container-->
        </div>
        <!--end::Card body-->
    </div>
    <x-delete-modal></x-delete-modal>
</div>

@section('scripts')

<script type="text/javascript">
    window.livewire.on('openDeleteModal', () => {
        $('#deleteModal').modal('show');
    }); 
    window.livewire.on('closeDeleteModal', () => {
        $('#deleteModal').modal('hide');
    });
</script>
@endsection