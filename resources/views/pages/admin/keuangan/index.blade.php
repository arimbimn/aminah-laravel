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
                                    <th scope="col">Tanggal Uang Masuk</th>
                                    <th scope="col">Nama Mitra</th>
                                    <th scope="col">Nama Pemilik Mitra</th>
                                    <th scope="col">Nomor Rekening</th>
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
                                        <td>*tanggal pembayaran*</td>
                                        <td>*nama mitra*</td>
                                        <td>*nama pemilik mitra*</td>
                                        <td>*nomor rekening*</td>
                                        <td>*jumlah dana*</td>
                                        <td><a href="/admin/data-keuangan/detail" class="btn btn-info"><i class="fa fa-eye"></i> Detail</a></td>
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