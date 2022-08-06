@props(['name', 'disabled' => false, 'error' => false])

<input value="{{ old($name) }}" name="{{ $name }}" id="{{ $name }}" {{ $disabled ? 'disabled' : '' }} @if ($error) {!! $attributes->merge(['class' => 'form-control is-invalid']) !!} @else {!! $attributes->merge(['class' => 'form-control']) !!} @endif>
@if ($error)
  <div class="invalid-feedback">
    {{ $error }}
  </div>
@endif
