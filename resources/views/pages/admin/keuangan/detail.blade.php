@extends('layouts.admin.template_admin')

@section('content')
  <div class="container-fluid">
    @include('layouts.admin.navigation')
    @if (isset($transaction->transaction_type) && in_array($transaction->transaction_type, ['1', '7']))
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
                <dd class="col-sm-7">
                  @switch($transaction->transaction_type)
                    @case('1')
                      {{ 'Pengisian dana lender' }}
                    @break

                    @case('2')
                      {{ 'Pembayaran bagi hasil' }}
                    @break

                    @case('3')
                      {{ 'Penarikan saldo lender' }}
                    @break

                    @case('4')
                      {{ 'Penarikan pendanaan' }}
                    @break

                    @case('5')
                      {{ 'Penarikan dana admin' }}
                    @break

                    @case('6')
                      {{ 'Pembayaran pendanaan lender' }}
                    @break

                    @case('7')
                      {{ 'Pengembalian pendanaan' }}
                    @break

                    @default
                  @endswitch
                </dd>

                <dt class="col-sm-5">Status Transaksi</dt>
                <dd class="col-sm-7">
                  @switch($transaction->status)
                    @case('pending')
                      <span class="badge badge-warning">Menunggu konfirmasi admin</span>
                    @break

                    @case('waiting approval')
                      <span class="badge badge-warning">Menunggu konfirmasi admin</span>
                    @break

                    @case('success')
                      <span class="badge badge-success">Berhasil</span>
                    @break

                    @default
                  @endswitch
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
              <button value="{{ $transaction->trx_hash }}" type="button" class="btn btn-danger col-lg-12 reject-button">Gagal</button>
            </div>
            <div class="col mb-4">
              <button value="{{ $transaction->trx_hash }}" type="button" class="btn btn-success col-lg-12 approve-button">Berhasil</button>
            </div>
          </div>
        </div>
      </div>
    @endif
  </div>
@endsection

@push('page_scripts')
  <script>
    jQuery(document).ready(function() {
      jQuery('.approve-button').on('click', function() {
        var titleText = '<p class="text text-light">Terima Transaksi?</p>'
        var iconType = 'question'
        var confText = 'Terima'
        var urlTarget = "{{ url('admin/transaksi/terima') }}"
        var iconTypeSuccess = 'success'
        var titleTextSuccess = 'Anda berhasil menerima transaksi'
        var iconTypeFailed = 'error'
        var titleTextFailed = 'Gagal menerima transaksi, coba lagi nanti'
        var redirectTo = '/admin/transaksi'
        Swal.fire({
          title: titleText,
          icon: iconType,
          showCancelButton: true,
          cancelButtonColor: '#d33',
          confirmButtonText: confText,
        }).then((result) => {
          if (result.isConfirmed) {
            var id = jQuery(this).val();
            jQuery.ajax({
              url: urlTarget,
              method: "post",
              dataType: 'json',
              data: {
                "_token": "{{ csrf_token() }}",
                'id': id,
              },
              success: function(response) {
                Swal.fire({
                  title: titleTextSuccess,
                  icon: iconTypeSuccess,
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = redirectTo
                  };
                });
              },
              error: function(XMLHttpRequest, textStatus, errorThrown) {
                var text = jQuery.parseJSON(XMLHttpRequest.responseText);
                Swal.fire({
                  title: titleTextFailed,
                  icon: iconTypeFailed,
                });
              },
            });
          };
        });
      });
    });
  </script>
@endpush

@push('page_scripts')
  <script>
    jQuery(document).ready(function() {
      jQuery('.reject-button').on('click', function() {
        var titleText = '<p class="text text-light">Tolak Transaksi?</p>'
        var iconType = 'question'
        var confText = 'Tolak'
        var urlTarget = "{{ url('admin/transaksi/tolak') }}"
        var iconTypeSuccess = 'success'
        var titleTextSuccess = 'Anda berhasil menolak trasaksi'
        var iconTypeFailed = 'error'
        var titleTextFailed = 'Gagal menolak trasaksi, coba lagi nanti'
        var redirectTo = '/admin/transaksi'
        Swal.fire({
          title: titleText,
          icon: iconType,
          showCancelButton: true,
          cancelButtonColor: '#d33',
          confirmButtonText: confText,
        }).then((result) => {
          if (result.isConfirmed) {
            var id = jQuery(this).val();
            jQuery.ajax({
              url: urlTarget,
              method: "post",
              dataType: 'json',
              data: {
                "_token": "{{ csrf_token() }}",
                'id': id,
              },
              success: function(response) {
                Swal.fire({
                  title: titleTextSuccess,
                  icon: iconTypeSuccess,
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = redirectTo
                  };
                });
              },
              error: function(XMLHttpRequest, textStatus, errorThrown) {
                var text = jQuery.parseJSON(XMLHttpRequest.responseText);
                Swal.fire({
                  title: titleTextFailed,
                  icon: iconTypeFailed,
                });
              },
            });
          };
        });
      });
    });
  </script>
@endpush
