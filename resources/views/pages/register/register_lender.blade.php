<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aminah | Register</title>

    <!-- Favicons -->
    <link href="{{ asset('') }}/img/Aminah1.png" rel="icon">

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
            width: 700px;
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
                        <h4 class="register-box-msg">REGISTER</h4>
                    </a>
                </div>

                <form action="/registerLender" method="post">
                    <label for="nama-lengkap">Nama Lengkap</label>
                    <div class="input-group mb-3">
                        <input type="text" name="nama-lengkap" class="form-control" id="nama-lengkap" placeholder="masukkan nama lengkap disini">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <label for="email">Email</label>
                    <div class="input-group mb-3">
                        <input type="email" name="email" id="email" class="form-control" placeholder="masukkan email kamu disini">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <label for="password">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="masukkan password kamu disini">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <label for="password">Masukkan Ulang Password</label>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="masukkan ulang password kamu disini">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-2">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    Saya yakin bahwa data yang saya masukkan benar
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-block">Daftar Sekarang!</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-4 mt-4">
                    Sudah Punya Akun?
                    <a href="/login" class="text-center">Masuk Disini</a>
                </p>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="{{ asset('') }}/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('') }}/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('') }}/admin/dist/js/adminlte.min.js"></script>
</body>

</html>