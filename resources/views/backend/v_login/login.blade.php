<!DOCTYPE html>
<html dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="keywords" content="Toko Online" />
  <meta name="description" content="Project WP 2 Universitas Bina Sarana Informatika" />
  <meta name="robots" content="noindex,nofollow" />
  <title>Login</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/image/icon_univ_bsi.png') }}" />
  <!-- Custom CSS -->
  <link href="{{ asset('backend/matrix-admin/dist/css/style.min.css') }}" rel="stylesheet" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div class="main-wrapper">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark" style="height: 100vh">
      <div class="auth-box bg-dark border-top border-secondary" style="width: 60vh">
        <div id="loginform">
          <div class="text-center pt-3 pb-3">
            <span class="db"><img src="{{ asset('backend/matrix-admin/assets/images/logo.png') }}"
                alt="logo" /></span>
          </div>

          {{-- Error --}}
          @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong><i class="mdi mdi-alert"></i> {{ session('error') }}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          <!-- Form -->
          <form class="form-horizontal mt-3" id="loginform" action="{{ route('backend.login') }}" method="POST">
            @csrf
            <div class="row pb-4">
              <div class="col-12">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i
                        class="mdi mdi-account fs-4"></i></span>
                  </div>
                  <input type="text" name="email"
                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                    placeholder="Masukkan Email" aria-label="Email" aria-describedby="basic-addon1"
                    value="{{ old('email') }}" />

                  @error('email')
                    <span class="invalid-feedback alert-danger" role="alert">
                      {{ $message }}
                    </span>
                  @enderror

                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i
                        class="mdi mdi-lock fs-4"></i></span>
                  </div>
                  <input type="password" name="password"
                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                    placeholder="Masukkan Password" aria-label="Password" aria-describedby="basic-addon1" />

                  @error('password')
                    <span class="invalid-feedback alert-danger" role="alert">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row border-top border-secondary">
              <div class="col-12">
                <div class="form-group">
                  <div class="pt-3">
                    <button class="btn btn-info" id="to-recover" type="button">
                      <i class="mdi mdi-lock fs-4 me-1"></i> Lost password?
                    </button>
                    <button class="btn btn-success float-end text-white" type="submit">
                      Login
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- All Required js -->
  <!-- ============================================================== -->
  <script src="{{ asset('backend/matrix-admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="{{ asset('backend/matrix-admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!-- ============================================================== -->
  <!-- This page plugin js -->
  <!-- ============================================================== -->
  <script>
    $(".preloader").fadeOut();
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $("#to-recover").on("click", function() {
      $("#loginform").slideUp();
      $("#recoverform").fadeIn();
    });
    $("#to-login").click(function() {
      $("#recoverform").hide();
      $("#loginform").fadeIn();
    });
  </script>
</body>

</html>
