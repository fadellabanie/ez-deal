<a {{ $attributes->merge(['class' => 'btn btn-icon btn-light btn-hover-primary btn-sm mx-3']) }} data-toggle="blockModal" data-target="#blockModal">
    <span class="svg-icon svg-icon-md svg-icon-primary">
        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
        <svg xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
            viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24" />
                <path
                    d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                    fill="#000000" fill-rule="nonzero"
                    transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                <path
                    d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
            </g>
        </svg>
        <!--end::Svg Icon-->
    </span>
</a>

<div wire:ignore.self class="modal fade blockModal" id="blockModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteModallLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="blockModalLabel">{{ __("Block User") }}</h5>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"></rect>
                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1"></rect>
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">{{__('End at')}}</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" type="date" wire:model="block_date">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <a wire:click="block()" class="mr-2 btn btn-danger font-weight-bold"  data-bs-dismiss="modal">{{ __("Block") }}</a>
                <a class="btn btn-dark font-weight-bold" data-bs-dismiss="modal">{{ __("Close") }}</a>
            </div>
        </div>
    </div>
</div>