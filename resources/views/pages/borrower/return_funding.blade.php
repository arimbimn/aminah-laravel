@extends('layouts.user.borrower.template')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>Pengembalian Dana</h2>
      <p>Detail Pengembalian Pendanaan dari {{ Auth::user()->name }}</p>
    </div>
  </div>
  <!-- End Breadcrumbs -->

  <section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Pengembalian Pendanaan</h2>
        <p>Detail Pengembalian Pendanaan</p>
      </div>
      <div class="card col-lg-12 mb-3">
        <div class="card-header">
          Rincian Pengembalian Pendanaan
        </div>
        <div class="card-body">
          <form class="row g-3" action="/mitra/pendanaan/bayar" method="post" enctype="multipart/form-data">
            @csrf
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Status Pengembalian</th>
                  <th scope="col">Tanggal Jatuh Tempo</th>
                  <th scope="col">Jumlah Pengembalian</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Pengembalian</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($transactions as $index => $item)
                  <tr>
                    <th>{{ $index + 1 }}</th>
                    <td>
                      @if ($item->status == 'waiting')
                        <span class="badge badge-warning">belum dibayar</span>
                      @endif
                      @if ($item->status == 'success')
                        <span class="badge badge-success">sudah dibayar</span>
                      @endif
                      @if ($item->status == 'failed')
                        <span class="badge badge-danger">gagal bayar</span>
                      @endif
                      @if ($item->status == 'waiting approval')
                        <span class="badge badge-info">menunggu konfirmasi</span>
                      @endif
                    </td>
                    <td>
                      {{ \Carbon\Carbon::parse($item->transaction_date)->format('d-m-Y') }}
                    </td>
                    <td>
                      Rp.{{ number_format($item->transaction_amount) }},-
                    </td>
                    <td>
                      {{ \Carbon\Carbon::parse($item->transaction_date)->diffForHumans() }}
                    </td>
                    <td><a class="btn btn-outline-success" href="/mitra/pendanaan/bayar/detail/{{ $item->trx_hash }}"><i class="fa fa-credit-card"></i> Lakukan Pembayaran</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
  </section>
  {{-- END MITRA CONTENT --}}
@endsection

@push('page_css')
  <link rel="stylesheet" href="{{ asset('css/badge.css') }}">
@endpush
