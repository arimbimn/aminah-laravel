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
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Status Transaksi</th>
                  <th scope="col">Jenis Transaksi</th>
                  <th scope="col">Nama Pengirim</th>
                  <th scope="col">Jumlah Dana</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($transactions as $index => $item)
                  <tr>
                    <th>{{ $index + 1 }}</th>
                    <td>{{ \Carbon\Carbon::parse($item->transaction_datetime)->toDateString() }}</td>
                    <td>
                      @if ($item->status == 'pending')
                        <span class="badge badge-warning">menunggu konfirmasi</span>
                      @endif
                      @if ($item->status == 'waiting')
                        <span class="badge badge-warning">menunggu konfirmasi</span>
                      @endif
                      @if ($item->status == 'waiting approval')
                        <span class="badge badge-warning">menunggu konfirmasi</span>
                      @endif
                      @if ($item->status == 'success')
                        <span class="badge badge-success">berhasil</span>
                      @endif
                    </td>
                    <td>
                      {{ $item->transaction_type == '1' ? 'Pengisian dana lender' : '' }}
                      {{ $item->transaction_type == '6' ? 'Pendanaan lender' : '' }}
                      {{ $item->transaction_type == '7' ? 'Pengembalian pendanaan' : '' }}
                    </td>
                    <td>{{ $item->user->name }}</td>
                    <td>Rp.{{ number_format($item->transaction_amount, 0, ',', '.') }},-</td>
                    <td><a href="/admin/transaksi/detail/{{ $item->trx_hash }}" class="btn btn-info"><i class="fa fa-eye"></i> Detail</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
