@extends('layouts.user.lender.template')

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
      <div class="col-lg-6 pt-4 pt-lg-0 order-1 order-lg-1 content">
        <img src="{{ asset('') }}/img/testimonials.jpg" class="img-thumbnail" alt="lender" width="200">
        <h4><b>{{ $user->name }}</b></h4>
        <h5>{{ $user->email }}</h5>
        <h5>{{ isset($user->lender) ? $user->lender->hp_number : '-' }}</h5>
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 order-3 order-lg-3 content">
        <dl class="row">
          <dt class="col-sm-6">Nama Pemilik Rek</dt>
          <dd class="col-sm-6">{{ isset($user->lender) ? $user->lender->account_name : '-' }}</dd>

          <dt class="col-sm-6">Saldo</dt>
          <dd class="col-sm-6">Rp 0</dd>

          <dt class="col-sm-6">Nama Bank</dt>
          <dd class="col-sm-6">{{ isset($user->lender) ? $user->lender->bank_name : '-' }}</dd>

          <dt class="col-sm-6">No. Rekening</dt>
          <dd class="col-sm-6">{{ isset($user->lender) ? $user->lender->account_number : '-' }}</dd>
        </dl>
        <div class="col-12 mt-5">
          <a href="/lender/profile/edit" class="btn btn-outline-success col-12"><i class="fa fa-edit"></i> Edit Profil</a>
        </div>
        <div class="col-12 mt-2">
          <button class="btn btn-outline-danger col-12"><i class="fa fa-download"></i> Tarik Saldo</button>
        </div>
        <div class="col-12 mt-2">
          <a href="/lender/profile/invoice" class="btn btn-outline-primary col-12"><i class="fa fa-upload"></i> Isi Saldo</a>
        </div>

      </div>
    </div>

    @if ($user->lender)
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
              @php
                $i = 1;
              @endphp

              <tr>
                <th scope="row">@php $i++ @endphp</th>
                <td> - </td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    @endif
  </div>
@endsection