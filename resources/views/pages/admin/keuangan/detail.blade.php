@extends('layouts.admin.template_admin')

@section('content')
  <div class="container-fluid">
    @include('layouts.admin.navigation')
    <div class="row">
      <div class="col mt-4">
        <div class="card">
          <div class="card-header">
            <x-table.card-header tableName="{{ isset($tableName) ? $tableName : 'Tabel Data' }}" />
          </div>
          <div class="col mt-4">
            <dl class="row">
              <dt class="col-sm-5">Detail Transaksi</dt>
              <dt class="col-sm-7">Keterangan</dt>

              <dt class="col-sm-5 mt-3">Nama Pengirim</dt>
              <dd class="col-sm-7 mt-3">{{ $transaction->user->name }}</dd>

              <dt class="col-sm-5">Tanggal Transaksi</dt>
              <dd class="col-sm-7">{{ $transaction->transaction_date }}</dd>

              <dt class="col-sm-5">Jenis Transaksi</dt>
              <dd class="col-sm-7">{{ $transaction->transaction_type == 1 ? 'Pengisian dana lender' : '' }}</dd>

              <dt class="col-sm-5">Status Transaksi</dt>
              <dd class="col-sm-7">
                @if ($transaction->status == 'pending')
                  <span class="badge badge-warning">Menunggu konfirmasi admin</span>
                @endif
              </dd>

              <dt class="col-sm-5">Jumlah Transaksi</dt>
              <dd class="col-sm-7">Rp.{{ number_format($transaction->transaction_amount) }},-</dd>

              <dt class="col-sm-5">Bukti Transaksi</dt>
              <dd class="col-sm-7"><img src="{{ asset('pembayaran') }}/{{ $transaction->file_image }}" alt="tidak bukti transaksi" width="200"></dd>
            </dl>
          </div>
        </div>
        <div class="row">
          <div class="col mb-4">
            <a href="/admin/transaksi/tolak/{{ $transaction->trx_hash }}" class="btn btn-danger col-lg-12 reject-button">Gagal</a>
          </div>
          <div class="col mb-4">
            <a href="/admin/transaksi/terima/{{ $transaction->trx_hash }}" class="btn btn-success col-lg-12 approve-button">Berhasil</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
