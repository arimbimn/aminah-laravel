@extends('layouts.user.lender.lender_template')

@section('content')

<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
        <h2>*nama mitra*</h2>
        <p>*jenis mitra*</p>
    </div>
</div>
<!-- End Breadcrumbs -->

<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-6">
            <img src="{{ asset('') }}/img/aminahImg1.jpg" class="img-thumbnail" alt="lender">
            <h4><b>*nama UMKM*</b></h4>
            <h5>*alamat UMKM*</h5>
            <h5>Deskripsi & Jenis UMKM</h5>
            <p>ini merupakan umkm jenis minuman</p>
        </div>
        <div class="col-6">
            <h3><b>Rincian Pendanaan dari *nama umkm*</b></h3>
            <h5><small>*x*  hari lagi</small></h5>
            <h5>terkumpul *x* %</h5>
            <h5>terkumpul Rp *xxxxxxxx* dari Rp *xxxxxxxxx*</h5>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width:10%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">10 %</div>
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