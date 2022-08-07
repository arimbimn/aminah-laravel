@extends('layouts.landingpage.template')

@section('content')
    {{-- BEGIN HERO --}}
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>AMINAH</h1>
            <h2>Aman, Terjamin, dan Berbasis Syariah</h2>
            <a href="/login" class="btn-get-started">Ayo Mulai Danai</a>
        </div>
    </section>
    {{-- END HERO --}}

    <main>
        {{-- ABOUT CONTENT --}}
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Tentang Kami</h2>
                    <p>Apa itu Aminah?</p>
                </div>
                <div class="row">
                    <div class="col-lg-4 pt-4 pt-lg-0 order-1 order-lg-1 content">
                        <h2> Aminah</h2>
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
        </section>
        {{-- ABOUT CONTENT --}}
        {{-- WHY US CONTENT --}}
        <section id="why-us" class="why-us">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Cara Kerja</h2>
                    <p>CARA KERJA AMINAH</p>
                </div>
                <div class="row">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-xl-3 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-receipt"></i>
                                    <h4>Daftar/Masuk</h4>
                                    <p>Lender dapat melakukan login apabila telah memiliki akun dan dapar mendaftar apabila belum memiliki akun</p>
                                </div>
                            </div>
                            <div class="col-xl-3 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-cube-alt"></i>
                                    <h4>Pilih Mitra</h4>
                                    <p>Apabila lender telah mmasuk kedalam akun miliknya, maka lender dapat memilih mitra mana yang akan didanai</p>
                                </div>
                            </div>
                            <div class="col-xl-3 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-images"></i>
                                    <h4>Lakukan Pembayaran</h4>
                                    <p>Setelah lender memilih mitra, maka lender diminta untuk melakukan pembayaran sehingga dana dapat tersalurkan apabila jumlah telah sesuai</p>
                                </div>
                            </div>
                            <div class="col-xl-3 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-images"></i>
                                    <h4>Raih Imbal Hasil</h4>
                                    <p>Lender akan mendapatkan imbal hasil apabila borrower telah melakukan pengembalian hasil</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- WHY US CONTENT --}}

        {{-- MITRA CONTENT --}}
        <section id="popular-courses" class="courses">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Mitra</h2>
                    <p>MITRA KAMI</p>
                </div>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="course-item">
                            <img src="{{ asset('') }}/img/aminahImg.jpg" class="img-fluid" alt="silkysip">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>minuman</h4>
                                    <p class="price">12 bulan</p>
                                </div>
                                <h3><a href="/login">SilkySip</a></h3>
                                <div class="row">
                                    <dl>
                                        <dt class="col-sm-6">Harga</dt>
                                        <dd class="col-sm-6">0</dd>

                                        <dt class="col-sm-6">Terkumpul</dt>
                                        <dd class="col-sm-6">0</dd>
                                    </dl>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- END MITRA CONTENT --}}
    </main>
@endsection
