<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="/lender/home">Aminah</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="{{ isset($active) && $active == 'home' ? 'active' : '' }}" href="/lender/home">Home</a></li>
                <li><a class="{{ isset($active) && $active == 'mitra' ? 'active' : '' }}" href="/lender/mitra">Mitra</a></li>
                <li><a class="{{ isset($active) && $active == 'profile' ? 'active' : '' }}" href="/lender/profile">Profile</a></li>

                <a href="#" class="notification"><i class="fa fa-bell"></i></a>
                <a href="/lender/keranjang" class="cart {{ isset($active) && $active == 'cart' ? 'active' : '' }}">{{ \Cart::session(Auth::user()->id)->getContent()->count() >= 0? \Cart::session(Auth::user()->id)->getContent()->count(): '' }}<i class="fa fa-shopping-cart"></i></a>

        </nav><!-- .navbar -->

        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="get-started-btn">Keluar</button>
        </form>

    </div>
</header><!-- End Header -->
