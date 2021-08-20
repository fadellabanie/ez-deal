
<div>
    <x-alert class="alert-success"></x-alert>

    <x-loader />

    <div class="card card-custom">
        <!--begin::Card header-->
        <div class="card-header card-header-tabs-line nav-tabs-line-3x">
            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                    <!--begin::Item-->
                    <li class="mr-3 nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
                            <span class="nav-icon">
                                <span class="svg-icon">
                                    {{ svg('Layers') }}
                                </span>
                            </span>
                            <span class="nav-text font-size-lg">{{ __('Basic Data') }}</span>
                        </a>
                    </li>
                    <!--end::Item-->
                </ul>
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form class="form" id="kt_form">
                <div class="tab-content">
                    <!--begin::Tab-->
                    <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                        @if ($type != 'owner')
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-7">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Permissions') }}</x-label>
                                    <div class="col-9">
                                        <select class="form-control" wire:model.defer="rolePermissions" multiple>
                                            <option value=""></option>
                                            @foreach($permissions as $permission)
                                                <option value="{{ $permission['id'] }}">{{ $permission['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        @endif
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-7">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Name') }}</x-label>
                                    <x-input wire:model.defer="user.name" field='name' />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-7">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Dial Code') }}</x-label>
                                    <div class="col-9">
                                        <select class="form-control" wire:model.defer="user.dial_code">
                                            <option></option>
                                            <option value="+966">{{ __("Saudi Arabia (+966)") }}</option>
                                            <option value="+973">{{ __("Bahrain (+973)") }}</option>
                                            <option value="+1">{{ __("United States (+1)") }}</option>
                                            <option value="+971">{{ __("United Arab Emirates (+971)") }}</option>
                                            <option value="+965">{{ __("Kuwait (+965)") }}</option>
                                            <option value="+968">{{ __("Oman (+968)") }}</option>
                                            <option value="+20">{{ __("Egypt (+20)") }}</option>
                                            <option value="+974">{{ __("Qatar (+974)") }}</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-7">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Phone') }}</x-label>
                                    <x-input type="number" wire:model.defer="user.phone" field='phone' />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        @if($this->user->type == 'app user')
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-7">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Employee Number') }}</x-label>
                                    <x-input wire:model.defer="user.employee_number" field='employee_number' />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        @endif
                        @if($this->user->type != 'app user')
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-7">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Email') }}</x-label>
                                    <x-input type="email" wire:model.defer="user.email" field='email' />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-7">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Password') }}</x-label>
                                    <x-input type="password" wire:model.defer="password" field='password' />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        @endif
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-7">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Salary') }}</x-label>
                                    <x-input type="number" wire:model.defer="user.salary" field='salary' />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-7">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Business Role') }}</x-label>
                                    <x-input wire:model.defer="user.business_role" field='business_role' />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        @if($this->user->type == 'app user')
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-7">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Username') }}</x-label>
                                    <x-input wire:model.defer="user.username" field='username' />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-7">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Pin Code') }}</x-label>
                                    <x-input wire:model.defer="user.pin_code" field='pin_code' />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        @endif
                        @if($this->user->type != 'app user')
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-7">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Language') }}</x-label>
                                    <div class="col-9">
                                        <select class="form-control" wire:model.defer="user.language">
                                            <option></option>
                                            <option value="ar">ar</option>
                                            <option value="en">en</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        @endif
                    </div>
                    <!--end::Tab-->
                </div>
            </form>
        </div>
        <!--begin::Card body-->

        <div class="card-footer">
            <button type="button" class="mr-2 btn btn-primary btn-sm" wire:click.prevent="submit">{{ __('Save') }}</button>
        </div>
    </div>
</div>
