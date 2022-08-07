<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @props([
    'title' => 'Aminah | Register Calon Mitra',
    'logo' => 'favicon.ico',
    'layoutType' => 'layout-top-nav',
])

    {{-- Title --}}
    <title>{{ isset($title) ? $title : '' }}</title>

    <!-- Favicons -->
    <link href="{{ asset($logo) }}" rel="icon" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin') }}/dist/css/adminlte.min.css">

    @yield('third_party_stylesheets')
    @stack('page_css')
</head>

<body class="hold-transition {{ $layoutType }}">
    <div class="wrapper">
        <div class="content-wrapper">
            {{ $slot }}
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin') }}/dist/js/adminlte.min.js"></script>

    @yield('third_party_scripts')
    @stack('page_scripts')
</body>

</html>
