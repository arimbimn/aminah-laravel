@extends('layouts.admin.template_admin')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>
                        <br> Rincian Pendanaan Aminah
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col mt-4">
                    <div class="card">
                        <table class="table table-hover">
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
                                <?php $i = 1; ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td>*nama Borrower</td>
                                    <td>*status*</td>
                                    <td>*sisa Periode Pendanaan*</td>
                                    <td>*Jumlah Total Pendanaan*</td>
                                    <td><a href="/rincian-pendanaan/detail" class="btn btn-info"><i class="fa fa-eye"></i> Detail</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
