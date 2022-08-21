<x-registration-layout title="{{ isset($title) ? $title : 'Aminah' }}">
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-12">
          <form action="/lender/profile/update" method="post" enctype="multipart/form-data">
            @csrf
            {{-- BEGIN CARD --}}
            <div class="card card-yellow">
              {{-- BEGIN CARD HEADER --}}
              <div class="card-header">
                <div class="register-logo mt-0 mb-0">
                  <a href="/lender/profile">
                    <img src="{{ asset('img') }}/Aminah2.png" width="150" alt="">
                    <h4 class="register-box-msg">MELENGKAPI ISI PROFIL</h4>
                  </a>
                </div>
              </div>
              {{-- END CARD HEADER --}}

              {{-- BEGIN CARD BODY --}}
              <div class="card-body">
                <p class="login-box-msg">Harap isi data dibawah ini dengan benar</p>

                {{-- BEGIN NAMA LENDER --}}
                <div class="form-group">
                  <x-basic.label for="nama" value="Nama Lengkap (Sesuai KTP)" required="true" />
                  <x-basic.input exist="{{ Auth::user()->name }}" type="text" name="nama" :error="$errors->first('nama')" placeholder="masukkan nama kamu disini..." />
                </div>
                {{-- END NAMA LENDER --}}

                {{-- BEGIN JENIS KELAMIN LENDER --}}
                <div class="form-group">
                  <x-basic.label for="jenisKelamin" value="Jenis Kelamin" required="true" />
                  <select class="form-select col-12 form-control" aria-label="Default select example" name="jenisKelamin">
                    <option selected>Pilih jenis kelamin </option>
                    <option value="1">Laki - laki</option>
                    <option value="2">Perempuan</option>
                  </select>
                </div>
                {{-- END JENIS KELAMIN LENDER --}}

                {{-- BEGIN TEMPAT LAHIR LENDER --}}
                <div class="form-group">
                  <x-basic.label for="tempatLahir" value="Tempat Lahir (Sesuai KTP)" required="true" />
                  <x-basic.input type="text" name="tempatLahir" :error="$errors->first('tempatLahir')" placeholder="masukkan tempat lahir kamu disini..." />
                </div>
                {{-- END TEMPAT LAHIR LENDER --}}

                {{-- BEGIN TANGGAL LAHIR LENDER --}}
                <div class="form-group">
                  <x-basic.label for="tanggalLahir" value="Tanggal Lahir (Sesuai KTP)" required="true" />
                  <x-basic.input class="form-select col-12 form-control" type="date" name="tanggalLahir" :error="$errors->first('tanggalLahir')" />
                </div>
                {{-- END TANGGAL LAHIR LENDER --}}

                {{-- BEGIN NO HP LENDER --}}
                <div class="form-group">
                  <x-basic.label for="noHp" value="Nomor Hp Aktif" required="true" />
                  <x-basic.input type="text" name="noHp" :error="$errors->first('noHp')" placeholder="masukkan nomor HP kamu disini..." />
                </div>
                {{-- END NO HP LENDER --}}

                {{-- BEGIN NIK --}}
                <div class="form-group">
                  <x-basic.label for="nik" value="NIK (Nomor Induk Kependudukan)" required="true" />
                  <x-basic.input type="text" name="nik" :error="$errors->first('nik')" placeholder="masukkan NIK kamu disini..." />
                </div>
                {{-- END NIK --}}

                {{-- BEGIN ALAMAT --}}
                <div class="form-group">
                  <x-basic.label for="alamat" value="Alamat (Sesuai KTP)" required="true" />
                  <x-basic.input type="text" name="alamat" :error="$errors->first('alamat')" placeholder="masukkan alamat kamu disini..." />
                </div>
                {{-- END ALAMAT --}}

                {{-- BEGIN NAMA PEMILIK REKENING --}}
                <div class="form-group">
                  <x-basic.label for="pemilikRekeningName" value="Nama Pemilik Rekening" required="true" />
                  <x-basic.input type="text" name="pemilikRekeningName" :error="$errors->first('pemilikRekeningName')" placeholder="masukkan nama pemilik rekening anda disini..." />
                </div>
                {{-- END NAMA PEMILIK REKENING --}}

                {{-- BEGIN NOMOR REKENING --}}
                <div class="form-group">
                  <x-basic.label for="nomorRekening" value="Nomor Rekening" required="true" />
                  <x-basic.input type="text" name="nomorRekening" :error="$errors->first('nomorRekening')" placeholder="masukkan nomor rekening anda disini..." />
                </div>
                {{-- END NOMOR REKENING --}}

                {{-- BEGIN NAMA BANK --}}
                <div class="form-group">
                  <x-basic.label for="bankName" value="Nama Bank" required="true" />
                  <x-basic.input type="text" name="bankName" :error="$errors->first('bankName')" placeholder="masukkan nama bank dari rekening anda disini..." />
                </div>
                {{-- END NAMA BANK --}}

                {{-- BEGIN FOTO DIRI --}}
                <div class="form-group">
                  <label for="file-diri" class="form-label">Foto Diri (unggah foto diri anda disini) </label>
                  <input class="form-control" name="file-diri" type="file" id="file-diri">
                  @error('file-diri')
                    <div class="text text-danger">
                      <small>{{ $message }}</small>
                    </div>
                  @enderror
                </div>
                {{-- END FOTO DIRI --}}

                {{-- BEGIN FOTO KTP --}}
                <div class="form-group">
                  <label for="file-ktp" class="form-label">Foto KTP (unggah foto KTP anda disini) </label>
                  <input class="form-control" name="file-ktp" type="file" id="file-ktp">
                  @error('file-ktp')
                    <div class="text text-danger">
                      <small>{{ $message }}</small>
                    </div>
                  @enderror
                </div>
                {{-- END FOTO KTP --}}

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
                    <button type="submit" class="btn btn-outline-success col-12"><i class="fa fa-edit"></i> Lengkapi Profil Saya Sekarang!</button>
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
