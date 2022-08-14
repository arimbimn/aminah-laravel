@props(['name', 'disabled' => false, 'error' => false, 'icon' => false])

<input value="{{ old($name) }}" name="{{ $name }}" id="{{ $name }}" {{ $disabled ? 'disabled' : '' }} @if ($error) {!! $attributes->merge(['class' => 'form-control is-invalid']) !!} @else {!! $attributes->merge(['class' => 'form-control']) !!} @endif>
@if ($icon)
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas {{ $icon }}"></span>
        </div>
    </div>
@endif
@if ($error)
    <div class="invalid-feedback">
        {{ $error }}
    </div>
@endif
