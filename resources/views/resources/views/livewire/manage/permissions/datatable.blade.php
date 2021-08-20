<div>
    @section('vendorStyles')
        <link rel="stylesheet" href="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.rtl.css') }}">
    @endsection

    <div wire:loading wire:target='create, edit, applyFilters'>
        <div class="d-flex justify-content-center align-items-center w-100 h-100"
            style="background-color: black; position: fixed; top: 0px; left: 0px; z-index: 9999; opacity: 0.75;">
            <svg width="38" height="38" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" stroke="#fff">
                <g fill="none" fill-rule="evenodd">
                    <g transform="translate(1 1)" stroke-width="2">
                        <circle stroke-opacity=".5" cx="18" cy="18" r="18" />
                        <path d="M36 18c0-9.94-8.06-18-18-18">
                            <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1s"
                                repeatCount="indefinite" />
                        </path>
                    </g>
                </g>
            </svg>
        </div>
    </div>

    <x-slot name="header">
        <!--begin::Subheader-->
        <div class="py-2 subheader py-lg-6 subheader-solid" id="kt_subheader">
            <div class="flex-wrap container-fluid d-flex align-items-center justify-content-between flex-sm-nowrap">
                <!--begin::Info-->
                <div class="flex-wrap mr-1 d-flex align-items-center">
                    <!--begin::Page Heading-->
                    <div class="flex-wrap mr-5 d-flex align-items-baseline">
                        <!--begin::Page Title-->
                        <h5 class="my-1 mr-5 text-dark font-weight-bold">{{ __('Permissions') }}</h5>
                        <!--end::Page Title-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">

                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->
    </x-slot>

    <!--begin::Advance Table Widget 10-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="py-5 border-0 card-header">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">{{ __('Permissions') }}</span>
                <span class="mt-3 text-muted font-weight-bold font-size-sm">{{ __('Show All') }}</span>
            </h3>
            <div class="card-toolbar">
                <x-add-new-record-button href="javascript:void(0)" wire:click="create">{{ __('Add new') }}</x-add-new-record-button>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="py-0 card-body">
            <!--begin::Search-->
            <form class="mb-15">
                <div class="mb-6 row">
                    <div class="mb-6 col-lg-3 mb-lg-0">
                        <label>{{ __('Roles') }}</label>
                        <select class="form-control datatable-input" data-col-index="1" wire:model.defer="rolesFilter">
                            <option value="all">{{ __('All') }}</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ __($role->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-8 row">
                    <div class="col-lg-12">
                        <button type="button" class="mr-1 btn btn-primary btn-primary--icon" wire:click='applyFilters'>
                            <span>
                                <i class="la la-search"></i>
                                <span>{{ __('Search') }}</span>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
            <!--end::Search-->
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
                            <td class="py-6 pl-0">{{ $loop->iteration }}</td>
                            <td class="pl-0">
                                <a href="javascript:void(0)" wire:click="edit({{ $permission->id }})"
                                    class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{ $permission->name }}</a>
                            </td>
                            <td class="pr-0 text-left">
                                <x-edit-record-button href="javascript:void(0)" wire:click="edit({{ $permission->id }})" />
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
        </div>
        <!--end::Body-->
    </div>
    <!--end::Advance Table Widget 10-->

    <!--begin::Create Permission-->
    <div wire:ignore.self class="modal fade" id="createPermissionModal" tabindex="-1" role="dialog"
        aria-labelledby="createPermissionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form class="form" id="kt_form2">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createPermissionModalLabel">{{ __('New Permission') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Name') }}</x-label>
                            <x-input wire:model.defer="name" field='name' />
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group row @error('permissionRoles') validated @enderror">
                            <label class="text-left col-form-label col-3 text-lg-right">{{ __('Roles') }}</label>
                            <div class="col-9">
                                @foreach($roles as $role)
                                <div class="mb-2 checkbox-inline">
                                    <label class="checkbox">
                                        <input type="checkbox" value="{{ $role->id }}" wire:model.defer="permissionRoles">
                                        <span></span>{{ __($role->name) }}</label>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-9 offset-md-3">
                                @error('permissionRoles')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="mr-2 btn btn-primary btn-sm" wire:click.prevent="store"
                            wire:loading.attr="disabled"
                            wire:loading.class="spinner spinner-white spinner-left">{{ __('Save') }}</button>
                        <button type="button" class="btn btn-secondary btn-sm"
                            data-dismiss="modal">{{ __('Close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Create Permission-->

    <!--begin::Update Permission-->
    <div>
        <div wire:ignore.self class="modal fade" id="editPermissionModal" tabindex="-1" role="dialog"
            aria-labelledby="editPermissionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form class="form" id="kt_form2">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editPermissionModalLabel">{{ __('Edit Permission') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!--begin::Group-->
                            <div class="form-group row">
                                <x-label>{{ __('Name') }}</x-label>
                                <x-input wire:model.defer="name" field='name' />
                            </div>
                            <!--end::Group-->

                            <!--begin::Group-->
                            <div class="form-group row @error('permissionRoles') validated @enderror">
                                <label class="text-left col-form-label col-3 text-lg-right">{{ __('Roles') }}</label>
                                <div class="col-9">
                                    @foreach($roles as $role)
                                    <div class="mb-2 checkbox-inline">
                                        <label class="checkbox">
                                            <input type="checkbox" value="{{ $role->id }}" wire:model.defer="permissionRoles">
                                            <span></span>{{ __($role->name) }}</label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-9 offset-md-3">
                                    @error('permissionRoles')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Group-->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="mr-2 btn btn-primary btn-sm" wire:click.prevent="update"
                                wire:loading.attr="disabled"
                                wire:loading.class="spinner spinner-white spinner-left">{{ __('Save') }}</button>
                            <button type="button" class="btn btn-secondary btn-sm"
                                data-dismiss="modal">{{ __('Close') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end::Update Permission-->

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