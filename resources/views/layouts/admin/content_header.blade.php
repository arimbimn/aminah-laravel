@if (isset($page) || isset($breadcrumbs))
    <div class="container-fluid">
        <div class="row mb-2">
            {{-- BEGIN TITLE --}}
            @isset($page)
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $page }}</h1>
                </div>
            @endisset
            {{-- END TITLE --}}
            {{-- BEGIN BREADCRUMB --}}
            @isset($breadcrumbs)
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @foreach ($breadcrumbs as $breadcrumb)
                            <x-basic.breadcrumb title="{{ $breadcrumb['title'] }}" href="{{ $breadcrumb['href'] }}" active="{{ $breadcrumb['active'] }}" />
                        @endforeach
                    </ol>
                </div>
            @endisset
            {{-- END BREADCRUMB --}}
        </div>
    </div>
@endif
