<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pos | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    .project-tab #tabs {
      background: #007b5e;
      color: #eee;
    }

    .project-tab #tabs h6.section-title {
      color: #eee;
    }

    .project-tab #tabs .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
      color: #0062cc;
      background-color: transparent;
      border-color: transparent transparent #f3f3f3;
      border-bottom: 3px solid !important;
      font-size: 16px;
      font-weight: bold;
    }

    .project-tab .nav-link {
      border: 1px solid transparent;
      border-top-left-radius: .25rem;
      border-top-right-radius: .25rem;
      color: #0062cc;
      font-size: 16px;
      font-weight: 600;
    }

    .project-tab .nav-link:hover {
      border: none;
    }

    .project-tab thead {
      background: #f3f3f3;
      color: #333;
    }

    .project-tab a {
      text-decoration: none;
      color: #333;
      font-weight: 600;
    }
  </style>
</head>

<body
  style="background: url('{{asset('images/bg.jpg')}}');background-size: cover;background-repeat: no-repeat;">
  {{-- @include('auth.login_nav.login_nav') --}}

  <div class="container">
    <br>{{--<br>
      <div class="row">
          <div class="col-8"></div>
          <div class="col-4">
            <button type="submit" class="btn btn-info float-right"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp; View Cart-1</button>
          </div>
        </div>
      <br>--}}
    <div class="row">
      <div class="col-md-7"></div>
      <div class="col-md-5" style="background-color: #ffffff;
  border: 1px solid gray;
  opacity: 0.6; padding:20px;" >
       <h1 class="gradient-text-01 color1 text-center">
        
          Welcome To Amar Pos! </h1>
        <p class="text-center">Sign in using your Pos account</p>
        <br>
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="input-group mb-3">
            {{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                 value="{{ old('email') }}" autocomplete="email" required placeholder="Email"
            autofocus>--}}
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
              value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your Email" autofocus>

            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
              name="password" required autocomplete="current-password" placeholder="Enter Your Password">

            {{--                <input id="password" type="password" class="form-control@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">--}}
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="row">
            <div class="col-8">
              <label>
                <p class="mb-1">
                  <a href="#" class="text-info">Forgot Password?</a>
                </p>
              </label>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-info float-right">Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>


      <div class="col-md-7">

      </div>

    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
  <script type="text/javascript">
    $(window).on("load", function () {
        $(".loader").fadeOut();
        $("#preloader").delay(250).fadeOut("slow");
    });
  </script>
</body>

</html>