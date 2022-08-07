@props(['href' => '#', 'type' => 'success', 'target' => '_self', 'icon' => 'fa-user', 'title' => 'link', 'value' => false, 'class' => 'col-12'])

<a href="{{ $href }}" class="btn btn-{{ $type }} {{ isset($class) ? $class : '' }}" target="{{ $target }}" @isset($value) value="{{ $value }}" @endisset>
    <i class="fa {{ $icon }}"></i>
    {{ $title }}
</a>
