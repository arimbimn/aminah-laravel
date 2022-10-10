{{-- begin --}}
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="/">Aminah</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="<?php echo isset($active) && $active == 'home' ? 'active' : ''; ?>" href="/">Home</a></li>
                <li><a class="<?php echo isset($active) && $active == 'tentang-kami' ? 'active' : ''; ?>" href="/tentang-kami">Tentang Kami</a></li>
                <li><a class="<?php echo isset($active) && $active == 'cara-kerja' ? 'active' : ''; ?>" href="/cara-kerja">Cara Kerja</a></li>  
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

        <a href="/login" class="get-started-btn">Masuk</a>

    </div>
</header>
{{-- end --}}
