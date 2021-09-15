<div>
    <x-alert id='alert' class="alert-success"></x-alert>

    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true"
            aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{__("Update Real Estate")}}</h3>
            </div>
        </div>
        <div id="kt_account_profile_details" class="collapse show">
            <form class="form">
                <div class="card-body border-top p-9">

                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <div class="row fv-row fv-plugins-icon-container">
                            <div class="col-lg-8">
                                <x-label class="required col-lg-6">{{__("Name")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" field="name" wire:model="realEstate.name" placeholder="name" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <x-label class="required">{{__("Type")}}</x-label>
                                <div class="col-lg-12">
                                    <div wire:ignore>
                                        <select wire:model="realEstate.type" id="type" name="type" data-control="select2"
                                            class="form-select form-select-solid form-select-l">
                                            <option value="">{{__("Select Type")}}</option>
                                            <option value="normal">{{__("Normal")}}</option>
                                            <option value="special">{{__("special")}}</option>
                                        </select>
                                    </div>
                                    <x-error-select field="realEstate.type" />
                                </div>
                            </div>


                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <div class="row fv-row fv-plugins-icon-container">
                            <div class="col-lg-4">
                                <x-label class="required">{{__("Contract Type")}}</x-label>
                                <div class="col-lg-12">
                                    <div wire:ignore>
                                        <select wire:model="realEstate.contract_type_id" id="contract_type_id"
                                            name="contract_type_id" data-control="select2"
                                            class="form-select form-select-solid form-select-l">
                                            <option value="">{{__("Select Type")}}</option>

                                            @foreach (contractTypes() as $contractType)
                                            <option value="{{$contractType->id}}">{{$contractType->en_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-error-select field="realEstate.contract_type_id" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <x-label class="required col-lg-12">{{__("Real Estate Type")}}</x-label>
                                <div class="col-lg-12">
                                    <div wire:ignore>
                                        <select wire:model="realEstate.realestate_type_id" id="realestate_type_id"
                                            name="realestate_type_id" data-control="select2"
                                            class="form-select form-select-solid form-select-l">
                                            <option value="">{{__("Select Type")}}</option>

                                            @foreach (realestateType() as $realestateType)
                                            <option value="{{$realestateType->id}}">{{$realestateType->en_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-error-select field="realEstate.realestate_type_id" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <x-label class="required">{{__("View")}}</x-label>
                                <div class="col-lg-12">
                                    <div wire:ignore>
                                        <select wire:model="realEstate.view_id" id="view_id" name="view_id" data-control="select2"
                                            class="form-select form-select-solid form-select-l">
                                            <option value="">{{__("Select Type")}}</option>

                                            @foreach (viewTypes() as $view)
                                            <option value="{{$view->id}}">{{$view->en_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-error-select field="realEstate.view_id" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <div class="row fv-row fv-plugins-icon-container">
                            <div class="col-lg-3">
                                <x-label class="required">{{__("Price")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="number" field="price" wire:model="realEstate.price"
                                        placeholder="price" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required">{{__("Space")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" field="space" wire:model="realEstate.space"
                                        placeholder="space" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required">{{__("Cities")}}</x-label>
                                <div class="col-lg-12">
                                    <div wire:ignore>
                                        <select wire:model="realEstate.city_id" id="city_id" name="city_id" data-control="select2"
                                            class="form-select form-select-solid form-select-l">
                                            <option value="">{{__("Select Type")}}</option>

                                            @foreach (cities() as $city)
                                            <option value="{{$city->id}}">{{$city->en_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-error-select field="realEstate.city_id" />

                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required">{{__("Countries")}}</x-label>
                                <div class="col-lg-12">
                                    <div wire:ignore>
                                        <select wire:model="realEstate.country_id" id="country_id" name="country_id"
                                            data-control="select2" class="form-select form-select-solid form-select-l">
                                            <option value="">{{__("Select Type")}}</option>

                                            @foreach (countries() as $country)
                                            <option value="{{$country->id}}">{{$country->en_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-error-select field="realEstate.country_id" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <div class="row fv-row fv-plugins-icon-container">
                            <div class="col-lg-3">
                                <x-label class="required col-lg-8">{{__("Number Building")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="number" field="number_building"
                                        wire:model="realEstate.number_building" placeholder="number_building" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required col-lg-8">{{__("Age Building")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" field="age_building" wire:model="realEstate.age_building"
                                        placeholder="age_building" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required col-lg-8">{{__("Stree Width")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" field="street_width" wire:model="realEstate.street_width"
                                        placeholder="street_width" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required col-lg-8">{{__("Street Number")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" field="street_number" wire:model="realEstate.street_number"
                                        placeholder="street_number" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-4">
                        <div class="row fv-row fv-plugins-icon-container">
                            <div class="col-lg-3">
                                <x-label class="required col-lg-8">{{__("Type Of User")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" field="type_of_owner" wire:model="realEstate.type_of_owner"
                                        placeholder="type_of_owner" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required col-lg-8">{{__("Number Card")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" field="number_card" wire:model="realEstate.number_card"
                                        placeholder="number_card" />
                                </div>
                            </div>
                            <div class="col-lg-3 ">
                                <x-label>{{__("Note")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" field="note" wire:model="realEstate.note" placeholder="note" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label>{{__("Video Url")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" field="video_url" wire:model="realEstate.video_url"
                                        placeholder="video_url" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-2">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">{{__("Elevator")}}</label>
                        <!--begin::Label-->
                        <!--begin::Label-->
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="form-check form-check-solid form-switch fv-row">
                                <input class="form-check-input w-45px h-30px" type="checkbox"
                                    wire:model="realEstate.elevator" id="allowmarketing" checked="checked" />
                                <label class="form-check-label" for="allowmarketing"></label>
                            </div>
                        </div>
                        <!--begin::Label-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-2">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">{{__("Parking")}}</label>
                        <!--begin::Label-->
                        <!--begin::Label-->
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="form-check form-check-solid form-switch fv-row">
                                <input class="form-check-input w-45px h-30px" type="checkbox"
                                    wire:model="realEstate.parking" id="allowmarketing" checked="checked" />
                                <label class="form-check-label" for="allowmarketing"></label>
                            </div>
                        </div>
                        <!--begin::Label-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-2">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">{{__("AC")}}</label>
                        <!--begin::Label-->
                        <!--begin::Label-->
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="form-check form-check-solid form-switch fv-row">
                                <input class="form-check-input w-45px h-30px" type="checkbox" wire:model="realEstate.ac"
                                    id="allowmarketing" checked="checked" />
                                <label class="form-check-label" for="allowmarketing"></label>
                            </div>
                        </div>
                        <!--begin::Label-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-2">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">{{__("Furniture")}}</label>
                        <!--begin::Label-->
                        <!--begin::Label-->
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="form-check form-check-solid form-switch fv-row">
                                <input class="form-check-input w-45px h-30px" type="checkbox"
                                    wire:model="realEstate.furniture" id="allowmarketing" checked="checked" />
                                <label class="form-check-label" for="allowmarketing"></label>
                            </div>
                        </div>
                        <!--begin::Label-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-4">
                        <div class="row fv-row fv-plugins-icon-container">
                            <div class="col-lg-3">
                                <x-label class="required">{{__("Lat")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text"  disabled  field="lat" wire:model="realEstate.lat" placeholder="lat"
                                        dsiable />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required">{{__("lng")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text"  disabled field="lng" wire:model="realEstate.lng" placeholder="lng"
                                        dsiable />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required col-lg-8">{{__("Address")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" field="address" wire:model="realEstate.address"
                                        placeholder="address" disabled/>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required col-lg-8">{{__("Neighborhood")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" field="neighborhood" wire:model="realEstate.neighborhood"
                                        placeholder="neighborhood" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--end::Input group-->


                    <!--begin::Input group-->
                    <div class="row mb-0">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6 mt-4">{{__("Images")}}</label>
                        <!--begin::Label-->
                        <!--begin::Label-->
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="col-12" x-data="{ isUploading: false, progress: 0 }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress">
                                <label for="icon"
                                    class="btn btn-light btn-text-primary btn-hover-text-primary font-weight-bold btn-sm d-flex">
                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                        <!--begin::Svg Icon-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <rect fill="#000000" opacity="0.3" x="11" y="2" width="2" height="14"
                                                    rx="1" />
                                                <path
                                                    d="M12.0362375,3.37797611 L7.70710678,7.70710678 C7.31658249,8.09763107 6.68341751,8.09763107 6.29289322,7.70710678 C5.90236893,7.31658249 5.90236893,6.68341751 6.29289322,6.29289322 L11.2928932,1.29289322 C11.6689749,0.916811528 12.2736364,0.900910387 12.6689647,1.25670585 L17.6689647,5.75670585 C18.0794748,6.12616487 18.1127532,6.75845471 17.7432941,7.16896473 C17.3738351,7.57947475 16.7415453,7.61275317 16.3310353,7.24329415 L12.0362375,3.37797611 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <x-input type="file" id="icon" wire:model.lazy="images" field="images"
                                        style="display:none" multiple />
                                </label>

                                <div wire:loading wire:target="images">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>

                                @if($images)
                                    @foreach ($images as $image)
                                    <div class="symbol symbol-750 mt-5">
                                        <img alt="" src="{{ $image->temporaryUrl() }}" />
                                    </div>
                                    @endforeach
                                @elseif($realEstate->medias)
                                    @foreach ($realEstate->medias as $media)
                                    <div class="symbol symbol-150 mt-5">
                                        <img alt="" src="{{ asset($media->image) }}" />
                                    </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                        <!--begin::Label-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card body-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{route('admin.real-estates.index')}}"
                        class="btn btn-light btn-active-light-primary me-2">{{__("Back")}}</a>
                    <button type="button" class="btn btn-primary" wire:click.prevent="submit()"
                        wire:loading.attr="disabled"
                        wire:loading.class="spinner spinner-white spinner-left">{{__("Save")}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

    $('#type').select2({
        placeholder: 'select..',
    }).on('change', function () {
        @this.type = $(this).val();
    });  $('#city_id').select2({
        placeholder: 'select..',
    }).on('change', function () {
        @this.city_id = $(this).val();
    });  
     $('#country_id').select2({
        placeholder: 'select..',
    }).on('change', function () {
        @this.country_id = $(this).val();
    });   
    $('#contract_type_id').select2({
        placeholder: 'select..',
    }).on('change', function () {
        @this.contract_type_id = $(this).val();
    }); 
      $('#view_id').select2({
        placeholder: 'select..',
    }).on('change', function () {
        @this.view_id = $(this).val();
    });  
     $('#realestate_type_id').select2({
        placeholder: 'select..',
    }).on('change', function () {
        @this.realestate_type_id = $(this).val();
    });  
});

</script>