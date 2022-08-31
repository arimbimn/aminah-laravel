@extends('layouts.user.borrower.template')

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

    <div class="row mb-4">
      <div class="col-lg-6 col-12">
        <a href="/mitra/saldo/tarik/invoice" class="btn btn-outline-success mb-2 col-12"> Tarik Pendanaan</a>
      </div>
      <div class="col-lg-6 col-12">
        <a href="/mitra/profile/ajukan-pendanaan" class="btn btn-outline-warning mb-2 col-12 @if ((isset(Auth::user()->latestBorrower->unfinishedFundings) && Auth::user()->latestBorrower->unfinishedFundings->count() > 0) || (isset(Auth::user()->waitingBorrower) && Auth::user()->waitingBorrower->count() > 0)) disabled @endif"> Ajukan Pendanaan</a>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6 pt-4 pt-lg-0 order-1 order-lg-1 content">
        <img src="{{ isset($pengajuan) ? $pengajuan->business_image : 'user.png' }}" class="img-thumbnail" alt="{{ isset($pengajuan) ? $pengajuan->business_name : '-' }}" width="200" onerror="this.onerror=null;this.scr='https://via.placeholder.com/1080x720.png?text=Business%20Image';">
        <h4><b>{{ isset($pengajuan) ? $pengajuan->business_name : '-' }}</b></h4>
        <dl class="row">
          <dt class="col-sm-5">Nama Pemilik Usaha</dt>
          <dd class="col-sm-7">: {{ $user->name }}</dd>

          <dt class="col-sm-5">Email</dt>
          <dd class="col-sm-7">: {{ $user->email }}</dd>

          <dt class="col-sm-5">No. HP</dt>
          <dd class="col-sm-7">: {{ isset($pengajuan) ? $pengajuan->phone_number : '-' }}</dd>

          <dt class="col-sm-5">Nama Pemilik Rekening</dt>
          <dd class="col-sm-7">: {{ isset($pengajuan) ? $pengajuan->account_name : '-' }}</dd>

          <dt class="col-sm-5">Nama Bank</dt>
          <dd class="col-sm-7">: {{ isset($pengajuan) ? $pengajuan->bank_name : '-' }}</dd>

          <dt class="col-sm-5">No. Rekening</dt>
          <dd class="col-sm-7">: {{ isset($pengajuan) ? $pengajuan->account_number : '-' }}</dd>

          <dt class="col-sm-5">Saldo</dt>
          <dd class="col-sm-7">: Rp.{{ number_format(Auth::user()->borrowerAmount()) }},-</dd>
        </dl>
      </div>
      <div class="card col-lg-6 order-2 order-lg-2 border-dark mb-3" style="max-width: 50rem;">
        <div class="card-header">Ringkasan Pengajuan</div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card-body text-dark">
              <p class="card-title"><b>Dana Pengajuan Awal</b></p>
              <p class="card-text">Rp {{ isset($pengajuan) ? number_format($pengajuan->borrower_first_submission) : '0' }},-</p>

              <p class="card-title"><b>Dana Disetujui</b></p>
              <p class="card-text">Rp {{ isset($pengajuan->funding->accepted_fund) ? number_format($pengajuan->funding->accepted_fund) : '0' }},-</p>

            </div>
          </div>
          <div class="col-lg-6">
            <div class="card-body text-dark">
              <p class="card-title"><b>Pendanaan Lunas</b></p>
              <p class="card-text">Rp 0</p>

              <p class="card-title"><b>Pendanaan Belum Lunas</b></p>
              <p class="card-text">Rp 0</p>

            </div>
          </div>

        </div>
        <hr>

        <div class="row">
          <div class="col-lg-6">
            <div class="card-body text-dark">
              <p class="card-title"><b>Status Pengajuan</b></p>
              <p class="card-text">
                @if (isset($pengajuan->status) && $pengajuan->status == 'Accepted')
                  Diterima
                @endif
                @if (isset($pengajuan->status) && $pengajuan->status == 'Pending')
                  Pending
                @endif
              </p>
              <p class="card-title"><b>Jangka
                  Waktu Pengajuan</b></p>
              <p class="card-text">{{ isset($pengajuan) ? $pengajuan->duration : '-' }} Bulan</p>

            </div>
          </div>
          <div class="col-lg-6">
            <div class="card-body text-dark">
              <p class="card-title"><b>Estimasi Bagi Hasil</b></p>
              <p class="card-text">{{ isset($pengajuan) ? $pengajuan->profit_sharing_estimate : '-' }} %</p>

              <p class="card-title"><b>Jumlah Lender Terkumpul</b></p>
              <p class="card-text">{{ isset($pengajuan->funding->fundinglenders) ? $pengajuan->funding->fundinglenders->count() : '0' }}</p>

            </div>
          </div>
        </div>
        <hr>

        <div class="row">
          <div class="col-lg-12">
            <div class="card-body text-dark">
              <p class="card-title"><b>Tujuan Pengajuan</b></p>
              <p class="card-text">{{ isset($pengajuan) ? $pengajuan->purpose : '-' }}</p>

            </div>

          </div>
        </div>
      </div>
    </div>

    <hr>

    @if ($fundings)
      <div class="row">
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
              @foreach ($fundings as $index => $funding)
                <tr>
                  <th>{{ $index + 1 }}</th>
                  <td>
                    @if ($funding->status == '1')
                      <span class="badge badge-warning">proses pencarian lender</span>
                    @endif
                    @if ($funding->status == '2')
                      <span class="badge badge-success">proses pendanaan</span>
                    @endif
                  </td>
                  <td>
                    Tanggal {{ \Carbon\Carbon::parse($funding->due_date)->day }}
                  </td>
                  <td> - </td>
                  <td>
                    Rp.{{ number_format($funding->accepted_fund * (1 + $funding->profit_sharing_estimate / 100)) }},-
                  </td>
                  <td>
                    {{ \Carbon\Carbon::parse($funding->due_date)->diffForHumans() }}
                  </td>
                  <td><a class="btn btn-success" href="/mitra/pendanaan/bayar/{{ $funding->id }}"> Bayar</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    @endif
  </div>
@endsection

@push('page_scripts')
@endpush

@push('page_css')
  <link rel="stylesheet" href="{{ asset('css/badge.css') }}">
@endpush
