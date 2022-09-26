<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/pengajuan" class="brand-link">
        <img src="{{ asset('img/Aminah1.png') }}" alt="Aminah Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Aminah</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/user.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/admin/pengajuan" class="nav-link {{ isset($active) && $active == 'pengajuan' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Data Pengajuan
                            <span class="badge badge-info right"> {{ isset($totalPengajuan) ? $totalPengajuan : '0' }}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/pendanaan" class="nav-link {{ isset($active) && $active == 'pendanaan' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Data Rincian Pendanaan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/mitra" class="nav-link {{ isset($active) && $active == 'mitra' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Mitra
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/transaksi" class="nav-link {{ isset($active) && $active == 'keuangan' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Data Keuangan Aminah

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/user" class="nav-link {{ isset($active) && $active == 'user' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Admin

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="nav-icon fas fa-sign-out"></i>
                        <p>
                            Logout
                        </p>
                        <form id="logout-form" action="@if (Route::has('logout')) {{ route('logout') }} @endif" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
