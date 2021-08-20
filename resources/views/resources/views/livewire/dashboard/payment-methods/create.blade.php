<div>
    <x-alert class="alert-success"></x-alert>

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
            <form class="form" id="kt_form" x-data="{ type: '' }">
                <div class="tab-content">
                    <!--begin::Tab-->
                    <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-7">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Name') }}</x-label>
                                    <x-input wire:model.defer="name" field='name' />
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
                                    <x-label>{{ __('Code') }}</x-label>
                                    <x-input wire:model.defer="code" field='code' />
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
                                    <x-label>{{ __('Type') }}</x-label>
                                    <div class="col-9">
                                        <select class="form-control @error('type') is-invalid @enderror" wire:model.defer="type" x-model="type">
                                            <option value=""></option>
                                            <option value="Card">{{ __('Card') }}</option>
                                            <option value="Others">{{ __('Others') }}</option>
                                            <option value="External">{{ __('External') }}</option>
                                        </select>
                                        <x-error field="type" />
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->

                        <!--begin::Row-->
                        <div class="row" x-show="['Card', 'Others'].includes(type)">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-7">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Auto open cash drawer') }}</x-label>
                                    <div class="col-9">
                                    <span class="switch switch-sm switch-icon">
                                        <label>
                                            <input type="checkbox" wire:model.defer="auto_open_cash_drawer" />
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
                                    <x-label>{{ __('Active') }}</x-label>
                                    <div class="col-9">
                                    <span class="switch switch-sm switch-icon">
                                        <label>
                                            <input type="checkbox" wire:model.defer="is_active" />
                                            <span></span>
                                        </label>
                                    </span>
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Tab-->
                </div>
            </form>
        </div>
        <!--begin::Card body-->

        <div class="card-footer">
            <button type="button" class="mr-2 btn btn-primary btn-sm" wire:click.prevent="submit" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left">{{ __('Save') }}</button>
            <button type="button" class="btn btn-secondary btn-sm" wire:click.prevent="resetForm" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left">{{ __('Cancel') }}</button>
        </div>
    </div>
</div>
