<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aminah | Log in</title>

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
    .login-page {
      background-color: lightgreen;
      background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
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
            <img src="{{ asset('') }}/img/Aminah2.png" width="150" alt="">
            <h4 class="login-box-msg">LOGIN</h4>
          </a>
        </div>
        <form action="/admin/login" method="POST">
          @csrf
          <label for="email">Email</label>
          <div class="input-group mb-3">
            <input type="email" name="email" id="email" class="form-control" placeholder="masukkan e-mail anda">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <label for="password">Password</label>
          <div class="input-group mb-3">
            <input type="password" name="password" id="password" class="form-control" placeholder="masukkan password anda">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-0">
            <p class="text text-center col-12">{!! captcha_img('flat') !!}</p>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="captcha" id="captcha" class="form-control" placeholder="Captcha..." />
          </div>
          <p class="mb-1">
            Lupa kata sandi/password?
            <a href="/forgot-password">Klik Disini</a>
          </p>
          <div class="row">
            <div class="col-8 mb-2">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">
                  Ingatkan Saya
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-success btn-block">Masuk</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mb-4 mt-4">
          Belum Punya Akun?
          <a href="/register" class="text-center">Daftar Disini</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{ asset('') }}/admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('') }}/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('') }}/admin/dist/js/adminlte.min.js"></script>
</body>

</html>
