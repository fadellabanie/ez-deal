<div>
    <div class="card card-flush mt-6 mt-xl-9">

        <div class="card-header mt-5">

            <div class="card-title flex-column">
                <h3 class="fw-bolder mb-1">{{__("User")}}</h3>
                <div class="fs-6 text-gray-400">{{__("Show All")}}</div>
            </div>
           
            <div class="card-toolbar my-1">
                <div class="d-flex align-items-center position-relative my-1">
                   <x-search-input></x-search-input>
                </div>
            </div>
        </div>
     
        <div class="card-body pt-0">
                <div id="kt_profile_overview_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table id="kt_profile_overview_table"
                            class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder dataTable no-footer"
                            role="grid">
                            <thead class="fs-7 text-gray-400 text-uppercase">
                                <tr role="row">
                                    <th wire:click="sortBy('name')" data-sort="{{$sortDirection}}" class="min-w-50px">
                                        {{__("User")}}
                                        <x-sort field="name" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                        </x-sort>
                                    </th>
                                    <th wire:click="sortBy('city_id')" data-sort="{{$sortDirection}}"
                                        class="min-w-50px">
                                        {{__("City")}}
                                        <x-sort field="city_id" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                        </x-sort>
                                    </th>
                                    <th wire:click="sortBy('mobile')" data-sort="{{$sortDirection}}" class="min-w-90px">
                                        {{__("Mobile")}}
                                        <x-sort field="mobile" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                        </x-sort>
                                    </th>
                                    <th wire:click="sortBy('type')" data-sort="{{$sortDirection}}" class="min-w-90px">
                                        {{__("Type")}}
                                        <x-sort field="type" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                        </x-sort>
                                    </th>
                                    <th wire:click="sortBy('created_at')" data-sort="{{$sortDirection}}"
                                        class="min-w-90px">
                                        {{__("Regester")}}
                                        <x-sort field="created_at" sortBy="{{$sortBy}}"
                                            sortDirection="{{$sortDirection}}">
                                        </x-sort>
                                    </th>
                                    <th class="min-w-50px text-end" style="width: 87.075px;">{{__("Action")}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="fs-6">
                                @forelse($users as $key => $user)
                                <tr wire:loading.class="opacity-50">
                                    <td class="sorting_1">
                                        <div class="d-flex align-items-center">
                                            <div class="me-5 position-relative">
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="{{asset($user->avatar)}}">
                                                </div>
                                                <div
                                                    class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href=""
                                                    class="fs-6 text-gray-800 text-hover-primary">{{$user->name}}</a>
                                                <div class="fw-bold text-gray-400">{{$user->email}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$user->city->en_name ?? ""}}</td>
                                    <td>{{$user->mobile}}</td>
                                    <td>{!!userType($user->type)!!}</td>
                                    <td>{{$user->created_at->format('m-d-Y')}}</td>
                                    <td>
                                        <div class="d-flex justify-content-end flex-shrink-0">
                                           
                                            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path>
                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                           <x-delete-record-button wire:click="confirm({{ $user->id }})"></x-delete-record-button>
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
                            {{$users->links()}}
                        </div>
                    </div>
                </div>
                <!--end::Table-->
           
            <!--end::Table container-->
        </div>
        <!--end::Card body-->
    </div>

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