<x-registration-layout title="{{ isset($title) ? $title : 'Aminah' }}">
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-12 ">
                    <form action="/lender/daftar" method="post">
                        @csrf
                        {{-- BEGIN CARD --}}
                        <div class="card card-yellow">
                            {{-- BEGIN CARD HEADER --}}
                            <div class="card-header">
                                <div class="register-logo mt-0 mb-0">
                                    <a href="/">
                                        <img src="{{ asset('img') }}/Aminah2.png" width="150" alt="">
                                        <h4 class="register-box-msg">SELAMAT DATANG CALON LENDER</h4>
                                    </a>
                                </div>
                            </div>
                            {{-- END CARD HEADER --}}
                            {{-- BEGIN CARD BODY --}}

                            <div class="card-body register-card-body mb-0 mt-0">
                                {{-- BEGIN NAMA LENGKAP --}}
                                <x-basic.label for="fullName" required="true">Nama Lengkap</x-basic.label>
                                <div class="input-group mb-1">
                                    <x-basic.input type="text" name="fullName" icon="fa-user" :error="$errors->first('fullName')" placeholder="masukkan nama lengkap disini..." />
                                </div>
                                {{-- END NAMA LENGKAP --}}
                                {{-- BEGIN EMAIL --}}
                                <x-basic.label for="email" required="true">Email</x-basic.label>
                                <div class="input-group mb-1">
                                    <x-basic.input type="email" name="email" icon="fa-envelope" :error="$errors->first('email')" placeholder="masukkan email kamu disini..." />
                                </div>
                                {{-- END EMAIL --}}
                                {{-- BEGIN PASSWORD --}}
                                <x-basic.label for="password" required="true">Password</x-basic.label>
                                <div class="input-group mb-1">
                                    <x-basic.input type="password" name="password" icon="fa-lock" :error="$errors->first('password')" placeholder="masukkan password kamu disini..." />
                                </div>
                                {{-- END PASSWORD --}}
                                {{-- BEGIN PASSWORD CONF --}}
                                <x-basic.label for="password_confirmation" required="true">Masukkan Ulang Password</x-basic.label>
                                <div class="input-group mb-1">
                                    <x-basic.input type="password" name="password_confirmation" icon="fa-lock" :error="$errors->first('password')" placeholder="masukkan ulang password kamu disini..." />
                                </div>
                                {{-- END PASSWORD CONF --}}
                                {{-- BEGIN APPROVE --}}
                                <div class="form-group mb-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="agreeTerms" name="agreeTerms" value="agree">
                                        <label class="form-check-label" for="agreeTerms">Saya yakin bahwa data yang saya masukkan benar</label>
                                    </div>
                                    @error('agreeTerms')
                                        <div class="text text-danger">
                                            <small>{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                                {{-- END APPROVE --}}
                            </div>
                            {{-- END CARD BODY --}}
                            {{-- BEGIN CARD FOOTER --}}
                            <div class="card-footer mt-0">
                                <div class="row d-flex justify-content-start mb-2">
                                    <div class="col-md-12 mb-0 d-flex d-none d-md-block d-lg-block mb-2">
                                        <button type="submit" class="btn btn-outline-success col-12"><i class="fa fa-check-square-o"></i> Daftar Sekarang!</button>
                                    </div>
                                </div>
                                <p class="mb-2 mt-2">
                                    Sudah Punya Akun?
                                    <a href="/login" class="text-center">Masuk Disini</a>
                                </p>
                            </div>
                            {{-- END CARD FOOTER --}}
                        </div>
                        {{-- END CARD --}}
                    </form>
                </div>
            </div>
        </div>
    </section>

    @push('page_css')
        <style>
            .content-wrapper {
                background-color: lightgreen;
                background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
                background-size: cover;
                background-repeat: no-repeat;
                position: relative;
            }

            .card {
                border-top-left-radius: 40px;
                border-top-right-radius: 40px;
                border-bottom-left-radius: 40px;
                border-bottom-right-radius: 40px;
                margin-top: 15px;
                margin-bottom: 15px;
                padding-bottom: 10px;
            }

            .card-header {
                border-top-left-radius: 30px;
                border-top-right-radius: 30px;
            }
        </style>
    @endpush
</x-registration-layout>
