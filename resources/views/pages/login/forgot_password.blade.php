<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Password</title>

    <!-- Favicons -->
    <link href="assets/img/Logo-Aminah-03.png" rel="icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">

    <style>
        .login-page {
            background-color: lightgreen;
            background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/img/Logo-Aminah-02.png');
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
        }

        .login-card-body,
        .card {
            border-radius: 20px;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <div class="login-logo mt-0 mb-0">
                    <a href="/">
                        <img src="assets/img/Logo-Aminah-03.png" width="50" alt="">
                        <h4 class="login-box-msg">Lupa Kata Sandi/Password</h4>
                    </a>
                </div>
                <p class="login-box-msg">Masukkan email kamu untuk dapat mengganti kata sandi/password baru.</p>

                <form action="/lupaPassword" method="post">
                    <label for="email">Masukkan email</label>
                    <div class="input-group mb-3">
                        <input type="email" id="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-block">Ubah Password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    Sudah punya akun?
                    <a href="/login">masuk disini</a>
                </p>
                <p class="mb-0">
                    Buat akun baru?
                    <a href="/register" class="text-center">Daftar disini</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="admin/dist/js/adminlte.min.js"></script>
</body>

</html>