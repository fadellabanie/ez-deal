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
                <button type="button" class="btn btn-info btn-sm mr-2" wire:click.prevent="submit" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left">{{ __('Save') }}</button>
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
                            <x-label>{{ __('Description (English)') }}</x-label>
                            <div class="col-9">
                                <textarea class="form-control  @error('description_en') is-invalid @enderror" wire:model.defer="description_en"></textarea>
                                <x-error field="description_en" />
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
                            <x-label>{{ __('Description (Arabic)') }}</x-label>
                            <div class="col-9">
                                <textarea class="form-control  @error('description_ar') is-invalid @enderror" wire:model.defer="description_ar"></textarea>
                                <x-error field="description_ar" />
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
                            <x-label>{{ __('Category') }}</x-label>
                            <div class="col-9">
                                <select class="form-control @error('category_id') is-invalid @enderror" wire:model.defer="category_id">
                                    <option></option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <x-error field="category_id" />
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
                            <x-label>{{ __('Tags') }}</x-label>
                            <div class="col-9" wire:ignore>
                                <select class="form-control select2 @error('productTags') is-invalid @enderror" id="kt_select2_3" name="productTags" multiple="multiple">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                <x-error field="productTags" />
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
                            <x-label>{{ __('Timed Events') }}</x-label>
                            <div class="col-9" wire:ignore>
                                <select class="form-control select2 @error('productTimedEvents') is-invalid @enderror" id="kt_select2_4" name="productTimedEvents" multiple="multiple">
                                    @foreach($timedEvents as $timedEvent)
                                        <option value="{{ $timedEvent->id }}">{{ $timedEvent->name }}</option>
                                    @endforeach
                                </select>
                                <x-error field="productTimedEvents" />
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
                            <x-label>{{ __('Pricing Type') }}</x-label>
                            <div class="col-9">
                                <select class="form-control @error('pricing_type') is-invalid @enderror" wire:model.defer="pricing_type">
                                    <option value="pre_set">{{ __('Pre set') }}</option>
                                    <option value="open_price">{{ __('Open price') }}</option>
                                </select>
                                <x-error field="pricing_type" />
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
                            <x-label>{{ __('Selling Type') }}</x-label>
                            <div class="col-9">
                                <select class="form-control @error('selling_type') is-invalid @enderror" wire:model.defer="selling_type">
                                    <option value="unit">{{ __('Unit') }}</option>
                                    <option value="weight">{{ __('Weight') }}</option>
                                </select>
                                <x-error field="selling_type" />
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
                            <x-label>{{ __('SKU') }}</x-label>
                            <x-input wire:model.defer="sku" field='sku' />
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
                            <x-label>{{ __('Barcode') }}</x-label>
                            <x-input wire:model.defer="barcode" field='barcode' />
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
                            <x-label>{{ __('Preparation time') }}</x-label>
                            <div class="col-9">
                                <div class="input-group">
                                    <input type="number" class="form-control @error('preparation_time') is-invalid @enderror" wire:model.defer="preparation_time">
                                    <div class="input-group-append">
                                        <span class="input-group-text">{{ __('Minutes') }}</span>
                                    </div>
                                    <x-error field="preparation_time" />
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
                    <div class="col-xl-7 my-2">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Taxes') }}</x-label>
                            <div class="col-9">
                                <select class="form-control @error('is_taxable') is-invalid @enderror" wire:model.defer="is_taxable">
                                    <option value="1">{{ __('Taxable') }}</option>
                                    <option value="0">{{ __('Non-taxable') }}</option>
                                </select>
                                <x-error field="is_taxable" />
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
                        <div class="form-group row @error('image') validated @enderror">
                            <x-label>{{ __('Image') }}</x-label>
                            <x-filepond
                                wire:model="image"
                                allowImagePreview
                                imagePreviewMaxHeight="200"
                                allowFileTypeValidation
                                acceptedFileTypes="['image/png', 'image/jpg', 'image/jpeg']"
                                allowFileSizeValidation
                                maxFileSize="2mb"
                            />
                            <div class="offset-md-3 col-9">
                                <x-error field='image' />
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

    @section('vendorScripts')
        <script src="{{ asset('metronic/assets/js/pages/crud/forms/widgets/select2.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#kt_select2_3').select2({
                    placeholder: '',
                }).on('change', function () {
                    @this.productTags = $(this).val();
                });

                $('#kt_select2_4').select2({
                    placeholder: '',
                }).on('change', function () {
                    @this.productTimedEvents = $(this).val();
                });
            });

            window.addEventListener('show-create-size-modal', event => {
                $('#createSizeModal').modal('show')
            })

            window.addEventListener('hide-create-size-modal', event => {
                $('#createSizeModal').modal('hide')
            })

            window.addEventListener('show-edit-size-modal', event => {
                $('#editSizeModal').modal('show')
            })

            window.addEventListener('hide-edit-size-modal', event => {
                $('#editSizeModal').modal('hide')
            })

            window.addEventListener('show-create-modifier-modal', event => {
                $('#createModifierModal').modal('show')
            })

            window.addEventListener('hide-create-modifier-modal', event => {
                $('#createModifierModal').modal('hide')
            })

            window.addEventListener('show-edit-modifier-modal', event => {
                $('#editModifierModal').modal('show')
            })

            window.addEventListener('hide-edit-modifier-modal', event => {
                $('#editModifierModal').modal('hide')
            })
        </script>
    @endsection
</div>
