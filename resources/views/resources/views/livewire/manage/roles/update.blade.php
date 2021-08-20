<div>
    <!--begin::Advance Table Widget 10-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    {{ svg('Lock') }}
                </span>
                <h3 class="card-label">
                    {{ __('Roles and Permissions') }} ({{ $role->name }})
                </h3>
            </div>
            <div class="card-toolbar">
                <x-add-new-record-button href="javascript:void(0)" wire:click="createPermission">{{ __('Add new') }}</x-add-new-record-button>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
                    <thead>
                        <tr class="text-left">
                            <th class="pl-0" style="width: 30px">#</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Name') }}</th>
                            <th class="pr-0 text-left" style="min-width: 160px">{{ __('Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($permissions as $permission)
                        <tr>
                            <td class="py-6 pl-0">{{ $permission->id }}</td>
                            <td class="pl-0">
                                <a href="#"
                                    class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{ __($permission->name) }}</a>
                            </td>
                            <td class="pr-0 text-left">
                                <x-edit-record-button href="javascript:void(0)" wire:click="editPermission({{ $permission->id }})" />
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

            {{ $permissions->links() }}
        </div>
        <!--end::Body-->
    </div>
    <!--end::Advance Table Widget 10-->

    @include('livewire.manage.permissions.create')
    @include('livewire.manage.permissions.update')

    @section('vendorScripts')
        <script>
            window.addEventListener('show-create-permission-modal', event => {
                $('#createPermissionModal').modal('show')
            })

            window.addEventListener('hide-create-permission-modal', event => {
                $('#createPermissionModal').modal('hide')
            })

            window.addEventListener('show-edit-permission-modal', event => {
                $('#editPermissionModal').modal('show')
            })

            window.addEventListener('hide-edit-permission-modal', event => {
                $('#editPermissionModal').modal('hide')
            })
        </script>
    @endsection
</div>
