<div>
    @if ($paginator->hasPages())
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex flex-wrap py-2 mr-3">
                @if ($paginator->onFirstPage())
                    <span class="btn btn-icon btn-sm btn-light mr-2 my-1 disabled"><i class="ki ki-bold-arrow-next icon-xs"></i></span>
                @else
                    <button class="btn btn-icon btn-sm btn-light mr-2 my-1" wire:click="previousPage" wire:loading.attr="disabled" rel="prev"><i class="ki ki-bold-arrow-next icon-xs"></i></button>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1 disabled">{{ $element }}</span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="btn btn-icon btn-sm border-0 btn-light btn-hover-primary active mr-2 my-1" wire:key="paginator-page-{{ $page }}">{{ $page }}</span>
                            @else
                                <button class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1" wire:key="paginator-page-{{ $page }}" wire:click="gotoPage({{ $page }})">{{ $page }}</button>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button class="btn btn-icon btn-sm btn-light mr-2 my-1" wire:click="nextPage" wire:loading.attr="disabled"><i class="ki ki-bold-arrow-back icon-xs"></i></button>
                @else
                    <span class="btn btn-icon btn-sm btn-light mr-2 my-1 disabled"><i class="ki ki-bold-arrow-back icon-xs"></i></span>
                @endif
            </div>

            <div class="d-flex align-items-center py-3">
                <select class="form-control form-control-sm font-weight-bold mr-4 border-0 bg-light" style="width: 75px;">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span class="text-muted">{{ __('Showing') }} {{ $paginator->firstItem() }} {{ __('to') }} {{ $paginator->lastItem() }} {{ __('of') }} {{ $paginator->total() }} {{ __('results') }}</span>
            </div>
        </div>
    @endif
</div>
