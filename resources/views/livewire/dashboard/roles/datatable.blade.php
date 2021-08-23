<div>
    @include('livewire.roles.form')

    <x-alert id='alert' class="alert-success"></x-alert>

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">{{__("Roles and Permissions")}}
                    <span class="d-block text-muted pt-2 font-size-sm">{{__("Show All")}}</span></h3>
            </div>
            <div class="card-toolbar">
                @can('create roles')
                <a href="javascript:;" class="btn btn-primary font-weight-bolder" data-toggle="modal"
                    data-target="#modal" wire:click="resetForm()">
                    <i class="la la-plus"></i>{{__("New Record")}}</a>
                @endcan
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body py-0">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
                    <thead>
                        <tr class="text-left">
                            <th class="pl-0" style="width: 30px">#</th>
                            <th wire:click="sortBy('name')" data-sort="{{$sortDirection}}">{{__("Name")}}
                                <x-sort field="name" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}"></x-sort>
                            </th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Permission') }}</th>
                            <th class="pr-0 text-left" style="min-width: 160px">{{ __('Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $role)
                        <tr>
                            <td class="pl-0 py-6">{{ $role->id }}</td>
                            <td class="pl-0">
                                <span class="d-inline-block font-weight-bolder" data-toggle="tooltip">
                                    {{$role->name }}
                                </span>
                            </td>
                            <td class="pl-0">
                                <span class="d-inline-block font-weight-bolder" data-toggle="tooltip">
                                    {{implode(',',$role->permissions->pluck('name')->toArray()) }}
                                </span>
                            </td>
                            <td class="pr-0 text-left">
                                @can('edit roles')
                                <x-edit-button data-toggle="modal" data-target="#modal"
                                    wire:click="edit({{ $role->id }})">
                                </x-edit-button>
                                @endcan
                                @can('delete roles')
                                <x-delete-record-button wire:click="confirm({{ $role->id }})"></x-delete-record-button>
                                <x-delete-modal></x-delete-modal>
                                @endcan
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

            {{ $roles->links() }}
        </div>
        <!--end::Body-->
    </div>
    <!--end::Advance Table Widget 10-->
</div>

@section('scripts')
<script src="{{ asset('dashboard/assets/js/pages/crud/forms/widgets/select2.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#permissionsIds').select2({
            placeholder: '',
        });

        $('.select2').on('change', function (e) {
                let elementName = $(this).attr('id');
                var data = $(this).select2("val");
                @this.set(elementName, data);
            });
      });

    window.livewire.on('Modal', () => {
        $('#modal').modal('hide');
    });   
   
    window.livewire.on('deleteModalOpen', () => {
        $('#deleteModal').modal('show');
    }); 
    window.livewire.on('deleteModalClose', () => {
        $('#deleteModal').modal('hide');
    });
   
</script>

@endsection