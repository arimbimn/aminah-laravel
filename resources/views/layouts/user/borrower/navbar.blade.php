<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="/mitra/profile">Aminah</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li class="dropdown"><a href="#">{{ Auth::user()->name }}<i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown">Logout<i class="fa fa-sign-out"></i></a></li>
                        <form id="logout-form" action="@if (Route::has('logout')) {{ route('logout') }} @endif" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header><!-- End Header -->