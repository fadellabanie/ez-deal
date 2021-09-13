<div>
    <x-alert id='alert' class="alert-success"></x-alert>
    <div class="card card-flush mt-6 mt-xl-9">

        <div class="card-header mt-5">
            <div class="card-title flex-column">
                <h3 class="fw-bolder mb-1">{{__("Stories")}}</h3>
                <div class="fs-6 text-gray-400">{{__("Show All")}}</div>
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
                                <th class="min-w-90px">  {{__("Image")}}</th> 

                                <th wire:click="sortBy('title')" data-sort="{{$sortDirection}}" class="min-w-50px">
                                    {{__("Title")}}
                                    <x-sort field="title" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('user_id')" data-sort="{{$sortDirection}}" class="min-w-50px">
                                    {{__("User")}}
                                    <x-sort field="user_id" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('city_id')" data-sort="{{$sortDirection}}" class="min-w-50px">
                                    {{__("City")}}
                                    <x-sort field="city_id" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th> 
                                <th wire:click="sortBy('country_id')" data-sort="{{$sortDirection}}" class="min-w-50px">
                                    {{__("Country")}}
                                    <x-sort field="country_id" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('start_date')" data-sort="{{$sortDirection}}"
                                    class="min-w-90px">
                                    {{__("Start Date")}}
                                    <x-sort field="start_date" sortBy="{{$sortBy}}"
                                        sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('end_date')" data-sort="{{$sortDirection}}" class="min-w-90px">
                                    {{__("End Date")}}
                                    <x-sort field="end_date" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th> <th wire:click="sortBy('status')" data-sort="{{$sortDirection}}" class="min-w-90px">
                                    {{__("Status")}}
                                    <x-sort field="status" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th class="min-w-50px text-end" style="width: 87.075px;">{{__("Action")}}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="fs-6">
                            @forelse($stories as $key => $story)
                            <tr wire:loading.class="opacity-50">
                                <td>{{$loop->iteration}}</td>

                                <td>
                                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px">
                                        <img src="{{asset($story->image)}}">
                                    </div>
                                </td>
                                <td>{{$story->title}}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="{{route('admin.users.show',$story->user_id)}}"
                                                class="text-dark fw-bolder text-hover-primary fs-6">{{$story->user->name ?? ""}}</a>
                                            <span
                                                class="text-muted fw-bold text-muted d-block fs-7">{{$story->user->mobile ?? ""}}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$story->city->en_name}}</td>
                                <td>{{$story->country->en_name}}</td>
                              
                                <td>{{$story->start_date}}</td>
                                <td>{{$story->end_date}}</td>
                                <td>{!!isActive($story->status)!!}</td>
                                <td>
                                    <div class="d-flex justify-content-end flex-shrink-0">
                                        @can('edit stories')
                                        <x-edit-button href="{{route('admin.stories.edit',$story)}}"/>
                                        @endcan
                                        @can('delete stories')
                                        <x-delete-record-button wire:click="confirm({{ $story->id }})"/>
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
                        {{$stories->links()}}
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