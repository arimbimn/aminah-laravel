@props(['href' => '#', 'active' => false, 'title' => 'Page'])

<li class="breadcrumb-item @if ($active == 1) {{ 'active' }} @endif ">
    @if ($active == 1)
        {{ $title }}
    @endif
    @if ($active == 0)
        <a href="{{ $href }}">{{ $title }}</a>
    @endif
</li>
