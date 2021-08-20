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
                            <span class="nav-text font-size-lg">{{ __('System Settings') }}</span>
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

                            <div class="col-xl-7 my-2">
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
                            <div class="col-xl-7 my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <x-label>{{ __('Phone') }}</x-label>
                                    <x-input wire:model.lazy="phone" field='phone' />
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
                                    <x-label>{{ __('Open From') }}</x-label>
                                    <x-input type="time" wire:model.lazy="open_from" field='open_from' />
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
                                    <x-label>{{ __('Open Till') }}</x-label>
                                    <x-input type="time" wire:model.lazy="open_till" field='open_till' />
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
                                    <x-label>{{ __('Latitude') }}</x-label>
                                    <x-input wire:model.lazy="lat" field='lat' />
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
                                    <x-label>{{ __('Longitude') }}</x-label>
                                    <x-input wire:model.lazy="lng" field='lng' />
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>


                    </div>
                    <!--end::Tab-->
                </div>
            </form>
        </div>
        <!--begin::Card body-->
        <div class="card-footer">
            <button type="button" class="btn btn-primary btn-sm mr-2" wire:click.prevent="submit"
                wire:loading.attr="disabled"
                wire:loading.class="spinner spinner-white spinner-left">{{ __('Save') }}</button>
            <button type="button" class="btn btn-secondary btn-sm" wire:click.prevent="resetForm"
                wire:loading.attr="disabled"
                wire:loading.class="spinner spinner-white spinner-left">{{ __('Cancel') }}</button>
        </div>
    </div>
</div>
@section('scripts')
<script sync
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-CfKkx_9uJ9L2YQSfH8ZcWOqcfZ7nItA&libraries=visualization&callback=initMap">
</script>
<script>
    let map;
    function initMap() {
      map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 8,
      });
    }
</script>



@endsection