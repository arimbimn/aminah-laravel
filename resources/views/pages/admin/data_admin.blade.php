@extends('layouts.admin.template_admin')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>
                    <br> Kumpulan Data Admin
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
                                <th scope="col">Nama Admin</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td>*nama admin*</td>
                                    <td>*email admin*</td>
                                    <td>*status admin*</td>
                                    <td><a href="/admin/edit" class="btn btn-info"><i class="fa fa-edit"></i> edit</a></td>
                                </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection