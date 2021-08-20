@props(['value'])

<label {{ $attributes->merge(['class' => 'col-form-label col-3 text-lg-right text-left']) }}>
    {{ $value ?? $slot }}
</label>
