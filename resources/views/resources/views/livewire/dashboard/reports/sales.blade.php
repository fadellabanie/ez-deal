<div>
    <x-loader />

    <x-slot name="header">
        <!--begin::Subheader-->
        <div class="py-2 subheader py-lg-6 subheader-solid" id="kt_subheader">
            <div class="flex-wrap container-fluid d-flex align-items-center justify-content-between flex-sm-nowrap">
                <!--begin::Info-->
                <div class="flex-wrap mr-1 d-flex align-items-center">
                    <!--begin::Page Heading-->
                    <div class="flex-wrap mr-5 d-flex align-items-baseline">
                        <!--begin::Page Title-->
                        <h5 class="my-1 mr-5 text-dark font-weight-bold">{{ __('Sales') }}</h5>
                        <!--end::Page Title-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">

                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->
    </x-slot>

    <div class="card card-custom">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    {{ svg('Layers') }}
                </span>
                <h3 class="card-label">
                    {{ __('Sales by cashier') }}
                </h3>
            </div>
            <!--begin::Toolbar-->
            @can('Export Reports')

            <div class="card-toolbar">
                <button type="button" class="mr-2 btn btn-info btn-sm"
                    wire:click.prevent="exportByCashier">{{ __('Export') }}</button>
            </div>
            @endcan
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form class="form" id="kt_form1" wire:submit.prevent="exportByCashier">
                @csrf
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Cashier') }}</x-label>
                            <div class="col-9" wire:ignore>
                                <select class="form-control" id="cashier">
                                    <option value="all">{{ __('All') }}</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
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

    <div class="card card-custom mt-7">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    {{ svg('Layers') }}
                </span>
                <h3 class="card-label">
                    {{ __('Sales by payment method') }}
                </h3>
            </div>
            <!--begin::Toolbar-->
            @can('Export Reports')

            <div class="card-toolbar">
                <button type="button" class="mr-2 btn btn-info btn-sm"
                    wire:click.prevent="exportByPaymentMethod">{{ __('Export') }}</button>
            </div>
            @endcan
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form class="form" id="kt_form1" wire:submit.prevent="exportByPaymentMethod">
                @csrf
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Payment Methods') }}</x-label>
                            <div class="col-9" wire:ignore>
                                <select class="form-control" id="paymentMethod">
                                    <option value="all">{{ __('All') }}</option>
                                    @foreach($paymentMethods as $paymentMethod)
                                    <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
                                    @endforeach
                                </select>
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

    <div class="card card-custom mt-7">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    {{ svg('Layers') }}
                </span>
                <h3 class="card-label">
                    {{ __('Sales by coupon') }}
                </h3>
            </div>
            <!--begin::Toolbar-->
            @can('Export Reports')

            <div class="card-toolbar">
                <button type="button" class="mr-2 btn btn-info btn-sm"
                    wire:click.prevent="exportByCoupon">{{ __('Export') }}</button>
            </div>
            @endcan
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form class="form" id="kt_form1" wire:submit.prevent="exportByCoupon">
                @csrf
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Coupon') }}</x-label>
                            <div class="col-9" wire:ignore>
                                <select class="form-control" id="coupon">
                                    <option value="all">{{ __('All') }}</option>
                                    @foreach($coupons as $coupon)
                                    <option value="{{ $coupon->id }}">{{ $coupon->name }}</option>
                                    @endforeach
                                </select>
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

    <div class="card card-custom mt-7">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    {{ svg('Layers') }}
                </span>
                <h3 class="card-label">
                    {{ __('Sales by categories') }}
                </h3>
            </div>
            <!--begin::Toolbar-->
            @can('Export Reports')

            <div class="card-toolbar">
                <button type="button" class="mr-2 btn btn-info btn-sm"
                    wire:click.prevent="exportByCategory">{{ __('Export') }}</button>
            </div>
            @endcan
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form class="form" id="kt_form1" wire:submit.prevent="exportByCategory">
                @csrf
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Categories') }}</x-label>
                            <div class="col-9" wire:ignore>
                                <select class="form-control" id="categories">
                                    <option value="all">{{ __('All') }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
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

    <div class="card card-custom mt-7">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    {{ svg('Layers') }}
                </span>
                <h3 class="card-label">
                    {{ __('Sales by products') }}
                </h3>
            </div>
            <!--begin::Toolbar-->
            @can('Export Reports')

            <div class="card-toolbar">
                <button type="button" class="mr-2 btn btn-info btn-sm"
                    wire:click.prevent="exportByProduct">{{ __('Export') }}</button>
            </div>
            @endcan
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form class="form" id="kt_form1" wire:submit.prevent="exportByProduct">
                @csrf
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Products') }}</x-label>
                            <div class="col-9" wire:ignore>
                                <select class="form-control" id="products">
                                    <option value="all">{{ __('All') }}</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
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

    <div class="card card-custom mt-7">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    {{ svg('Layers') }}
                </span>
                <h3 class="card-label">
                    {{ __('Sales by modifiers') }}
                </h3>
            </div>
            <!--begin::Toolbar-->
            @can('Export Reports')
            <div class="card-toolbar">
                <button type="button" class="mr-2 btn btn-info btn-sm"
                    wire:click.prevent="exportByModifier">{{ __('Export') }}</button>
            </div>
            @endcan
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form class="form" id="kt_form1" wire:submit.prevent="exportByModifier">
                @csrf
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Modifiers') }}</x-label>
                            <div class="col-9" wire:ignore>
                                <select class="form-control" id="modifiers">
                                    <option value="all">{{ __('All') }}</option>
                                    @foreach($modifiers as $modifier)
                                        <option value="{{ $modifier->id }}">{{ $modifier->name }}</option>
                                    @endforeach
                                </select>
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

    <div class="card card-custom mt-7">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    {{ svg('Layers') }}
                </span>
                <h3 class="card-label">
                    {{ __('Sales by combos') }}
                </h3>
            </div>
            <!--begin::Toolbar-->
            @can('Export Reports')

            <div class="card-toolbar">
                <button type="button" class="mr-2 btn btn-info btn-sm"
                    wire:click.prevent="exportByCombo">{{ __('Export') }}</button>
            </div>
            @endcan
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form class="form" id="kt_form1" wire:submit.prevent="exportByCombo">
                @csrf
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Combos') }}</x-label>
                            <div class="col-9" wire:ignore>
                                <select class="form-control" id="combos">
                                    <option value="all">{{ __('All') }}</option>
                                    @foreach($combos as $combo)
                                    <option value="{{ $combo->id }}">{{ $combo->name }}</option>
                                    @endforeach
                                </select>
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

    <div class="card card-custom mt-7">
        <!--begin::Card header-->
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    {{ svg('Layers') }}
                </span>
                <h3 class="card-label">
                    {{ __('Sales by Order Types') }}
                </h3>
            </div>
            <!--begin::Toolbar-->
            @can('Export Reports')
            <div class="card-toolbar">
                <button type="button" class="mr-2 btn btn-info btn-sm"
                    wire:click.prevent="exportByOrderType">{{ __('Export') }}</button>
            </div>
            @endcan
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <form class="form" id="kt_form1" wire:submit.prevent="exportByOrderType">
                @csrf
                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="my-2 col-xl-7">
                        <!--begin::Group-->
                        <div class="form-group row">
                            <x-label>{{ __('Order Types') }}</x-label>
                            <div class="col-9">
                                <select class="form-control" id="orderTypes" wire:model.defer='orderType'>
                                    <option value="all">{{ __('All') }}</option>
                                    @foreach($orderTypes as $orderType)
                                        <option value="{{ $orderType->id }}">{{ $orderType->name }}</option>
                                    @endforeach
                                </select>
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
    @push('scripts')
    <script>
        $(document).ready(function() {
                $('#cashier').select2({
                    placeholder: '',
                }).on('change', function () {
                    @this.cashier = $(this).val();
                });

                $('#paymentMethod').select2({
                    placeholder: '',
                }).on('change', function () {
                    @this.payment_method = $(this).val();
                });

                $('#coupon').select2({
                    placeholder: '',
                }).on('change', function () {
                    @this.coupon = $(this).val();
                });

                $('#categories').select2({
                    placeholder: '',
                }).on('change', function () {
                    @this.category = $(this).val();
                });

                $('#products').select2({
                    placeholder: '',
                }).on('change', function () {
                    @this.product = $(this).val();
                });

                $('#modifiers').select2({
                    placeholder: '',
                }).on('change', function () {
                    @this.modifier = $(this).val();
                });

                $('#combos').select2({
                    placeholder: '',
                }).on('change', function () {
                    @this.combo = $(this).val();
                });
            });
    </script>
    @endpush
</div>