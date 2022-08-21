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
                    <div class="col mt-4">
                        <dl class="row">
                            <dt class="col-sm-5">Detail Transaksi</dt>
                            <dt class="col-sm-7">Keterangan</dt>
        
                            <dt class="col-sm-5 mt-3">Nama Pengirim</dt>
                            <dd class="col-sm-7 mt-3">sender_name</dd>
        
                            <dt class="col-sm-5">Tanggal Transaksi</dt>
                            <dd class="col-sm-7">transaction_date</dd>
        
                            <dt class="col-sm-5">Jenis Transaksi</dt>
                            <dd class="col-sm-7">transaction_type</dd>
        
                            <dt class="col-sm-5">Status Transaksi</dt>
                            <dd class="col-sm-7">status</dd>
        
                            <dt class="col-sm-5">Jumlah Transaksi</dt>
                            <dd class="col-sm-7">transaction_amount</dd>
        
                            <dt class="col-sm-5">Bukti Transaksi</dt>
                            <dd class="col-sm-7">transaction_approval</dd>
                        </dl>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-4">
                        <button type="button" class="btn btn-danger col-lg-12 reject-button">Tolak</button>
                    </div>
                    <div class="col mb-4">
                        <button type="button" class="btn btn-success col-lg-12 approve-button">Terima</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection