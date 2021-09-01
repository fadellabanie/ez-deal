<div>
    <x-alert id='alert' class="alert-success"></x-alert>
    <div class="card card-flush mt-6 mt-xl-9">

        <div class="card-header mt-5">

            <div class="card-title flex-column">
                <h3 class="fw-bolder mb-1">{{__("Orders")}}</h3>
                <div class="fs-6 text-gray-400">{{__("Show All")}}</div>
            </div>

            <div class="card-toolbar my-1">
                <div class="me-6 my-1">
                    <x-status></x-status>
                </div> 
                <div class="me-6 my-1">
                    <x-city></x-city>
                </div> 
                <div class="me-6 my-1">
                    <x-contract-type></x-contract-type>
                </div> 
                 <div class="me-6 my-1">
                    <x-realestate-type></x-realestate-type>
                </div>
                <div class="d-flex align-items-center position-relative my-1">
                    <x-search-input></x-search-input>
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
                                <th wire:click="sortBy('name')" data-sort="{{$sortDirection}}" class="min-w-50px">
                                    {{__("User")}}
                                    <x-sort field="name" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('user_id')" data-sort="{{$sortDirection}}" class="min-w-50px">
                                    {{__("User")}}
                                    <x-sort field="user_id" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('contract_type_id')" data-sort="{{$sortDirection}}"
                                    class="min-w-90px">
                                    {{__("Contract Type")}}
                                    <x-sort field="contract_type_id" sortBy="{{$sortBy}}"
                                        sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('realestate_type_id')" data-sort="{{$sortDirection}}"
                                    class="min-w-90px">
                                    {{__("Realestate Type")}}
                                    <x-sort field="realestate_type_id" sortBy="{{$sortBy}}"
                                        sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('is_active')" data-sort="{{$sortDirection}}" class="min-w-90px">
                                    {{__("Status")}}
                                    <x-sort field="is_active" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
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
                            @forelse($orders as $key => $order)
                            <tr wire:loading.class="opacity-50">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="{{route('admin.orders.show',$order)}}"
                                                class="text-dark fw-bolder text-hover-primary fs-6">{{$order->name}}</a>
                                            <span
                                                class="text-muted fw-bold text-muted d-block fs-7">{{$order->city->en_name}}</span>
                                        </div>
                                    </div>
                                </td>


                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="{{route('admin.users.show',$order->user)}}"
                                                class="text-dark fw-bolder text-hover-primary fs-6">{{$order->user->name}}</a>
                                            <span
                                                class="text-muted fw-bold text-muted d-block fs-7">{{$order->user->mobile}}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$order->contractType->name}}</td>
                                <td>{{$order->realestateType->name}}</td>
                                <td wire:click="changeActive({{$order->id}})">{!!isActive($order->is_active)!!}</td>
                                <td>{{$order->created_at->format('m-d-Y')}}</td>
                                <td>
                                    <div class="d-flex justify-content-end flex-shrink-0">
                                        
                                        <x-edit-button href="{{route('admin.orders.edit',$order)}}"></x-edit-button>

                                        <x-delete-record-button wire:click="confirm({{ $order->id }})">
                                        </x-delete-record-button>
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
                        {{$orders->links()}}
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