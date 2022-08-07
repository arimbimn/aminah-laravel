<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.admin.header')

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        {{-- Preloader --}}
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('img/Aminah1.png') }}" alt="AminahLogo" width="150">
            {{-- <h2 class="brand-text font-weight-light">Aminah</h2> --}}
        </div>

        {{-- Navbar --}}
        @include('layouts.admin.navbar')
        {{-- Sidebar --}}
        @include('layouts.admin.sidebar')

        {{-- Begin content wrapper --}}
        <div class="content-wrapper">
            {{-- Begin content headeer --}}
            <div class="content-header">
                @include('layouts.admin.content_header')
            </div>
            {{-- End content header --}}
            {{-- Begin main content --}}
            <div class="content">
                @yield('content')
            </div>
            {{-- Emd main content --}}
        </div>
        {{-- End content wrapper --}}

        {{-- Footer --}}
        @include('layouts.admin.footer')
    </div>


    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('admin') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin') }}/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('admin') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{ asset('admin') }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ asset('admin') }}/plugins/chart.js/Chart.min.js"></script>

    {{-- SweetAlert2 --}}
    <script src="{{ asset('admin') }}/plugins/sweetalert2/sweetalert2.min.js"></script>

    @yield('third_party_scripts')
    @stack('page_scripts')
    <script>
        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut("slow");
        })
    </script>

</body>

</html>
