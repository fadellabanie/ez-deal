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
                                    <div class="form-text mt-3">
                                        {{ $this->coupon->name }}
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
                                    <x-label>{{ __('Type') }}</x-label>
                                    <div class="col-9">
                                        <div class="form-text mt-3">
                                            {{ __($this->coupon->type) }}
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
                                        <input type="date" class="form-control @error('valid_from') is-invalid @enderror" wire:model.lazy="coupon.valid_from">
                                        <x-error field="valid_from" />
                                    </div>
                                    <x-label>{{ __('Valid Till') }}</x-label>
                                    <div class="col-lg-3">
                                        <input type="date" class="form-control @error('valid_to') is-invalid @enderror" wire:model.lazy="coupon.valid_to">
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
                                        <input type="time" class="form-control @error('from_time') is-invalid @enderror" wire:model.lazy="coupon.from_time">
                                        <x-error field="from_time" />
                                    </div>
                                    <x-label>{{ __('To Time') }}</x-label>
                                    <div class="col-lg-3">
                                        <input type="time" class="form-control @error('to_time') is-invalid @enderror" wire:model.lazy="coupon.to_time">
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
                                    <x-label>{{ __('Code') }}</x-label>
                                    <div class="col-9">
                                        <div class="form-text mt-3">
                                            {{ __($this->coupon->code) }}
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
                                    <x-label>{{ __('Creator') }}</x-label>
                                    <div class="col-9">
                                        <div class="form-text mt-3">
                                            {{ $this->coupon->creator->name ??"" }}
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
                                    <x-label>{{ __('Activated') }}</x-label>
                                    <div class="col-9">
                                    <span class="switch switch-sm switch-icon">
                                        <label>
                                            <input type="checkbox" wire:model.lazy="coupon.is_active" />
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
            <button type="button" class="btn btn-primary btn-sm mr-2" wire:click.prevent="submit" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left">{{ __('Save') }}</button>
        </div>
    </div>
</div>
