<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="/dashboard" class="brand-link">
        <img src="assets/img/Aminah1.png" alt="Aminah Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Aminah</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('') }}/img/testimonials.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">*nama admin*</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link {{ $title === 'Aminah | Dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/data-pengajuan-masuk" class="nav-link {{ $title === 'Aminah | Data Pengajuan Masuk' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Data Pengajuan


                            <span class="badge badge-info right"> 10 </span>

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/rincian-pendanaan" class="nav-link {{ $title === 'Aminah | Rincian Pendanaan Aminah' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Data Rincian Pendanaan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/data-mitra" class="nav-link {{ $title === 'Aminah | Data Mitra Aminah' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Mitra
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/data-keuangan" class="nav-link {{ $title === 'Aminah | Data Keuangan Aminah' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Data Keuangan Aminah

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/data" class="nav-link {{ ($title === "Aminah | Data Admin Aminah") ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Admin

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-sign-out"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
