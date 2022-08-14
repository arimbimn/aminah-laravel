@extends('layouts.user.lender.template')

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

                @if (isset($mitra) && $mitra != null)
                    @foreach ($mitra as $index => $mitra)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="course-item">
                                <img src="{{ isset($mitra->borrower) ? asset('pendaftaran/' . $mitra->borrower->business_image) : asset('img/testimonials.jpg') }}" class="img-fluid" alt="gambar">
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>Jenis Minuman</h4>
                                        <p class="price">{{ isset($mitra->borrower) && !is_null($mitra->borrower->duration) ? $mitra->borrower->duration . ' Bulan' : 'Jangka Waktu: -' }}</p>
                                    </div>
                                    <h3><a href="/lender/mitra/detail">{{ isset($mitra->borrower) ? $mitra->borrower->business_name : 'Usaha' }}</a></h3>
                                    <div class="row">
                                        <dl>
                                            <dt class="col-sm-6">{{ 'Harga: Rp100.000' }}</dt>
                                            <dd class="col-sm-6">dana dibutuhkan: {{ !is_null($mitra->accepted_fund) ? 'Rp.' . number_format($mitra->accepted_fund, 0, ',', '.') . ',-' : '' }}</dd>
                                            <dt class="col-sm-6">Terkumpul</dt>
                                            <dd class="col-sm-6">dana terkumpul: Rp.{{ isset($mitra->dana_terkumpul) ? number_format($mitra->dana_terkumpul, 0, ',', '.') . ',-' : '' }}</dd>
                                        </dl>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $mitra->dana_terkumpul_persen }}%;" aria-valuenow="{{ $mitra->dana_terkumpul_persen }}" aria-valuemin="0" aria-valuemax="100">{{ $mitra->dana_terkumpul_persen }}%</div>
                                    </div>
                                    <div class="mt-3">
                                        <form action="/cart" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $mitra->id }}" name="id">
                                            <input type="hidden" value="{{ $mitra->borrower->business_name }}" name="name">
                                            <input type="hidden" value="100000" name="price">
                                            <input type="hidden" value="{{ $mitra->borrower->business_image }}" name="image">
                                            <input type="hidden" value="1" name="quantity">
                                            <button type="submit" class="btn btn-outline-success col-12" {{ $mitra->dana_terkumpul_persen == 100 ? 'disabled' : '' }}><i class="fa fa-plus"></i> Tambah ke keranjang</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text text-center">belum ada data mitra.</p>
                @endif
            </div>
        </div>
    </section>
@endsection
