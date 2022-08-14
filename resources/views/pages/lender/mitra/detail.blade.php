@extends('layouts.user.lender.template')

@section('content')
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>{{ $funding->borrower->business_name }}</h2>
            <p>*jenis mitra*</p>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-6">
                <img src="{{ asset('') }}/img/aminahImg1.jpg" class="img-thumbnail" alt="lender">
                <h4><b>{{ $funding->borrower->business_name }}</b></h4>
                <h5>{{ $funding->borrower->business_address }}</h5>
                <h5>Deskripsi & Jenis UMKM</h5>
                <p>{{ $funding->borrower->description }}</p>
            </div>
            <div class="col-6">
                <h3><b>Rincian Pendanaan dari {{ $funding->borrower->business_name }}</b></h3>
                <h5><small>*x* hari lagi</small></h5>
                <h5>terkumpul {{ $funding->dana_terkumpul_persen }}%</h5>
                <h5>terkumpul Rp.{{ $funding->dana_terkumpul }} dari Rp. {{ $funding->accepted_fund }}</h5>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width:{{ $funding->dana_terkumpul_persen }}%;" aria-valuenow="{{ $funding->dana_terkumpul_persen }}" aria-valuemin="0" aria-valuemax="100">{{ $funding->dana_terkumpul_persen }} %</div>
                </div>
                <hr>
                <dl class="row">
                    <dt class="col-sm-6">Nilai per unit pendanaan</dt>
                    <dd class="col-sm-6">Rp *xxxxxxxx*</dd>

                    <dt class="col-sm-6">Estimasi Bagi hasil</dt>
                    <dd class="col-sm-6">Rp *xxxxxxxx*</dd>

                    <dt class="col-sm-6">Lama pendanaan</dt>
                    <dd class="col-sm-6">*12 bulan*</dd>

                    <dt class="col-sm-6">Siklus bagi hasil</dt>
                    <dd class="col-sm-6">*Per 1 bulan (12 kali)*</dd>

                    <dt class="col-sm-6">Periode bagi hasil</dt>
                    <dd class="col-sm-6">*12 bulan*</dd>

                    <dt class="col-sm-6">Jaminan</dt>
                    <dd class="col-sm-6">*BPKB Motor*</dd>

                    <dt class="col-sm-6">Akad</dt>
                    <dd class="col-sm-6">*Mudharabah*</dd>
                </dl>

                <hr>

                <h4>Danai sebesar:</h4>
                <h3><b>Rp *xxx.xxx*</b></h3>
                <p>Estimasi bagi hasil: Rp *xx.xxx*. Sisa *x* unit</p>
                <p>*gambar form yg angka nya nambah*</p>
                <div class="col-md-12 mb-0 d-flex d-none d-md-block d-lg-block mb-2">
                    <button type="submit" class="btn btn-outline-success col-12"><i class="fa fa-check-square"></i> Danai mitra sekarang!</button>
                </div>
            </div>
        </div>
    </div>
@endsection
