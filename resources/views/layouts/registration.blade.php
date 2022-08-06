<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @props(['title' => 'Aminah | Register Calon Mitra'])
  {{-- Title --}}
  <title>{{ isset($title) ? $title : '' }}</title>

  <!-- Favicons -->
  <link href="{{ asset('img/Logo-Aminah-03.png') }}" rel="icon" type="image/x-icon">

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

<body class="hold-transition layout-top-nav">
  {{ $slot }}
  @yield('third_party_scripts')
  @stack('page_scripts')
</body>

</html>
