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
                                    <th scope="col">Nama Borrower</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Sisa Periode Pendanaan</th>
                                    <th scope="col">Jumlah Total Pendanaan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $index => $record)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $record->borrower->name }}</td>
                                        <td>{{ $record->borrower->status }}</td>
                                        <td>*sisa Periode Pendanaan*</td>
                                        <td>Rp.{{ number_format($record->dana_terkumpul, 0, ',', '.') }},-</td>
                                        <td><a href="/admin/rincian-pendanaan/detail/{{ $record->id }}" class="btn btn-info"><i class="fa fa-eye"></i> Detail</a></td>
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
