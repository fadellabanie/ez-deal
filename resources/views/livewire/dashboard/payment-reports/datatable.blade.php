<div>
    <x-alert id='alert' class="alert-success"></x-alert>
    <div class="card card-flush mt-6 mt-xl-9">

        <div class="card-header mt-5">

            <div class="card-title flex-column">
                <h3 class="fw-bolder mb-1">{{__("Payment Reports")}}</h3>
                <div class="fs-6 text-gray-400">{{__("Show All")}}</div>
            </div>

            <div class="card-toolbar my-1">
                <div class="me-6 my-1">
                    <x-status></x-status>
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
                            <tr>
                                <th wire:click="sortBy('id')" data-sort="{{$sortDirection}}">{{__("#")}}
                                    <x-sort field="id" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}"></x-sort>
                                </th>
                                <th wire:click="sortBy('package_id')" data-sort="{{$sortDirection}}">
                                    {{__("package")}}
                                    <x-sort field="package_id" sortBy="{{$sortBy}}"
                                        sortDirection="{{$sortDirection}}"></x-sort>
                                </th>
                                <th wire:click="sortBy('user_id')" data-sort="{{$sortDirection}}">{{__("user_id")}}
                                    <x-sort field="user_id" sortBy="{{$sortBy}}"
                                        sortDirection="{{$sortDirection}}"></x-sort>
                                </th>
                                <th wire:click="sortBy('amt')" data-sort="{{$sortDirection}}">{{__("Amount")}}
                                    <x-sort field="amount" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('track_id')" data-sort="{{$sortDirection}}">{{__("Track ID")}}
                                    <x-sort field="track_id" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('trans_id')" data-sort="{{$sortDirection}}">{{__("Trans ID")}}
                                    <x-sort field="trans_id" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('card_type')" data-sort="{{$sortDirection}}">{{__("Card Type")}}
                                    <x-sort field="card_type" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('result')" data-sort="{{$sortDirection}}">{{__("Result")}}
                                    <x-sort field="result" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('ref')" data-sort="{{$sortDirection}}">{{__("Ref")}}
                                    <x-sort field="ref" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('created_at')" data-sort="{{$sortDirection}}">{{__("Created")}}
                                    <x-sort field="created_at" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                            
                            </tr>

                        </thead>
                        <tbody class="fs-6">
                            @forelse($reports as $key => $report)
                            <tr wire:loading.class="opacity-50">
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    <span class="d-inline-block" data-toggle="tooltip">
                                        {{$report->package->en_name}}
                                    </span>
                                </td>
                                <td>
                                    <span class="d-inline-block" data-toggle="tooltip">
                                        <a href="{{route('admin.users.show',$report->user->id ?? 0)}}"
                                            target="_blank">{{ $report->user->name ?? __("User") }}</a>
                                    </span>
                                </td>
                                <td>
                                    <span class="d-inline-block" data-toggle="tooltip">
                                        {{$report->amount}}
                                    </span>
                                </td>
                                <td>
                                    <span class="d-inline-block" data-toggle="tooltip">
                                        {{$report->track_id}}
                                    </span>
                                </td>             
                                <td>
                                    <span class="d-inline-block" data-toggle="tooltip">
                                        {{$report->trans_id}}
                                    </span>
                                </td>
                                <td>
                                    <span class="d-inline-block" data-toggle="tooltip">
                                        {{$report->card_type}}
                                    </span>
                                </td>
                                <td>
                                    <span class="d-inline-block" data-toggle="tooltip">
                                        {{$report->result}}
                                    </span>
                                </td>
                                <td>
                                    <span class="d-inline-block" data-toggle="tooltip">
                                        {{$report->ref}}
                                    </span>
                                </td>
                                <td>
                                    <span class="d-inline-block" data-toggle="tooltip">
                                        {{$report->created_at}}
                                    </span>
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
                        {{$reports->links()}}
                    </div>
                </div>
            </div>
            <!--end::Table-->

            <!--end::Table container-->
        </div>
        <!--end::Card body-->
    </div>
</div>