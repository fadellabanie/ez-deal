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
            <form class="form" id="kt_form">
                <div class="tab-content">
                    <!--begin::Tab-->
                    <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="my-2 col-xl-7">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Name (English)') }}</x-label>
                                    <x-input wire:model.defer="tag.name_en" field='name_en' />
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
                                    <x-label>{{ __('Name (Arabic)') }}</x-label>
                                    <x-input wire:model.defer="tag.name_ar" field='name_ar' />
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
                                    <x-label>{{ __('Tag Icon') }}</x-label>
                                    <div class="col-9"
                                        x-data="{ isUploading: false, progress: 0 }"
                                        x-on:livewire-upload-start="isUploading = true"
                                        x-on:livewire-upload-finish="isUploading = false"
                                        x-on:livewire-upload-error="isUploading = false"
                                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                                    >
                                        <label for="upload" class="btn btn-light btn-text-primary btn-hover-text-primary font-weight-bold btn-sm d-flex">
                                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                {{ svg('Upload') }}
                                            </span>
                                            <x-input type="file" id="upload" wire:model.lazy="upload" field="upload"  style="display:none" />
                                        </label>

                                        <div x-show="isUploading">
                                            <progress max="100" x-bind:value="progress"></progress>
                                        </div>
                                        @if($upload)
                                            <div class="mt-5 symbol symbol-150">
                                                <img alt="" src="{{ $upload->temporaryUrl() }}"/>
                                            </div>
                                        @elseif($tag->icon)
                                            <div class="mt-5 symbol symbol-150">
                                                <img alt="" src="{{ asset('storage/' . $tag->icon) }}"/>
                                            </div>
                                        @endif
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
        </div>
    </div>
</div>
