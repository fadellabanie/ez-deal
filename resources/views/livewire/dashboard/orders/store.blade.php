<div>
    <x-alert id='alert' class="alert-success"></x-alert>

    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true"
            aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{__("Create Order")}}</h3>
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
                                    <x-input type="text" field="name" wire:model="name" placeholder="name" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <x-label class="required">{{__("Type")}}</x-label>
                                <div class="col-lg-12">
                                    <select class="form-select form-select-solid form-select-l" wire:model="type">
                                        <option value="">{{__("Select Type")}}</option>
                                        <option value="normal">{{__("Normal")}}</option>
                                        <option value="special">{{__("special")}}</option>
                                    </select>
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
                                    <x-contract-type></x-contract-type>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <x-label class="required col-lg-12">{{__("Real Estate Type")}}</x-label>
                                <div class="col-lg-12">
                                    <x-realestate-type></x-realestate-type>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <x-label class="required">{{__("View")}}</x-label>
                                <div class="col-lg-12">
                                    <x-views-type></x-views-type>
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
                                    <x-input type="number" field="price" wire:model="price" placeholder="price" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required">{{__("Space")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" field="space" wire:model="space" placeholder="space" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required">{{__("Cities")}}</x-label>
                                <div class="col-lg-12">
                                    <x-city></x-city>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required">{{__("Countries")}}</x-label>
                                <div class="col-lg-12">
                                    <x-countries></x-countries>
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
                                        placeholder="number_building" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required col-lg-8">{{__("Age Building")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" field="age_building" wire:model="age_building"
                                        placeholder="age_building" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required col-lg-8">{{__("Stree Width")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" field="street_width" wire:model="street_width"
                                        placeholder="street_width" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required col-lg-8">{{__("Street Number")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" field="street_number" wire:model="street_number"
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
                                    <x-input type="text" field="type_of_owner" wire:model="type_of_owner"
                                        placeholder="type_of_owner" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <x-label class="required col-lg-8">{{__("Number Card")}}</x-label>
                                <div class="col-lg-12">
                                    <x-input type="text" field="number_card" wire:model="number_card"
                                        placeholder="number_card" />
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
                            <div class="col-lg-3" wire:ignore>
                                <x-label class="required">{{__("lng")}}</x-label>
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
                                        placeholder="neighborhood" />
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