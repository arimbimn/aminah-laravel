@extends('layouts.admin.template_admin')

@section('content')
    <div class="container-fluid">
        @include('layouts.admin.navigation')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <x-table.card-header tableName="{{ isset($tableName) ? $tableName : 'Tabel Data' }}" />
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-wrap">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Usaha</th>
                                    <th scope="col">Nama Pemilik</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $index => $record)
                                    <tr>
                                        <td>{{ $record->business_name }}</td>
                                        <td>{{ $record->name }}</td>
                                        <td><a href="/admin/pengajuan/detail/{{ $record->id }}" class="btn btn-info"><i class="fa fa-eye"></i> Detail Usaha</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
