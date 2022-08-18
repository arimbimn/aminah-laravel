@extends('layouts.admin.template_admin')

@section('content')
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-plus"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Data Pengajuan Masuk</span>
                        <span class="info-box-number">
                            -
                            <small>berkas</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tasks"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah pendanaan</span>
                        <span class="info-box-number">- <small>pendanaan</small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Lender</span>
                        <span class="info-box-number">- <small>lender</small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Mitra</span>
                        <span class="info-box-number">- <small>mitra</small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-5">
                <!-- TABLE: DATA LENDER -->
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Data Lender</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Lender</th>
                                        <th>No. Rek</th>
                                        <th>No. Hp</th>
                                        <th>Email </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                @endphp
                                    <tr>
                                        <td>@php $i++ @endphp</td>
                                        <td>{{ isset($user->lender) ? $user->lender->name : '-'  }}</td>
                                        <td>{{ isset($user->lender) ? $user->lender->account_number : '-' }}</td>
                                        <td>{{ isset($user->lender) ? $user->lender->hp_number : '-' }}</td>
                                        <td>{{ isset($user->lender) ? $user->lender->email : '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-md-7">
                <!-- TABLE: DATA MITRA -->
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Data Mitra</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Usaha</th>
                                        <th>Nama Pemilik</th>
                                        <th>No. Rek</th>
                                        <th>No. Hp</th>
                                        <th>Email </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                    $i = 1;
                                @endphp
                                    <tr>
                                        <td>@php $i++ @endphp</td>
                                        <td>*nama usaha*</td>
                                        <td>*nama pemilik usaha*</td>
                                        <td>*nomor rekening pemilik usaha*</td>
                                        <td>*nomor hp pemilik usaha*</td>
                                        <td>*email pemilik usaha*</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
@endsection
