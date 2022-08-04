@extends('layouts.user.lender.lender_template')

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
        <div class="col-lg-6 pt-4 pt-lg-0 order-1 order-lg-1 content">
            <img src="{{ asset('') }}/img/testimonials.jpg" class="img-thumbnail" alt="lender" width="200">
            <h4><b>Rina</b></h4>
            <h5>rina@gmail.com</h5>
            <h5>0812345678</h5>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-3 order-lg-3 content">
            <dl class="row">
                <dt class="col-sm-6">Nama Pemilik Rek</dt>
                <dd class="col-sm-6">Rina</dd>

                <dt class="col-sm-6">Saldo</dt>
                <dd class="col-sm-6">Rp 0</dd>

                <dt class="col-sm-6">Nama Bank</dt>
                <dd class="col-sm-6">BCA</dd>

                <dt class="col-sm-6">No. Rekening</dt>
                <dd class="col-sm-6">000000</dd>

                <div class="col-6 mt-5">
                    <button class="get-started-btn">Tarik Saldo</button>
                </div>
                <div class="col-6 mt-5">
                    <button class="get-started-btn">Isi Saldo</button>
                </div>
            </dl>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal pendanaan</th>
                        <th scope="col">Rincian Mitra</th>
                        <th scope="col">Tanggal Jatuh Tempo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>

                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                        </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection