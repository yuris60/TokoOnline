<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="keywords" content="Toko Online" />
  <meta name="description" content="Project WP 2 Universitas Bina Sarana Informatika" />
  <meta name="robots" content="noindex,nofollow" />
  <title>Toko Online</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/image/icon_univ_bsi.png') }}" />
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css"
    href="{{ asset('backend/matrix-admin/assets/extra-libs/multicheck/multicheck.css') }}" />
  <link href="{{ asset('backend/matrix-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
    rel="stylesheet" />
  <link href="{{ asset('backend/matrix-admin/dist/css/style.min.css') }}" rel="stylesheet" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
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
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
          <!-- ============================================================== -->
          <!-- Logo -->
          <!-- ============================================================== -->
          <a class="navbar-brand" href="index.html">
            <!-- Logo icon -->
            <b class="logo-icon ps-2">
              <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
              <!-- Dark Logo icon -->
              <img src="{{ asset('backend/image/icon_univ_bsi.png') }}" alt="homepage" class="light-logo"
                width="25" />
            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span class="logo-text ms-2">
              <!-- dark Logo text -->
              <img src="{{ asset('backend/image/logo_text.png') }}" alt="homepage" class="light-logo" />
            </span>
            <!-- Logo icon -->
            <!-- <b class="logo-icon"> -->
            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
            <!-- Dark Logo icon -->
            <!-- <img src="{{ asset('backend/matrix-admin/') }}assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

            <!-- </b> -->
            <!--End Logo icon -->
          </a>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Toggle which is visible on mobile only -->
          <!-- ============================================================== -->
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
              class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-start me-auto">
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
            </li>
          </ul>
          <!-- ============================================================== -->
          <!-- Right side toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-end">
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#"
                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if (Auth::user()->foto)
                  <img src="{{ asset('storage/img-user/' . Auth::user()->foto) }}" alt="user" class="rounded-circle"
                    width="31">
                @else
                  <img src="{{ asset('storage/img-user/img-default.jpg') }}" alt="user" class="rounded-circle"
                    width="31">
                @endif
              </a>
              <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('backend.user.edit', Auth::user()->id) }}"><i
                    class="mdi mdi-account me-1 ms-1"></i> My Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href=""
                  onclick="event.preventDefault(); document.getElementById('keluar-app').submit();"><i
                    class="fa fa-power-off me-1 ms-1"></i>
                  Logout</a>
              </ul>
            </li>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin5">
      <!-- Sidebar scroll-->
      <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          <ul id="sidebarnav" class="pt-4">
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('backend.beranda') }}"
                aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                  class="hide-menu">Dashboard</span></a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('backend.user.index') }}"
                aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">User</span></a>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow waveseffect waves-dark" href="#"
                aria-expanded="false"><i class="mdi mdi-shopping"></i><span class="hide-menu">Data Produk </span></a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item"><a href="{{ route('backend.kategori.index') }}" class="sidebar-link"><i
                      class="mdi mdi-chevron-right"></i><span class="hide-menu"> Kategori
                    </span></a>
                </li>
                <li class="sidebar-item"><a href="{{ route('backend.produk.index') }}" class="sidebar-link"><i
                      class="mdi mdi-chevron-right"></i><span class="hide-menu"> Produk
                    </span></a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      {{-- <div class="page-breadcrumb">
        <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Tables</h4>
            <div class="ms-auto text-end">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Library
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div> --}}
      <!-- ============================================================== -->
      <!-- End Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->


        <!-- @yieldAwal -->
        @yield('content')
        <!-- @yieldAkhir-->

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
      <footer class="footer text-center">
        All Rights Reserved by Matrix-admin. Designed and Developed by
        <a href="https://www.wrappixel.com">WrapPixel</a>.
      </footer>
      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <script src="{{ asset('backend/matrix-admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="{{ asset('backend/matrix-admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!-- slimscrollbar scrollbar JavaScript -->
  <script src="{{ asset('backend/matrix-admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jque') }}ry.min.js">
  </script>
  <script src="{{ asset('backend/matrix-admin/assets/extra-libs/sparkline/sparkline.js') }}"></script>
  <!--Wave Effects -->
  <script src="{{ asset('backend/matrix-admin/dist/js/waves.js') }}"></script>
  <!--Menu sidebar -->
  <script src="{{ asset('backend/matrix-admin/dist/js/sidebarmenu.js') }}"></script>
  <!--Custom JavaScript -->
  <script src="{{ asset('backend/matrix-admin/dist/js/custom.min.js') }}"></script>
  <!-- this page js -->
  <script src="{{ asset('backend/matrix-admin/assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
  <script src="{{ asset('backend/matrix-admin/assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
  <script src="{{ asset('backend/matrix-admin/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/ckeditor/ckeditor.js') }}"></script>
  <script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $("#zero_config").DataTable();
  </script>

  <!-- form keluar app -->
  <form id="keluar-app" action="{{ route('backend.logout') }}" method="POST" class="dnone">
    @csrf
  </form>
  <!-- form keluar app end -->

  <!-- sweetalert -->
  <script src="{{ asset('backend/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
  <!-- sweetalert End -->
  <!-- konfirmasi success-->
  @if (session('success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}"
      });
    </script>
  @endif
  <!-- konfirmasi success End-->

  <script type="text/javascript">
    //Konfirmasi delete
    $('.show_confirm').click(function(event) {
      var form = $(this).closest("form");
      var konfdelete = $(this).data("konf-delete");
      event.preventDefault();
      Swal.fire({
        title: 'Konfirmasi Hapus Data?',
        html: "Data yang dihapus <strong>" + konfdelete + "</strong> tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, dihapus',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
          // Swal.fire('Terhapus!', 'Data berhasil dihapus.', 'success')
          //   .then(() => {
          //     form.submit();
          //   });
        }
      });
    });
  </script>
  <script>
    function previewFoto() {
      const foto = document.querySelector('input[name="foto"]');
      const fotoPreview = document.querySelector('.foto-preview');
      fotoPreview.style.display = 'block';
      const fotoReader = new FileReader();
      fotoReader.readAsDataURL(foto.files[0]);
      fotoReader.onload = function(fotoEvent) {
        fotoPreview.src = fotoEvent.target.result;
        fotoPreview.style.width = '100%';
      }
    }
  </script>
  <script>
    ClassicEditor
      .create(document.querySelector('#ckeditor'))
      .catch(error => {
        console.error(error);
      });
  </script>
</body>

</html>
