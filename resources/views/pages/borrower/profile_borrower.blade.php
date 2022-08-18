@extends('layouts.user.borrower.borrower_template')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
        <h2>Dashboard</h2>
        <p>Hai, selamat datang di dashboard kamu {{ Auth::user()->name }}!</p>
    </div>
</div>

<!-- End Breadcrumbs -->


<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-3 pt-4 pt-lg-0 order-1 order-lg-1 content">
            <img src="{{ asset('') }}/img/testimonials.jpg" class="img-thumbnail" alt="lender" width="200">
            <h4><b>{{ isset($user->borrower) ? $user->borrower->business_name : '-' }}</b></h4>
            <h5>Nama Pemilik : {{ $user->name }}</h5>
            <h5>Email : {{ $user->email }}</h5>
            <h5>HP : {{ isset($user->borrower) ? $user->borrower->phone_number : '-'}}</h5>
        </div>
        <div class="card col-lg-5 order-2 order-lg-2 border-dark mb-3" style="max-width: 50rem;">
            <div class="card-header">Ringkasan</div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-body text-dark">
                        <h5 class="card-title">Dana Pengajuan Awal</h5>
                        <p class="card-text">Rp {{ isset($user->borrower) ? $user->borrower->borrower_first_submission : '-' }}</p>

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
                <dd class="col-sm-6">{{ isset($user->borrower) ? $user->borrower->account_name :'-' }}</dd>

                <dt class="col-sm-6">Nama Bank</dt>
                <dd class="col-sm-6">{{ isset($user->borrower) ? $user->borrower->bank_name : '-' }}</dd>

                <dt class="col-sm-6">No. Rekening</dt>
                <dd class="col-sm-6">{{ isset($user->borrower) ? $user->borrower->account_number : '-' }}</dd>
                <hr>
                <div class="col mt-5">
                    <button class="btn btn-success">Tarik Saldo</button>
                </div>
        
                <div class="col mt-5">
                    <a href="/mitra/profile/ajukan-pendanaan" class="btn btn-warning"> Ajukan Pendanaan</a>
                </div>
            </dl>
        </div>
    </div>
    <hr>

    <div class="row mt-4">
            {{-- TABEL PENGAJUAN --}}
                <div class="col">
                    <h4>Tabel Data Pengajuan</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Status Pengajuan</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Harga Barang</th>
                                <th scope="col">Jangka Waktu Pengajuan</th>
                                <th scope="col">Estimasi Bagi Hasil</th>
                                <th scope="col">Nama Lender</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            <tr>
                                <th>@php $i++ @endphp</th>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- TABEL PENDANAAN --}}
                <div class="col">
                    <h4>Tabel Data Pendanaan</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Status Pendanaan</th>
                                <th scope="col">Tanggal Jatuh Tempo</th>
                                <th scope="col">Nama - Nama Lender</th>
                                <th scope="col">Jumlah Pengembalian</th>
                                <th scope="col">Sisa Periode Pendanaan</th>
                                <th scope="col">Pengembalian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            <tr>
                                <th>@php $i++ @endphp</th>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                                <td><a class="btn btn-success" href="/bayar"> Bayar</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection