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
                                    <th scope="col">No.</th>
                                    <th scope="col">Foto UMKM</th>
                                    <th scope="col">Nama UMKM</th>
                                    <th scope="col">Nama Borrower</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tujuan Pengajuan Pendanaan</th>
                                    <th scope="col">Sisa Periode Pendanaan</th>
                                    <th scope="col">Jumlah Total Pendanaan</th>
                                    <th scope="col">Nama Lender</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $index => $record)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $record->borrower->business_image }}</td>
                                        <td>{{ $record->borrower->business_name }}</td>
                                        <td>{{ $record->borrower->name }}</td>
                                        <td>{{ $record->borrower->status }}</td>
                                        <td>{{ $record->borrower->purpose }}</td>
                                        <th scope="col">*5 bulan lagi*</th>
                                        <td>Rp.{{ number_format($record->dana_terkumpul, 0, ',', '.') }},-</td>
                                        <th scope="col">*data lender yang mendanai umkm ini*</th>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection