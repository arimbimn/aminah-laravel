@extends('layouts.landingpage.template')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>Tentang Kami</h2>
            <p>Aminah merupakan sebuah platform yang memfasilitasi bertemunya antara pemilik dana dengan para pemilik UMKM yang mencari dana</p>
        </div>
    </div><!-- End Breadcrumbs -->

    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-4 pt-4 pt-lg-0 order-1 order-lg-1 content">
                    <h2> Apa itu Aminah?</h2>
                    <p>Aminah merupakan sebuah platform yang memfasilitasi bertemunya
                        antara pemilik dana dengan para pemilik UMKM yang mencari dana</p>
                </div>
                <div class="col-lg-3 order-2 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                    <img src="{{ asset('') }}/img/Aminah1.png" width="250" class="img-fluid" alt="">
                </div>
                <div class="col-lg-5 pt-4 pt-lg-0 order-3 order-lg-3 content">
                    <ul>
                        <li><i class="bi bi-check-circle"></i> Dengan menjadi sobat aminah, anda dapat membantu dalam memajukan UMKM dan membantu sesama.</li>
                        <li><i class="bi bi-check-circle"></i> Dengan menjadi Mitra Aminah, anda dapat mendapatkan tambahan modal dengan syarat mudah dan tanpa ada bunga.</li>
                    </ul>
                    <h2>Ingin jadi Mitra Aminah?</h2>
                    <a href="/mitra/daftar" class="get-started-btn">Daftar Jadi Mitra</a>

                </div>
            </div>

        </div>
    </section><!-- End About Section -->
@endsection
