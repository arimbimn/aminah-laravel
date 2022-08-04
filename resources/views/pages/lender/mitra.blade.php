@extends('layouts.user.lender.lender_template')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
        <h2>Mitra</h2>
        <p>Ini merupakan halaman kumpulan dari mitra Aminah yang telah melewati proses seleksi dari admin.
            Kamu dapat memilih mitra yang ingin kamu danai disini.
        </p>
    </div>
</div><!-- End Breadcrumbs -->

<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">

            
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="course-item">
                        <img src="{{ asset('') }}/img/aminahImg.jpg" class="img-fluid" alt="Silkysip">
                        <div class="course-content">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4>Minuman</h4>
                                <p class="price">12 bulan</p>
                            </div>
                            <h3><a href="/mitra/detail">Silkysip</a></h3>
                            <div class="row">
                                <dl>
                                    <dt class="col-sm-6">Harga</dt>
                                    <dd class="col-sm-6">10000000</dd>

                                    <dt class="col-sm-6">Terkumpul</dt>
                                    <dd class="col-sm-6">Rp100000</dd>
                                </dl>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width:10%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">10 %</div>
                            </div>
                        </div>
                    </div>
                </div>
           
            <!-- End Course Item-->
        </div>
    </div>
</section>

@endsection