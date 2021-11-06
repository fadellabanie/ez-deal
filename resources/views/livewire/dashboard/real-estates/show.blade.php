<div>
    <x-alert id='alert' class="alert-success"></x-alert>

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                <!--begin::Navbar-->
                <div class="card mb-6 mb-xl-9">
                    <div class="card-body pt-9 pb-0">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                            <!--begin::Image-->
                            <div
                                class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                              
                                @if ($realEstate->medias)
                                <img class="mw-50px mw-lg-75px"
                                src="{{asset($realEstate->medias->first()->image ?? "")}}" alt="image" />
                                @endif
                              
                            </div>
                            <!--end::Image-->
                            <!--begin::Wrapper-->
                            <div class="flex-grow-1">
                                <!--begin::Head-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <!--begin::Details-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Status-->
                                        <div class="d-flex align-items-center mb-1">
                                            <a href="#"
                                                class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3">{{$realEstate->name}}</a>
                                            {!!isActive($realEstate->type,$realEstate->end_date)!!}
                                        </div>
                                        <!--end::Status-->
                                        <!--begin::Description-->
                                        <div class="d-flex flex-wrap fw-bold mb-4 fs-5 text-gray-400">
                                            {{$realEstate->city->en_name}} - {{$realEstate->country->en_name}} -
                                            {{$realEstate->address}}</div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="d-flex my-4">

                                        <x-publish wire:click="conformPublish()"></x-publish>

                                    </div>
                                </div>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Details-->
                        <div class="separator mb-6"></div>

                        <div class="card pt-4 mb-6 mb-xl-9">
                            <div class="card-header border-0">
                                <div class="card-title">
                                    <h2 class="fw-bolder mb-0">{{__("RealEstate Info")}}</h2>
                                </div>

                                <div class="card-toolbar">
                                </div>
                            </div>
                            <div id="kt_customer_view_payment_method" class="card-body pt-0">
                                <div class="py-0" data-kt-customer-payment-method="row">
                                  
                                    @if ($realEstate->user)
                                    <div class="py-3 d-flex flex-stack flex-wrap">
                                        <div class="d-flex align-items-center collapsible rotate"
                                            data-bs-toggle="collapse" href="#kt_customer_view_payment_method_1"
                                            role="button" aria-expanded="false"
                                            aria-controls="kt_customer_view_payment_method_1">
                                            <div class="me-3 rotate-90">
                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-right.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                            <path
                                                                d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999)">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </div>
                                            <img src="{{asset($realEstate->user->avatar ?? "")}}" class="w-40px me-3"
                                                alt="">
                                            <div class="me-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="text-gray-800 fw-bolder">
                                                        <a href="{{route('admin.users.show',$realEstate->user->id)}}"
                                                            class="text-gray-800 text-hover-primary fs-3 fw-bolder me-1">
                                                            {{$realEstate->user->name}}
                                                        </a>
                                                    </div>
                                                    <div class="badge badge-light-primary ms-5">
                                                        {{$realEstate->user->type}}</div>
                                                </div>
                                                <div class="text-muted">{{$realEstate->user->mobile}}</div>
                                                <div class="text-muted">{{$realEstate->user->email}}</div>
                                            </div>
                                            <!--end::Summary-->
                                        </div>
                                        <!--end::Toggle-->
                                    </div>
                                    @else
                                    <div class="py-3 d-flex flex-stack flex-wrap">
                                        <div class="d-flex align-items-center collapsible rotate"
                                            data-bs-toggle="collapse" href="#kt_customer_view_payment_method_1"
                                            role="button" aria-expanded="false"
                                            aria-controls="kt_customer_view_payment_method_1">
                                            <div class="me-3 rotate-90">
                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-right.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                            <path
                                                                d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999)">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </div>
                                            <img src="{{asset($realEstate->user->avatar ?? Auth::user()->avatar)}}"
                                                class="w-40px me-3" alt="">
                                            <div class="me-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="text-gray-800 fw-bolder">
                                                        <a href="#"
                                                            class="text-gray-800 text-hover-primary fs-3 fw-bolder me-1">
                                                            {{$realEstate->user->name ?? "admin-".Auth::user()->name}}
                                                        </a>
                                                    </div>
                                                    <div class="badge badge-light-primary ms-5">
                                                        {{$realEstate->user->type ?? "admin"}}</div>
                                                </div>
                                                <div class="text-muted">
                                                    {{$realEstate->user->mobile ?? "admin-".Auth::user()->mobile}}</div>
                                                <div class="text-muted">
                                                    {{$realEstate->user->email ?? "admin-".Auth::user()->email}}</div>
                                            </div>
                                            <!--end::Summary-->
                                        </div>
                                        <!--end::Toggle-->
                                    </div>
                                    @endif

                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div id="kt_customer_view_payment_method_1" class="collapse show fs-6 ps-10"
                                        data-bs-parent="#kt_customer_view_payment_method">
                                        <!--begin::Details-->
                                        <div class="d-flex flex-wrap py-5">
                                            <!--begin::Col-->
                                            <div class="flex-equal me-5">
                                                <table class="table table-flush fw-bold gy-1">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                {{__("Realestate Type")}}</td>
                                                            <td class="text-gray-800">
                                                                {{$realEstate->realestateType->en_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                {{__("Contract Type")}}</td>
                                                            <td class="text-gray-800">
                                                                {{$realEstate->contractType->en_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">{{__("View")}}
                                                            </td>
                                                            <td class="text-gray-800">{{$realEstate->view->en_name}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">{{__("City")}}
                                                            </td>
                                                            <td class="text-gray-800">{{$realEstate->city->en_name}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">{{__("Country")}}
                                                            </td>
                                                            <td class="text-gray-800">{{$realEstate->country->en_name}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">{{__("Address")}}
                                                            </td>
                                                            <td class="text-gray-800">{{$realEstate->address}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                {{__("Neighborhood")}}</td>
                                                            <td class="text-gray-800">{{$realEstate->neighborhood->en_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                {{__("Type")}}</td>
                                                            <td class="text-gray-800">{{$realEstate->type}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                {{__("Type Of Owner")}}</td>
                                                            <td class="text-gray-800">{{$realEstate->type_of_owner}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                {{__("Number Card")}}</td>
                                                            <td class="text-gray-800">{{$realEstate->number_card}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="flex-equal">
                                                <table class="table table-flush fw-bold gy-1">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">{{__("Price")}}
                                                            </td>
                                                            <td class="text-gray-800">{{$realEstate->price}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">{{__("Space")}}
                                                            </td>
                                                            <td class="text-gray-800">{{$realEstate->space}}</td>
                                                        </tr>

                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                {{__("Number Building")}}</td>
                                                            <td class="text-gray-800">{{$realEstate->number_building}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                {{__("Age Building")}}</td>
                                                            <td class="text-gray-800">{{$realEstate->age_building}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                {{__("Street Width")}}</td>
                                                            <td class="text-gray-800">{{$realEstate->street_width}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                {{__("Street Number")}}</td>
                                                            <td class="text-gray-800">{{$realEstate->street_number}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-125px">
                                                                {{__("Video Url")}}</td>
                                                            <td class="text-gray-800">
                                                                <a href="#"
                                                                    class="text-gray-900 text-hover-primary">{{$realEstate->video_url}}</a>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end::Col-->



                                        </div>


                                        <div class="row g-10">
                                            <!--begin::Table container-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table
                                                    class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <tr
                                                            class="fw-bolder fs-6 text-gray-800 text-center border-0 bg-light">
                                                            <th class="min-w-200px rounded-start"></th>
                                                            <th class="min-w-140px">Regular</th>
                                                        </tr>
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody class="border-bottom border-dashed">
                                                        <tr class="fw-bold fs-6 text-gray-800 text-center">
                                                            <td class="text-start ps-6 fs-4"> {{__("Elevator")}}
                                                            </td>
                                                            <td>
                                                                @if ($realEstate->elevator == true)
                                                                <x-success></x-success>
                                                                @else
                                                                <x-navigation></x-navigation>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr class="fw-bold fs-6 text-gray-800 text-center">
                                                            <td class="text-start ps-6 fs-4"> {{__("Parking")}}
                                                            </td>
                                                            <td>
                                                                @if ($realEstate->parking == true)
                                                                <x-success></x-success>
                                                                @else
                                                                <x-navigation></x-navigation>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr class="fw-bold fs-6 text-gray-800 text-center">
                                                            <td class="text-start ps-6 fs-4"> {{__("AC")}}
                                                            </td>
                                                            <td>
                                                                @if ($realEstate->ac == true)
                                                                <x-success></x-success>
                                                                @else
                                                                <x-navigation></x-navigation>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr class="fw-bold fs-6 text-gray-800 text-center">
                                                            <td class="text-start ps-6 fs-4"> {{__("Furniture")}}
                                                            </td>
                                                            <td>
                                                                @if ($realEstate->furniture == true)
                                                                <x-success></x-success>
                                                                @else
                                                                <x-navigation></x-navigation>
                                                                @endif
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Table container-->
                                        </div>

                                        <div class="row g-10">
                                            <!--begin::Col-->
                                          
                                            @forelse ($realEstate->medias as $media)
                                            <div class="col-md-4">
                                                <!--begin::Feature post-->
                                                <div class="card-xl-stretch me-md-6">
                                                    <!--begin::Image-->
                                                    <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5"
                                                        style="background-image:url('{{asset($media->image ?? "")}}')"
                                                        data-fslightbox="lightbox-video-tutorials">
                                                        <img src=""
                                                            class="position-absolute top-50 start-50 translate-middle"
                                                            alt="">
                                                    </a>
                                                    <!--end::Image-->

                                                </div>
                                                <!--end::Feature post-->
                                            </div>
                                            @empty

                                            @endforelse
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Option-->
                                <div class="separator separator-dashed"></div>
                            </div>
                            <!--end::Card body-->
                        </div>
                    </div>
                </div>
                <!--end::Navbar-->



            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->

</div>

@section('scripts')

<script type="text/javascript">
    window.livewire.on('openPublishModal', () => {
        $('#publishModal').modal('show');
    }); 
    window.livewire.on('closePublishModal', () => {
        $('#publishModal').modal('hide');
    });
</script>
@endsection