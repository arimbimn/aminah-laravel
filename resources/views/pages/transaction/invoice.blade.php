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
                                    <a href="/lender/profile">
                                        <img src="{{ asset('img') }}/Aminah2.png" width="150" alt="">
                                        <h4 class="register-box-msg">FORMULIR TRANSAKSI</h4>
                                    </a>
                                </div>
                            </div>
                            {{-- END CARD HEADER --}}

                            {{-- BEGIN CARD BODY --}}
                            <div class="card-body">
                                <p class="login-box-msg">Harap isi data dibawah ini dengan benar</p>
                                
                                {{-- BEGIN NAMA --}}
                                <div class="form-group">
                                    <x-basic.label for="nama" value="Nama Lengkap Pengirim" required="true" />
                                    <x-basic.input type="text" name="nama" :error="$errors->first('nama')" placeholder="masukkan nama kamu disini..." />
                                </div>
                                {{-- END NAMA --}}

                                {{-- BEGIN TANGGAL TRANSAKSI --}}
                                <div class="form-group">
                                    <x-basic.label for="tanggalTransaksi" value="Tanggal Transaksi" required="true" />
                                    <x-basic.input type="date" name="tanggalTransaksi" :error="$errors->first('tanggalTransaksi')" />
                                </div>
                                {{-- END TANGGAL TRANSAKSI --}}

                                {{-- BEGIN JENIS TRANSAKSI --}}
                                <div class="form-group">
                                    <x-basic.label for="jenistransaksi" value="Jenis Transaksi" required="true" />
                                    <select class="form-select col-12" aria-label="Default select example">
                                        <option selected>Pilih jenis transaksi </option>
                                        <option value="1">Pengisian Saldo Lender</option>
                                        <option value="2">Pembayaran Bagi Hasil</option>
                                      </select>
                                </div>
                                {{-- END JENIS TRANSAKSI --}}

                                {{-- BEGIN NAMA PEMILIK REKENING PENGIRIM --}}
                                <div class="form-group">
                                    <x-basic.label for="pengirimName" value="Nama Pemilik Rekening (Pengirim)" required="true" />
                                    <x-basic.input type="text" name="pengirimName" :error="$errors->first('pengirimName')" placeholder="masukkan nama pemilik rekening anda disini..." />
                                </div>
                                {{-- END NAMA PEMILIK REKENING PENGIRIM --}}

                                {{-- BEGIN NOMOR REKENING PENGIRIM --}}
                                <div class="form-group">
                                    <x-basic.label for="nomorRekening" value="Nomor Rekening" required="true" />
                                    <x-basic.input type="text" name="nomorRekening" :error="$errors->first('nomorRekening')" placeholder="masukkan nomor rekening anda disini..." />
                                </div>
                                {{-- END NOMOR REKENING PENGIRIM --}}

                                {{-- BEGIN NAMA BANK PENGIRIM --}}
                                <div class="form-group">
                                    <x-basic.label for="bankName" value="Nama Bank" required="true" />
                                    <x-basic.input type="text" name="bankName" :error="$errors->first('bankName')" placeholder="masukkan nama bank dari rekening anda disini..." />
                                </div>
                                {{-- END NAMA BANK PENGIRIM --}}

                                <hr class="mt-5 mb-2">
                                <p>Kirim ke data berikut:</p>
                                {{-- BEGIN NAMA PEMILIK REKENING PENERIMA --}}
                                <h2><b>AMINAH</h2>
                                {{-- END NAMA PEMILIK REKENING PENERIMA --}}
                                
                                {{-- BEGIN NOMOR REKENING PENERIMA --}}
                                <p>Nomor Rekening : 12345678 </b> </p>
                                {{-- END NOMOR REKENING PENERIMA --}}

                                {{-- BEGIN NAMA BANK PENERIMA --}}
                                <p><small>BRI</small></p>
                                {{-- END NAMA BANK PENERIMA --}}

                                <hr class="mt-2 mb-5">

                                {{-- BEGIN FOTO STRUK PEMBAYARAN --}}
                                <div class="form-group">
                                    <label for="file-bayar" class="form-label">Foto Bukti Pembayaran (unggah foto bukti transaksi anda disini) </label>
                                    <input class="form-control" name="file-bayar" type="file" id="file-bayar">
                                    @error('file-diri')
                                        <div class="text text-danger">
                                            <small>{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                                {{-- END FOTO STRUK PEMBAYARAN --}}
                                
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
                                        <button type="submit" class="btn btn-outline-success col-12"><i class="fa fa-upload"></i> Isi Saldo Saya Sekarang!</button>
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
