<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LOGIN PESERTA DIDIK</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link href="{{ asset('public/img/Logo GEC.png') }}" rel="shortcut icon">

  <style>

  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo" style="margin-bottom:-25px;position: relative; z-index: 9999;">
      <img src="{{ asset('public/img/Logo GEC.png') }}" class="rounded" style="width:40%;">
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-header" style="background-color:#06B8FF;color:white;border-bottom:5px solid white;text-align:center;">
        <h3 class="mt-4 mx-auto">LOGIN</h3>
      </div>
      <div class="card-body login-card-body" style="background-color:#06B8FF;color:white;">

        <form action="" method="post">
          <div class="form-group">
            <label for="" class="form-group">Email</label>
            <input type="email" class="form-control" placeholder="Email..." autofocus>
          </div>
          <div class="form-group">
            <label for="" class="form-group">Password</label>
            <input type="password" class="form-control" placeholder="Password...">
          </div>
          <div class="row mb-4">
            <!-- /.col -->
            <div class="col-12">
              <a href="{{ url('/') }}" class="float-sm-right" style="color:white;">
                Lupa Password ?
              </a>
            </div>
            <!-- /.col -->
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-block fluid" style="background-color:#5656DE;color:white;">LOGIN</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <!-- /.social-auth-links -->

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{ asset('public/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('public/js/adminlte.min.js') }}"></script>

</body>

</html>