<div>
    <x-alert class="alert-success"></x-alert>

    <div class="card card-custom">
        <!--begin::Card header-->
        <div class="card-header card-header-tabs-line nav-tabs-line-3x">
            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                    <!--begin::Item-->
                    <li class="nav-item mr-3">
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
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-9 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Name') }}</x-label>
                                    <x-input wire:model.lazy="name" field='name' />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-9 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Type') }}</x-label>
                                    <div class="col-9">
                                        <select class="form-control @error('type') is-invalid @enderror" wire:model.lazy="type">
                                            <option value="Value">{{ __('Value') }}</option>
                                            <option value="Percentage">{{ __('Percentage') }}</option>
                                        </select>
                                        <x-error field="type" />
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-9 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Value') }}</x-label>
                                    <div class="col-9">
                                        <div class="input-group">
                                            <input type="number" class="form-control @error('value') is-invalid @enderror" wire:model.lazy="value">
                                            <div class="input-group-append">
                                                <span class="input-group-text">{{ ($this->type == 'Value') ? 'SAR' : '%' }}</span>
                                            </div>
                                            <x-error field="value" />
                                        </div>
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-9 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Valid From') }}</x-label>
                                    <div class="col-lg-3">
                                        <input type="date" class="form-control @error('valid_from') is-invalid @enderror" wire:model.lazy="valid_from">
                                        <x-error field="valid_from" />
                                    </div>
                                    <x-label>{{ __('Valid Till') }}</x-label>
                                    <div class="col-lg-3">
                                        <input type="date" class="form-control @error('valid_to') is-invalid @enderror" wire:model.lazy="valid_to">
                                        <x-error field="valid_to" />
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-9 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Days') }}</x-label>
                                    <div class="col-9">
                                        <div class="checkbox-inline">
                                            @foreach($weekDays as $day)
                                                <label class="checkbox">
                                                    <input type="checkbox" value="{{ $day['abbr'] }}" wire:model.lazy="days" />
                                                    <span></span>
                                                    {{ __($day['name']) }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        @if(count($days) > 0)
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-9 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('From Time') }}</x-label>
                                    <div class="col-lg-3">
                                        <input type="time" class="form-control @error('from_time') is-invalid @enderror" wire:model.lazy="from_time">
                                        <x-error field="from_time" />
                                    </div>
                                    <x-label>{{ __('To Time') }}</x-label>
                                    <div class="col-lg-3">
                                        <input type="time" class="form-control @error('to_time') is-invalid @enderror" wire:model.lazy="to_time">
                                        <x-error field="to_time" />
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
                            <div class="col-xl-9 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('No. of Coupons') }}</x-label>
                                    <x-input type="number" wire:model.lazy="no_of_coupons" field='no_of_coupons' />
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
            <button type="button" class="btn btn-primary btn-sm mr-2" wire:click.prevent="submit" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left">{{ __('Save') }}</button>
            <button type="button" class="btn btn-secondary btn-sm" wire:click.prevent="resetForm" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left">{{ __('Cancel') }}</button>
        </div>
    </div>
</div>
