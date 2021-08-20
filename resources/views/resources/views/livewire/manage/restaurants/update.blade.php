<div>
    <x-alert class="alert-success"></x-alert>

    <x-auth-validation-errors></x-auth-validation-errors>

    <div class="card card-custom">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    {{ svg('Layers') }}
                </span>
                <h3 class="card-label">
                    {{ __('Basic Data') }}
                </h3>
            </div>
            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <button type="button" class="mr-2 btn btn-info btn-sm" wire:click.prevent="submit" wire:target='submit' wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left">{{ __('Save') }}</button>
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form class="form" id="kt_form1">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Name') }}</x-label>
                            <x-input wire:model.defer="restaurant.name" field='name' />
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
                            <x-label>{{ __('Username') }}</x-label>
                            <x-input wire:model.defer="user.name" field='user.name' />
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
                            <x-input type="tel" wire:model.defer="user.phone" field='phone' />
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
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Subscription End Date') }}</x-label>
                            <x-date-picker field="restaurant.subscription_end_date" wire:model="restaurant.subscription_end_date" minDate="new Date()" />
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
                            <x-label>{{ __('Attachments') }}</x-label>
                            <x-filepond
                                wire:model="attachments"
                                multiple
                                allowImagePreview
                                imagePreviewMaxHeight="200"
                                allowFileTypeValidation
                                allowFileSizeValidation
                                maxFileSize="2mb"
                            />
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
                            <x-label>{{ __('Active') }}</x-label>
                            <div class="col-9">
                            <span class="switch switch-sm switch-icon">
                                <label>
                                    <input type="checkbox" wire:model.defer="restaurant.is_active" />
                                    <span></span>
                                </label>
                            </span>
                            </div>
                        </div>
                        <!--end::Group-->
                    </div>
                </div>
                <!--end::Row-->
            </form>
        </div>
        <!--begin::Card body-->
    </div>

    <div class="card card-custom mt-7">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    {{ svg('Upload') }}
                </span>
                <h3 class="card-label">
                    {{ __('Attachments') }}
                </h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('File Name') }}</th>
                    <th scope="col">{{ __('Size') }}</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($restaurantAttachments as $attachment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ __('Attachment') }} #{{ $loop->iteration }}</td>
                            <td>
                                {{ formatBytes($attachment->size) }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" wire:click="export({{ $attachment->id }})" wire:target='export' wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left"><span class="mr-3 flaticon-download"></span>{{ __('Download') }}</button>
                                <button type="button" class="btn btn-danger btn-sm" wire:click="confirm({{ $attachment->id }})" wire:target='delete' wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left"><span class="mr-3 flaticon-delete"></span>{{ __('Delete') }}</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <x-delete-modal></x-delete-modal>

    @push('scripts')
    <script type="text/javascript">
        window.livewire.on('openDeleteModal', () => {
            $('#deleteModal').modal('show');
        });
    </script>
    @endpush
</div>
