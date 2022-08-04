@extends('layouts.admin.template_admin')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>
                    <br> Daftar Pengajuan Pendanaan UMKM Baru
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
                                <th scope="col">Nama Usaha</th>
                                <th scope="col">Nama Pemilik</th>
                                <th scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td>*nama usaha*</td>
                                    <td>*nama usaha</td>
                                    <td><a href="/data-pengajuan-masuk/detail" class="btn btn-info"><i class="fa fa-eye"></i>   Detail Usaha</a></td>
                                </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection