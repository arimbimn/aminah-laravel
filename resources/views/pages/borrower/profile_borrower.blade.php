@extends('layouts.user.borrower.borrower_template')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
        <h2>Dashboard</h2>
        <p>Hai, selamat datang di dashboard kamu!</p>
    </div>
</div>

<!-- End Breadcrumbs -->


<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-3 pt-4 pt-lg-0 order-1 order-lg-1 content">
            <img src="{{ asset('') }}/img/aminahImg1.jpg" class="img-thumbnail" alt="lender" width="200">
            <h4><b>Nama UMKM : *SilkySip*</b></h4>
            <h5>Nama Pemilik : *nama pemilik umkm*</h5>
            <h5>Email : *email pemilik umkm*</h5>
            <h5>HP : *nomor hp pemilik usaha*</h5>
        </div>
        <div class="card col-lg-5 order-2 order-lg-2 border-dark mb-3" style="max-width: 50rem;">
            <div class="card-header">Ringkasan</div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-body text-dark">
                        <h5 class="card-title">Dana Pengajuan Awal</h5>
                        <p class="card-text">Rp 0</p>

                        <h5 class="card-title">Pendanan Lunas</h5>
                        <p class="card-text">Rp 0</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card-body text-dark">
                        <h5 class="card-title">Dana Disetujui</h5>
                        <p class="card-text">Rp 0</p>

                        <h5 class="card-title">Pendanaan Belum Lunas</h5>
                        <p class="card-text">Rp 0</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 pt-4 pt-lg-0 order-3 order-lg-3 content mb-4">
            <dl class="row">
                <dt class="col-sm-6">Nama Pemilik Rekening</dt>
                <dd class="col-sm-6">*nama pemilik rekening*</dd>

                <dt class="col-sm-6">Nama Bank</dt>
                <dd class="col-sm-6">*nama bank*</dd>

                <dt class="col-sm-6">No. Rekening</dt>
                <dd class="col-sm-6">*nomor rekening*</dd>
                <hr>
                <div class="col mt-5">
                    <button class="btn btn-success">Tarik Saldo</button>
                </div>
        
                <div class="col mt-5">
                    <a href="/mitra/ajukan-pendanaan" class="btn btn-warning"> Ajukan Pendanaan</a>
                </div>
            </dl>
        </div>
    </div>
    <hr>
    <div class="row mt-4">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal Jatuh Tempo</th>
                        <th scope="col">Rincian Lender/Pendana</th>
                        <th scope="col">Jumlah Pengembalian</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td></td>
                        <td> - </td>
                        <td> - </td>
                        <td>Rp -</td>
                        <td><a class="btn btn-success" href="/bayar"> Bayar</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection