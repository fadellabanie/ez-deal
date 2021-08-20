<div>
    <x-loader />
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">{{ __('Categories') }}</span>
            </h3>
            <div class="card-toolbar">

            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-0">
            <div class="accordion accordion-toggle-arrow mb-10" id="accordionExample1">
                @foreach($categories as $key => $category)
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <div class="mx-3">
                                @if (! $loop->first)
                                <a href="javascript:;" wire:click.prevent="sortUp({{ $category->id }})">
                                    <i class="far fa-arrow-alt-circle-up"></i>
                                </a>
                                @endif

                                @if (! $loop->last)
                                <a href="javascript:;" wire:click.prevent="sortDown({{ $category->id }})">
                                    <i class="far fa-arrow-alt-circle-down"></i>
                                </a>
                                @endif
                            </div>
                            <div class="card-title collapsed" data-toggle="collapse" style="position: inherit;" data-target="#collapseCategory{{ $category->id }}">
                            {{ $category->name }}
                            </div>
                        </div>
                        <div id="collapseCategory{{ $category->id }}" class="collapse" data-parent="#accordionExample1">
                            <div class="card-body">
                                <table class="table table-bordered">
                                   @foreach ($category->products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                        </tr>
                                   @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!--end::Body-->
    </div>
</div>