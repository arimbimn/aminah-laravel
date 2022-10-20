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
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Admin</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    {{-- <th scope="col">Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->is_active == 1)
                                                <span class="badge badge-success">aktif</span>
                                            @else
                                                <span class="badge badge-danger">tidak aktif</span>
                                            @endif
                                        </td>
                                        {{-- <td><a href="/admin/user/edit/{{ $user->id }}" class="btn btn-info"><i class="fa fa-edit"></i> edit</a></td> --}}
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
