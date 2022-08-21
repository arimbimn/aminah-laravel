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
                                @php
                                $i = 1;
                            @endphp
                                    <tr>
                                        <th>@php $i++ @endphp</th>
                                        <td>transaction_date</td>
                                        <td>status</td>
                                        <td>transaction_type</td>
                                        <td>sender_name</td>
                                        <td>transaction_amount</td>
                                        <td><a href="/admin/transaksi/detail" class="btn btn-info"><i class="fa fa-eye"></i> Detail</a></td>
                                    </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection