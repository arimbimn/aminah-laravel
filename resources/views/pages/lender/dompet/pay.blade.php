@extends('layouts.user.lender.template')

@section('content')
  {{-- Begin Breadcrumbs --}}
  <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>{{ 'Pembayaran' }}</h2>
      <p>{{ 'Silahkan lakukan pembayaran anda' }}</p>
    </div>
  </div>
  {{-- End Breadcrumbs --}}

  <div class="container">
    @if (isset(Auth::user()->lenderRecharge))
      <div class="row mt-4">
        {{-- TABEL PEMBAYARAN --}}
        <div class="col">
          <h4>Tabel Data Pembayaran</h4>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Status</th>
                <th scope="col">Kode Transaksi</th>
                <th scope="col">Jumlah Pembayaran</th>
                <th scope="col">Waktu</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach (Auth::user()->lenderRecharge as $index => $item)
                <tr>
                  <th>{{ $index + 1 }}</th>
                  <td>
                    @if ($item->status == 'waiting')
                      <span class="badge badge-danger">belum bayar</span>
                    @endif
                    @if ($item->status == 'pending')
                      <span class="badge badge-warning">menunggu</span>
                    @endif
                    @if ($item->status == 'success')
                      <span class="badge badge-success">berhasil</span>
                    @endif
                  </td>
                  <td> {{ strtoupper($item->trx_hash) }} </td>
                  <td> Rp.{{ number_format($item->transaction_amount, 0, ',', '.') }} </td>
                  <td> {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }} </td>
                  <td>
                    @if ($item->status != 'success')
                      <a class="btn btn-success col-12" href="/lender/dompet/bayar/detail/{{ $item->trx_hash }}"><i class="fa fa-credit-card"></i> Bayar</a>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    @else
      <p>Belum ada data</p>
    @endif
  </div>
@endsection

@push('page_css')
  <style>
    .badge {
      background-color: whitesmoke;
      color: black;
      padding: 4px 8px;
      text-align: center;
      border-radius: 5px;
    }

    .badge-danger {
      background-color: red;
      color: white;
    }

    .badge-warning {
      background-color: yellow;
      color: black;
    }

    .badge-success {
      background-color: green;
      color: white;
    }
  </style>
@endpush
