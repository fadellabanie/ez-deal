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
                    {{ __('App Settings') }}
                </h3>
            </div>
            <!--begin::Toolbar-->
            @can('Application Settings')  

            <div class="card-toolbar">
                <button type="button" class="mr-2 btn btn-info btn-sm" wire:click.prevent="submit" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left">{{ __('Save') }}</button>
            </div>
            @endcan
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
                            <x-label>{{ __('Logout inactive after') }}</x-label>
                            <x-input type="number" wire:model.defer="appSetting.logout_inactive_after" field='logout_inactive_after' />
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
                            <x-label>{{ __('Reset order number after') }}</x-label>
                            <x-input type="number" wire:model.defer="appSetting.reset_order_number_after" field='reset_order_number_after' />
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
                            <x-label>{{ __('Void require customer info') }}</x-label>
                            <div class="col-9">
                            <span class="switch switch-sm switch-icon">
                                <label>
                                    <input type="checkbox" wire:model.defer="appSetting.void_require_customer_info" />
                                    <span></span>
                                </label>
                            </span>
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
                            <x-label>{{ __('Discount require customer info') }}</x-label>
                            <div class="col-9">
                            <span class="switch switch-sm switch-icon">
                                <label>
                                    <input type="checkbox" wire:model.defer="appSetting.discount_require_customer_info" />
                                    <span></span>
                                </label>
                            </span>
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
                            <x-label>{{ __('Run in sub mode') }}</x-label>
                            <div class="col-9">
                            <span class="switch switch-sm switch-icon">
                                <label>
                                    <input type="checkbox" wire:model.defer="appSetting.run_in_submode" />
                                    <span></span>
                                </label>
                            </span>
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
                            <x-label>{{ __('Receipt language') }}</x-label>
                            <div class="col-9">
                                <select class="form-control" wire:model.defer="appSetting.receipt_language">
                                    <option value="ar">ar</option>
                                    <option value="en">en</option>
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
                            <x-label>{{ __('Waiter app background') }}</x-label>
                            <div class="col-9"
                                x-data="{ isUploading: false, progress: 0 }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                                <label for="waiter_app_background_upload" class="btn btn-light btn-text-primary btn-hover-text-primary font-weight-bold btn-sm d-flex">
                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                        {{ svg('Upload') }}
                                    </span>
                                    <x-input type="file" id="waiter_app_background_upload" wire:model.lazy="waiter_app_background_upload" field="waiter_app_background_upload"  style="display:none" />
                                </label>

                                <div x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                                @if($waiter_app_background_upload)
                                    <div class="mt-5 symbol symbol-150">
                                        <img alt="" src="{{ $waiter_app_background_upload->temporaryUrl() }}"/>
                                    </div>
                                @elseif($appSetting->waiter_app_background)
                                    <div class="mt-5 symbol symbol-150">
                                        <img alt="" src="{{ asset('storage/' . $appSetting->waiter_app_background) }}"/>
                                    </div>
                                @endif
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
                            <x-label>{{ __('Cashier app background') }}</x-label>
                            <div class="col-9"
                                x-data="{ isUploading: false, progress: 0 }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                                <label for="cashier_app_background_upload" class="btn btn-light btn-text-primary btn-hover-text-primary font-weight-bold btn-sm d-flex">
                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                        {{ svg('Upload') }}
                                    </span>
                                    <x-input type="file" id="cashier_app_background_upload" wire:model.lazy="cashier_app_background_upload" field="cashier_app_background_upload"  style="display:none" />
                                </label>

                                <div x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                                @if($cashier_app_background_upload)
                                    <div class="mt-5 symbol symbol-150">
                                        <img alt="" src="{{ $cashier_app_background_upload->temporaryUrl() }}"/>
                                    </div>
                                @elseif($appSetting->cashier_app_background)
                                    <div class="mt-5 symbol symbol-150">
                                        <img alt="" src="{{ asset('storage/' . $appSetting->cashier_app_background) }}"/>
                                    </div>
                                @endif
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
                            <x-label>{{ __('Customer screen app background') }}</x-label>
                            <div class="col-9"
                                x-data="{ isUploading: false, progress: 0 }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                                <label for="customer_app_background_upload" class="btn btn-light btn-text-primary btn-hover-text-primary font-weight-bold btn-sm d-flex">
                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                        {{ svg('Upload') }}
                                    </span>
                                    <x-input type="file" id="customer_app_background_upload" wire:model.lazy="customer_app_background_upload" field="customer_app_background_upload"  style="display:none" />
                                </label>

                                <div x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                                @if($customer_app_background_upload)
                                    <div class="mt-5 symbol symbol-150">
                                        <img alt="" src="{{ $customer_app_background_upload->temporaryUrl() }}"/>
                                    </div>
                                @elseif($appSetting->customer_app_background)
                                    <div class="mt-5 symbol symbol-150">
                                        <img alt="" src="{{ asset('storage/' . $appSetting->customer_app_background) }}"/>
                                    </div>
                                @endif
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
                            <x-label>{{ __('Receipt logo') }}</x-label>
                            <div class="col-9"
                                x-data="{ isUploading: false, progress: 0 }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                                <label for="receipt_logo_upload" class="btn btn-light btn-text-primary btn-hover-text-primary font-weight-bold btn-sm d-flex">
                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                        {{ svg('Upload') }}
                                    </span>
                                    <x-input type="file" id="receipt_logo_upload" wire:model.lazy="receipt_logo_upload" field="receipt_logo_upload"  style="display:none" />
                                </label>

                                <div x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                                @if($receipt_logo_upload)
                                    <div class="mt-5 symbol symbol-150">
                                        <img alt="" src="{{ $receipt_logo_upload->temporaryUrl() }}"/>
                                    </div>
                                @elseif($appSetting->receipt_logo)
                                    <div class="mt-5 symbol symbol-150">
                                        <img alt="" src="{{ asset('storage/' . $appSetting->receipt_logo) }}"/>
                                    </div>
                                @endif
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
                            <x-label>{{ __('Receipt header') }}</x-label>
                            <div class="col-9">
                                <textarea class="form-control  @error('receipt_header') is-invalid @enderror" wire:model.defer="appSetting.receipt_header"></textarea>
                                <x-error field="receipt_header" />
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
                            <x-label>{{ __('Receipt footer') }}</x-label>
                            <div class="col-9">
                                <textarea class="form-control  @error('receipt_footer') is-invalid @enderror" wire:model.defer="appSetting.receipt_footer"></textarea>
                                <x-error field="receipt_footer" />
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
</div>
