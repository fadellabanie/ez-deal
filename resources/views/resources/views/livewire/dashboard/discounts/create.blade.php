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
                    <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel" x-data="{isShowing : true}">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-7 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Name (English)') }}</x-label>
                                    <x-input wire:model.defer="name_en" field='name_en' />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-7 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Name (Arabic)') }}</x-label>
                                    <x-input wire:model.defer="name_ar" field='name_ar' />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-7 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Type') }}</x-label>
                                    <div class="col-9">
                                        <select class="form-control @error('type') is-invalid @enderror" wire:model.defer="type" x-on:change="$event.target.value == 'Value' ? isShowing=true : isShowing=false">
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
                            <div class="col-xl-7 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Taxable') }}</x-label>
                                    <div class="col-9">
                                    <span class="switch switch-sm switch-icon">
                                        <label>
                                            <input type="checkbox" wire:model.defer="is_taxable" />
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
                            <div class="col-xl-7 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Value') }}</x-label>
                                    <div class="col-9">
                                        <div class="input-group">
                                            <input type="number" class="form-control @error('value') is-invalid @enderror" wire:model.defer="value">
                                            <div class="input-group-append">
                                                <span class="input-group-text" x-show="isShowing">SAR</span>
                                                <span class="input-group-text" x-show="!isShowing">%</span>
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
                                    <x-label>{{ __('Applies To') }}</x-label>
                                    <div class="col-9">
                                        <div class="checkbox-inline @error('applies_to') is-invalid @enderror">
                                            @foreach($applyTypes as $applyType)
                                                <label class="checkbox">
                                                    <input type="checkbox" value="{{ $applyType['key'] }}" wire:model.defer="applies_to" />
                                                    <span></span>
                                                    {{ __($applyType['name']) }}
                                                </label>
                                            @endforeach
                                        </div>
                                        <x-error field="applies_to" />
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
                                    <x-label>{{ __('Activate For') }}</x-label>
                                    <div class="col-9">
                                        <div class="checkbox-inline @error('activate_for') is-invalid @enderror">
                                            @foreach($activationTypes as $activationType)
                                                <label class="checkbox">
                                                    <input type="checkbox" value="{{ $activationType['key'] }}" wire:model.defer="activate_for" />
                                                    <span></span>
                                                    {{ __($activationType['name']) }}
                                                </label>
                                            @endforeach
                                        </div>
                                        <x-error field="activate_for" />
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-7 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Start Date') }}</x-label>
                                    <x-date-picker field="start_date" wire:model.defer="start_date" minDate="new Date()" />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-7 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Categories') }}</x-label>
                                    <div class="col-9" wire:ignore>
                                        <select class="form-control select2 @error('discountCategories') is-invalid @enderror" id="discountCategories"
                                            name="discountCategories" multiple="multiple">
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-error field="discountCategories" />
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-7 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Products') }}</x-label>
                                    <div class="col-9" wire:ignore>
                                        <select class="form-control select2 @error('discountProducts') is-invalid @enderror"
                                            id="discountProducts" name="discountProducts" multiple="multiple">
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-error field="discountProducts" />
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
            <button type="button" class="btn btn-secondary btn-sm" wire:click.prevent="resetForm" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left">{{ __('Cancel') }}</button>
        </div>
    </div>

@section('vendorScripts')
    <script src="{{ asset('metronic/assets/js/pages/crud/forms/widgets/select2.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#discountCategories').select2({
                placeholder: '',
            }).on('change', function () {
                @this.discountCategories = $(this).val();
            });

            $('#discountProducts').select2({
                placeholder: '',
            }).on('change', function () {
                @this.discountProducts = $(this).val();
            });
        });
    </script>
    @endsection
</div>
