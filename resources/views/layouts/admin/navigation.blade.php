@isset($buttons)
    @if (is_array($buttons))
        <div class="row">
            <div class="col-12">
                <div class="row d-flex justify-content-end mb-2">
                    @foreach ($buttons as $button)
                        <div class="@if (isset($button['width'])) col-12 @else col-md-6 @endif mb-0 d-flex d-none d-md-block d-lg-block mb-2">
                            <x-basic.anchor type="{{ $button['type'] }}" title="{{ $button['title'] }}" href="{{ $button['href'] }}" icon="{{ $button['icon'] }}" class="{{ $button['class'] }}" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endisset
