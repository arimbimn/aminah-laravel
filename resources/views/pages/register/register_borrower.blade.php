<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aminah | Register Calon Mitra</title>

    <!-- Favicons -->
    <link href="{{ asset('') }}/img/Logo-Aminah-03.png" rel="icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('') }}/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('') }}/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('') }}/admin/dist/css/adminlte.min.css">

    <style>
        .register-page {
            background-color: lightgreen;
            background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;

        }

        .register-card-body,
        .card {
            border-radius: 20px;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .register-box {
            width: 1000px;
            
        }
    </style>

</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card">
            <div class="card-body register-card-body">
                <div class="register-logo mt-0 mb-0">
                    <a href="/">
                        <img src="{{ asset('') }}/img/Aminah2.png" width="150" alt="">
                        <h4 class="register-box-msg">SELAMAT DATANG CALON MITRA!</h4>
                    </a>
                </div>
                <p class="login-box-msg">Harap isi data dibawah ini dengan benar</p>
                <form class="row g-3" action="/borrower_register" method="post">
                    <div class="col-md-6 mt-3">
                        <label for="nama-umkm" class="form-label">Nama UMKM</label>
                        <input type="text" name="nama-umkm" id="nama-umkm" class="form-control" placeholder="masukkan nama usaha anda disini">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="nama-pemilik" class="form-label">Nama Pemilik UMKM (sesuai KTP)</label>
                        <input type="text" name="nama-pemilik" id="nama-pemilik" class="form-control" placeholder="masukkan nama lengkap anda disini">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="alamat-umkm" class="form-label">Alamat UMKM </label>
                        <input type="text" name="alamat-umkm" class="form-control" id="alamat-umkm" placeholder="masukkan alamat usaha anda disini">
                    </div>
                    <div class="col-6 mt-4">
                        <label for="alamat-rumah" class="form-label">Alamat Rumah (sesuai KTP)</label>
                        <input type="text" class="form-control" id="alamat-rumah" placeholder="masukkan alamat rumah anda disini">
                    </div>
                    <div class="col-md-4 mt-4">
                        <label for="input-nik" class="form-label">NIK (Nomor Induk Kependudukan)</label>
                        <input type="text" name="input-nik" class="form-control" id="input-nik" placeholder="masukkan nomor NIK anda disini">
                    </div>
                    <div class="col-md-4 mt-4">
                        <label for="input-no-hp" class="form-label">Nomor Telpon/HP Aktif</label>
                        <input type="text" class="form-control" id="input-no-hp" placeholder="masukkan no. telpon/hp anda yang aktif disini">
                    </div>
                    <div class="col-md-4 mt-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="masukkan alamat email kamu disini">
                    </div>
                    <div class="col-md-4 mt-4">
                        <label for="input-rekening" class="form-label">Nomor Rekening</label>
                        <input type="text" name="input-rekening" class="form-control" id="input-rekening" placeholder="masukkan nomor rekening anda disini">
                    </div>
                    <div class="col-4 mt-4">
                        <label for="input-income" class="form-label">Pendapatan UMKM per Bulan</label>
                        <input type="text" class="form-control" id="input-income" placeholder="masukkan jumlah pendapatan usaha kamu per bulan. mis : 10000">
                    </div>
                    <div class="col-4 mt-4">
                        <label for="input-pengajuan" class="form-label">Jumlah Pengajuan</label>
                        <input type="text" class="form-control" id="input-pengajuan" placeholder="masukkan jumlah pengajuan kamu. mis : 10000">
                    </div>
                    <div class="mb-3 col-6 mt-4">
                        <label for="file-ktp" class="form-label">Foto KTP Pemilik UMKM (unggah foto KTP anda disini) </label>
                        <input class="form-control" type="file" id="file-ktp">
                    </div>
                    <div class="mb-3 col-6 mt-4">
                        <label for="file-siu" class="form-label">Foto Surat Izin Usaha (SIU) (unggah foto siu disini)</label>
                        <input class="form-control" type="file" id="file-siu">
                    </div>
                    <div class="mb-3 col-12 mt-4">
                        <label for="file-foto-umkm" class="form-label">Foto UMKM (unggah foto usaha anda disini) </label>
                        <input class="form-control" type="file" id="file-foto-umkm">
                    </div>
                    <div class="mb-3 col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Saya menyatakan bahwa data yang saya masukan adalah benar
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-success">Daftarkan Usaha Saya Sekarang!</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{ asset('') }}/admin/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('') }}/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('') }}/admin/dist/js/adminlte.min.js"></script>
        <!-- /.card -->

</body>

</html>