<x-registration-layout title="{{ isset($title) ? $title : 'Aminah' }}">
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12">
                    <form action="/mitra/daftar" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- BEGIN CARD --}}
                        <div class="card card-yellow">
                            {{-- BEGIN CARD HEADER --}}
                            <div class="card-header">
                                <div class="register-logo mt-0 mb-0">
                                    <a href="/">
                                        <img src="{{ asset('img') }}/Aminah2.png" width="150" alt="">
                                        <h4 class="register-box-msg">SELAMAT DATANG CALON MITRA!</h4>
                                    </a>
                                </div>
                            </div>
                            {{-- END CARD HEADER --}}

                            {{-- BEGIN CARD BODY --}}
                            <div class="card-body">
                                <p class="login-box-msg">Harap isi data dibawah ini dengan benar</p>

                                {{-- BEGIN NAMA-UMKM --}}
                                <div class="form-group">
                                    <x-basic.label for="umkmName" value="Nama UMKM" required="true" />
                                    <x-basic.input type="text" name="umkmName" :error="$errors->first('umkmName')" placeholder="masukkan nama usaha anda disini..." />
                                </div>
                                {{-- END NAMA-UMKM --}}

                                {{-- BEGIN ALAMAT UMKM --}}
                                <div class="form-group">
                                    <x-basic.label for="alamat-umkm" value="Alamat UMKM" required="true" />
                                    <x-basic.input type="text" name="umkmAddress" :error="$errors->first('umkmAddress')" placeholder="masukkan alamat usaha anda disini..." />
                                </div>
                                {{-- END ALAMAT UMKM--}}

                                {{-- BEGIN PENDAPATAN UMKM --}}
                                <div class="form-group">
                                    <x-basic.label for="income" class="form-label" value="Pendapatan UMKM per Bulan" required="true" />
                                    <x-basic.input type="text" name="income" :error="$errors->first('income')" placeholder="masukkan jumlah pendapatan usaha kamu per bulan. mis : 10000" />
                                </div>
                                {{-- END PENDAPATAN UMKM --}}

                                {{-- BEGIN JUMLAH PENGAJUAN --}}
                                <div class="form-group">
                                    <x-basic.label for="amount" class="form-label" value="Jumlah Pengajuan" required="true" />
                                    <x-basic.input type="text" name="amount" :error="$errors->first('amount')" placeholder="masukkan jumlah pengajuan kamu. mis : 10000" />
                                </div>
                                {{-- END JUMLAH PENGAJUAN --}}
                                
                                {{-- BEGIN LAMA PENDANAAN --}}
                                <div class="form-group">
                                    <x-basic.label for="amount" class="form-label" value="Jumlah Pengajuan" required="true" />
                                    <x-basic.input type="text" name="amount" :error="$errors->first('amount')" placeholder="masukkan jumlah pengajuan kamu. mis : 10000" />
                                </div>
                                {{-- END LAMA PENDANAAN --}}
                                
                                {{-- BEGIN TUJUAN PENDANAAN --}}
                                <div class="form-group">
                                    <x-basic.label for="amount" class="form-label" value="Jumlah Pengajuan" required="true" />
                                    <x-basic.input type="text" name="amount" :error="$errors->first('amount')" placeholder="masukkan jumlah pengajuan kamu. mis : 10000" />
                                </div>
                                {{-- END TUJUAN PENDANAAN --}}
                                
                                {{-- BEGIN ESTIMASI BAGI HASIL --}}
                                <div class="form-group">
                                    <x-basic.label for="amount" class="form-label" value="Jumlah Pengajuan" required="true" />
                                    <x-basic.input type="text" name="amount" :error="$errors->first('amount')" placeholder="masukkan jumlah pengajuan kamu. mis : 10000" />
                                </div>
                                {{-- END ESTIMASI BAGI HASIL --}}

                                {{-- BEGIN FOTO KTP --}}
                                <div class="form-group">
                                    <label for="file-ktp" class="form-label">Foto KTP Pemilik UMKM (unggah foto KTP anda disini) </label>
                                    <input class="form-control" name="file-ktp" type="file" id="file-ktp">
                                    @error('file-ktp')
                                        <div class="text text-danger">
                                            <small>{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                                {{-- END FOTO KTP --}}

                                {{-- BEGIN FOTO SIU--}}
                                <div class="form-group">
                                    <label for="file-siu" class="form-label">Foto Surat Izin Usaha (SIU) (unggah foto siu disini)</label>
                                    <input class="form-control" name="file-siu" type="file" id="file-siu">
                                    @error('file-siu')
                                        <div class="text text-danger">
                                            <small>{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                                {{-- END FOTO SIU --}}

                                {{-- BEGIN FOTO UMKM --}}
                                <div class="form-group">
                                    <label for="file-foto-umkm" class="form-label">Foto UMKM (unggah foto usaha anda disini) </label>
                                    <input class="form-control" name="file-foto-umkm" type="file" id="file-foto-umkm">
                                    @error('file-foto-umkm')
                                        <div class="text text-danger">
                                            <small>{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                                {{-- END FOTO UMKM --}}
                                
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="approvedCheck" name="approvedCheck">
                                        <label class="form-check-label" for="approvedCheck">
                                            Saya menyatakan bahwa data yang saya masukan adalah benar
                                        </label>
                                    </div>
                                    @error('approvedCheck')
                                        <div class="text text-danger">
                                            <small>{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            {{-- END CARD BODY --}}
                            {{-- BEGIN CARD FOOTER --}}
                            <div class="card-footer">
                                <div class="row d-flex justify-content-start mb-2">
                                    <div class="col-md-12 mb-0 d-flex d-none d-md-block d-lg-block mb-2">
                                        <button type="submit" class="btn btn-outline-success col-12"><i class="fa fa-check-square-o"></i> Daftarkan Usaha Saya Sekarang!</button>
                                    </div>
                                    <div class="col-md-12 mb-0 d-flex d-none d-md-block d-lg-block">
                                        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary col-12"><i class="fa fa-undo"></i>
                                            Kembali</a>
                                    </div>
                                </div>
                            </div>
                            {{-- END CARD FOOTER --}}
                        </div>
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

            .register-card-body,
            .card {
                border-top-left-radius: 40px;
                border-top-right-radius: 40px;
                border-bottom-left-radius: 40px;
                border-bottom-right-radius: 40px;
                margin-top: 50px;
                margin-bottom: 50px;
                padding-bottom: 30px;
            }

            .card-header {
                border-top-left-radius: 30px;
                border-top-right-radius: 30px;
            }
        </style>
    @endpush

</x-registration-layout>