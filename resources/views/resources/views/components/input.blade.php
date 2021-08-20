@props(['disabled' => false, 'field'])

<div class="col-9">
    <input {{ $disabled ? 'disabled' : '' }}
    {!! ($errors->has($field))
        ? $attributes->merge(['class' => "form-control form-control-lg is-invalid"])
        : $attributes->merge(['class' => "form-control form-control-lg"]) !!} >

    <x-error field="{{ $field }}" />
</div>
