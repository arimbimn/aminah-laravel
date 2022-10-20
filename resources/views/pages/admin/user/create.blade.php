@extends('layouts.admin.template_admin')

@section('content')
    <div class="container-fluid">
        @include('layouts.admin.navigation')
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.tambah') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <x-basic.label for="name" value="Nama Admin" required="true" />
                        <x-basic.input type="text" name="name" :error="$errors->first('name')" id="name" placeholder="masukkan nama admin disini..." />
                    </div>
                    <div class="form-group">
                        <x-basic.label for="email" value="Email Admin" required="true" />
                        <x-basic.input type="email" name="email" :error="$errors->first('email')" id="email" placeholder="masukkan alamat email disini..." />
                    </div>
                    <div class="form-group">
                        <x-basic.label for="role" value="Role" required="true" />
                        <select class="form-select col-12 form-control" aria-label="Default select example" name="role" id="role">
                            <option selected disabled value="">Pilih role</option>
                            @foreach ($roles as $role => $role_name)
                            <option value="{{ $role }}">{{ $role_name }}</option>
                            @endforeach
                            {{-- <option value="admin">admin</option> --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <x-basic.label for="password" value="Password" required="true" />
                        <x-basic.input type="password" name="password" :error="$errors->first('password')" id="password" placeholder="masukkan password kamu disini..." />
                    </div>
                    <div class="row">
                        <div class="col-6 mb-4">
                            <button type="submit" class="btn btn-success col-lg-12 approve-button">Tambah Admin</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
