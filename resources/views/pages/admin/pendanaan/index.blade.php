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
            <table class="table table-hover text-wrap">
              <thead>
                <tr>
                  <th scope="col">Nama Borrower</th>
                  <th scope="col">Status</th>
                  <th scope="col">Sisa Periode Pendanaan</th>
                  <th scope="col">Jumlah Total Pendanaan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($records as $index => $item)
                  <tr>
                    <td>{{ $item->borrower->name }}</td>
                    <td>
                      @switch($item->status)
                        @case(1)
                          <span class="badge badge-info">Pencarian lender</span>
                        @break

                        @case(2)
                          <span class="badge badge-success">Proses pendanaan</span>
                        @break

                        @default
                      @endswitch
                    </td>
                    <td>{{ \Carbon\Carbon::parse($item->due_date)->diffForHumans() }}</td>
                    <td>Rp.{{ number_format($item->dana_terkumpul, 0, ',', '.') }},-</td></tr>
                @endforeach
              </tbody>
            </table>

          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-12 d-flex justify-content-center align-items-center">
                {{ $records->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
