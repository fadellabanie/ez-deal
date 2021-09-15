<div>
    <x-alert id='alert' class="alert-success"></x-alert>

    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true"
            aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{__("Create Real Estate")}}</h3>
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
                                    <x-input type="text" field="name" wire:model="name" placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <x-label class="required">{{__("Type")}}</x-label>
                                <div class="col-lg-12">
                                    <div wire:ignore>
                                        <select wire:model="type" id="type" name="type" data-control="select2"
                                            class="form-select form-select-solid form-select-l">
                                            <option value="">{{__("Select Type")}}</option>
                                            <option value="normal">{{__("Normal")}}</option>
                                            <option value="special">{{__("special")}}</option>
                                        </select>
                                    </div>
                                    <x-error-select field="type" />
                                </div>
                            </div>


                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <div class="row fv-row fv-plugins-icon-container">
                            <div class="col-lg-4">
                                <x-label class="required col-lg-12">{{__("Contract Type")}}</x-label>
                                <div class="col-lg-12">
                                    <div wire:ignore>
                                        <select wire:model="contract_type_id" id="contract_type_id"
                                            name="contract_type_id" data-control="select2"
                                            class="form-select form-select-solid form-select-l">
                                            <option value="">{{__("Select Type")}}</option>

                                            @foreach (contractTypes() as $contractType)
                                            <option value="{{$contractType->id}}">{{$contractType->en_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-error-select field="contract_type_id" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <x-label class="required col-lg-12">{{__("Real Estate Type")}}</x-label>
                                <div class="col-lg-12">
                                    <div wire:ignore>
                                        <select wire:model="realestate_type_id" id="realestate_type_id"
                                            name="realestate_type_id" data-control="select2"
                                            class="form-select form-select-solid form-select-l">
                                            <option value="">{{__("Select Type")}}</option>

                                            @foreach (realestateType() as $realestateType)
                                            <option value="{{$realestateType->id}}">{{$realestateType->en_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-error-select field="realestate_type_id" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <x-label class="required">{{__("View")}}</x-label>
                                <div class="col-lg-12">
                                    <div wire:ignore>
                                        <select wire:model="view_id" id="view_id" name="view_id" data-control="select2"
                                            class="form-select form-select-solid form-select-l">
                                            <option value="">{{__("Select Type")}}</option>

                                            @foreach (viewTypes() as $view)
                                            <option value="{{$view->id}}">{{$view->en_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-error-select field="view_id" />
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
                                    <x-input type="number" field="price" wire:model="price" placeholder="Enter price" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required">{{__("Space")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="number" field="space" wire:model="space" placeholder="Enter space" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required">{{__("Cities")}}</x-label>

                                <div class="col-lg-12">
                                    <div wire:ignore>
                                        <select wire:model="city_id" id="city_id" name="city_id" data-control="select2"
                                            class="form-select form-select-solid form-select-l">
                                            <option value="">{{__("Select Type")}}</option>

                                            @foreach (cities() as $city)
                                            <option value="{{$city->id}}">{{$city->en_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-error-select field="city_id" />

                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required">{{__("Countries")}}</x-label>
                                <div class="col-lg-12">
                                    <div wire:ignore>
                                        <select wire:model="country_id" id="country_id" name="country_id"
                                            data-control="select2" class="form-select form-select-solid form-select-l">
                                            <option value="">{{__("Select Type")}}</option>

                                            @foreach (countries() as $country)
                                            <option value="{{$country->id}}">{{$country->en_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-error-select field="country_id" />
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
                                    <x-input type="number" field="number_building" wire:model="number_building"
                                        placeholder="Enter number building" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required col-lg-8">{{__("Age Building")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="number" field="age_building" wire:model="age_building"
                                        placeholder="Enter age building" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required col-lg-8">{{__("Stree Width")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="number" field="street_width" wire:model="street_width"
                                        placeholder="Enter street width" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required col-lg-8">{{__("Street Number")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="number" field="street_number" wire:model="street_number"
                                        placeholder="Enter street number" />
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
                                    <x-input type="text" field="type_of_owner" wire:model="type_of_owner"
                                        placeholder="Enter type of owner" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required col-lg-8">{{__("Number Card")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" field="number_card" wire:model="number_card"
                                        placeholder="Enter number card" />
                                </div>
                            </div>
                            <div class="col-lg-3 ">
                                <x-label>{{__("Note")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" field="note" wire:model="note" placeholder="note" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label>{{__("Video Url")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" field="video_url" wire:model="video_url"
                                        placeholder="Enter video url" />
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
                                <input class="form-check-input w-45px h-30px" type="checkbox" wire:model="elevator"
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
                        <label class="col-lg-4 col-form-label fw-bold fs-6">{{__("Parking")}}</label>
                        <!--begin::Label-->
                        <!--begin::Label-->
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="form-check form-check-solid form-switch fv-row">
                                <input class="form-check-input w-45px h-30px" type="checkbox" wire:model="parking"
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
                        <label class="col-lg-4 col-form-label fw-bold fs-6">{{__("AC")}}</label>
                        <!--begin::Label-->
                        <!--begin::Label-->
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="form-check form-check-solid form-switch fv-row">
                                <input class="form-check-input w-45px h-30px" type="checkbox" wire:model="ac"
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
                                <input class="form-check-input w-45px h-30px" type="checkbox" wire:model="furniture"
                                    id="allowmarketing" checked="checked" />
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
                                <x-label class="required" wire:ignore>{{__("Lat")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" disabled id="lat" field="lat" wire:model="lat"
                                        placeholder="lat" dsiable />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required" wire:ignore>{{__("lng")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" disabled id="lng" field="lng" wire:model="lng"
                                        placeholder="lng" dsiable />
                                </div>
                            </div>
                            <div class="col-lg-3" wire:ignore>
                                <x-label class="required col-lg-8">{{__("Address")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" disabled id="address" field="address" wire:model="address"
                                        placeholder="address" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required col-lg-8">{{__("Neighborhood")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" field="neighborhood" wire:model="neighborhood"
                                        placeholder="Enter neighborhood" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--begin::Input group-->
                    <div class="row mb-4">
                        <div class="row fv-row fv-plugins-icon-container">
                            <div class="col-lg-12" wire:ignore>
                                <div id="map"></div>
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


@section('scripts')

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSV3uGzoiW9CdrhOvSukkk6pLzhnBaotI&callback=initMap&libraries=places&v=weekly">
</script>
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
<script>
    var lat, lng;
    var markers = [];
  
    function initMap(data) {
       
        var options = {
            center: {
                lat: {{ !empty($lat) ? $lat : 21.68381073128686 }},
                lng: {{ !empty($lng) ? $lng : 39.20255972375944 }},
            },
            zoom: 12,
        }
        var map = new google.maps.Map(document.getElementById('map'), options);
        map.addListener('click', function(e) {

            var geocoder = geocoder = new google.maps.Geocoder();
                geocoder.geocode({ 'latLng': e.latLng }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[1]) {
                            document.getElementById("address").value = results[1].formatted_address;
                            @this.address = results[1].formatted_address;

                           // alert("Location: " + results[1].formatted_address + "\r\nLatitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
                        }
                    }
                });

            placeMarkerAndPanTo(e.latLng, map);
        });

        markers.push({
            lat: {{ !empty($lat) ? $lat : 21.68381073128686 }},
            lng: {{ !empty($lng) ? $lng : 39.20255972375944 }},
        });
        var marker = new google.maps.Marker({
            position: markers[0],
            map: map
        });


        function placeMarkerAndPanTo(latLng, map) {
            document.getElementById("lat").value = latLng.lat();
            document.getElementById("lng").value = latLng.lng();
            marker.setPosition(latLng);
            map.panTo(latLng);
            @this.lat = latLng.lat();
            @this.lng = latLng.lng();

        }
    }

</script>

@endsection