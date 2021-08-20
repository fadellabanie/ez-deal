@if ($exists())
<div {{ $attributes->merge(['class' => 'alert alert-custom fade show mb-5']) }} role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">
        @if ($slot->isEmpty())
            {{ $message() }}
        @else
            {{ $slot }}
        @endif
    </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>
@endif
