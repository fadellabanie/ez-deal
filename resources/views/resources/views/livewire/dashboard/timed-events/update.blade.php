<div>
    <x-alert class="alert-success"></x-alert>

    <x-auth-validation-errors></x-auth-validation-errors>

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
                                    <x-label>{{ __('Name (English)') }}</x-label>
                                    <x-input wire:model.lazy="timedEvent.name_en" field='name_en' />
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
                                    <x-label>{{ __('Name (Arabic)') }}</x-label>
                                    <x-input wire:model.lazy="timedEvent.name_ar" field='name_ar' />
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
                                    <x-label>{{ __('Order Types') }}</x-label>
                                    <div class="col-9" wire:ignore>
                                        <select class="form-control select2 @error('timedEventOrderTypes') is-invalid @enderror" id="kt_select2_3" name="timedEventOrderTypes" multiple="multiple">
                                            @foreach($orderTypes as $orderType)
                                                <option value="{{ $orderType->id }}" @if(in_array($orderType->id, $timedEventOrderTypes)) selected @endif>{{ $orderType->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-error field="timedEventOrderTypes" />
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
                                        <select class="form-control @error('type') is-invalid @enderror" wire:model.lazy="timedEvent.type">
                                            <option value=""></option>
                                            @foreach($types as $k => $v)
                                                <option value="{{ $k }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                        <x-error field="type" />
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        @if(! in_array($this->timedEvent->type, ['activation', 'deactivation']))
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-9 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Value') }}</x-label>
                                    <div class="col-9">
                                        <div class="input-group">
                                            <input type="number" class="form-control @error('value') is-invalid @enderror" wire:model.lazy="timedEvent.value">
                                            <div class="input-group-append">
                                                <span class="input-group-text">SAR</span>
                                            </div>
                                            <x-error field="value" />
                                        </div>
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
                                    <x-label>{{ __('Active') }}</x-label>
                                    <div class="col-9">
                                        <span class="switch switch-sm switch-icon">
                                            <label>
                                                <input type="checkbox" wire:model.lazy="timedEvent.is_active" />
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
                            <div class="col-xl-9 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('From Date') }}</x-label>
                                    <div class="col-lg-3">
                                        <input type="date" class="form-control @error('from_date') is-invalid @enderror" wire:model.lazy="timedEvent.from_date">
                                        <x-error field="from_date" />
                                    </div>
                                    <x-label>{{ __('To Date') }}</x-label>
                                    <div class="col-lg-3">
                                        <input type="date" class="form-control @error('to_date') is-invalid @enderror" wire:model.lazy="timedEvent.to_date">
                                        <x-error field="to_date" />
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
                                    <x-label>{{ __('From Hour') }}</x-label>
                                    <div class="col-lg-3">
                                        <input type="time" class="form-control @error('from_hour') is-invalid @enderror" wire:model.lazy="timedEvent.from_hour">
                                        <x-error field="from_hour" />
                                    </div>
                                    <x-label>{{ __('To Hour') }}</x-label>
                                    <div class="col-lg-3">
                                        <input type="time" class="form-control @error('to_hour') is-invalid @enderror" wire:model.lazy="timedEvent.to_hour">
                                        <x-error field="to_hour" />
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
                                        <div class="checkbox-inline @error('days') is-invalid @enderror">
                                            @foreach($weekDays as $day)
                                                <label class="checkbox">
                                                    <input type="checkbox" value="{{ $day['abbr'] }}" wire:model.lazy="days" />
                                                    <span></span>
                                                    {{ __($day['name']) }}
                                                </label>
                                            @endforeach
                                        </div>
                                        <x-error field="days" />
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

    @section('vendorScripts')
        <script src="{{ asset('metronic/assets/js/pages/crud/forms/widgets/select2.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#kt_select2_3').select2({
                    placeholder: '',
                }).on('change', function () {
                    @this.timedEventOrderTypes = $(this).val();
                });
            });
        </script>
    @endsection
</div>
