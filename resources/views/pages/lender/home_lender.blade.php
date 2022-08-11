@extends('layouts.user.lender.lender_template')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
        <h2>Beranda</h2>
        <p>Selamat datang di beranda kamu, *nama lender* !</p>
    </div>
</div><!-- End Breadcrumbs -->

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="{{ asset('') }}/img/aminahImg1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="{{ asset('') }}/img/aminahImg2cr.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('') }}/img/aminahImg4cr.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>

<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="course-item">
                        <img src="{{ asset('') }}/img/testimonials.jpg" class="img-fluid" alt="">
                        <div class="course-content">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4>Jenis Minumah</h4>
                                <p class="price">Jangka waktu</p>
                            </div>
                            <h3><a href="/lender/mitra/detail">Nama usaha</a></h3>
                            <div class="row">
                                <dl>
                                    <dt class="col-sm-6">Harga</dt>
                                    <dd class="col-sm-6">dana dibutuhkan</dd>

                                    <dt class="col-sm-6">Terkumpul</dt>
                                    <dd class="col-sm-6">dana terkumpul</dd>
                                </dl>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                            </div>
                        </div>
                    </div>
                </div>
            
            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="content">
                    <h3>Ingin Lihat Mitra Lebih Banyak?</h3>
                    <p>
                        Kamu dapat memilih banyak mitra yang cocok bagi kamu untuk kamu danai disini.
                    </p>
                    <div class="text-center">
                        <a href="/mitra" class="more-btn">Lihat Lebih Banyak <i class="bx bx-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection