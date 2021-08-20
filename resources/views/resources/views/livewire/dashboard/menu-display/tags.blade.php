<div>
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">{{ __('Tags') }}</span>
            </h3>
            <div class="card-toolbar">
                
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-0">
            <div class="accordion accordion-toggle-arrow mb-10" id="accordionExample1">
                @foreach($tags as $key => $tag)
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTag{{ $tag->id }}">
                            {{ $tag->name }}
                            </div>
                        </div>
                        <div id="collapseTag{{ $tag->id }}" class="collapse" data-parent="#accordionExample1">
                            <div class="card-body">
                                <table class="table table-bordered">
                                   @foreach ($tag->products as $product)
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
