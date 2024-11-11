<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Aplicacion de Rifas Online</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('templates/niceadmin/assets/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('templates/niceadmin/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('templates/niceadmin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('templates/niceadmin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('templates/niceadmin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('templates/niceadmin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('templates/niceadmin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('templates/niceadmin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('templates/niceadmin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('templates/niceadmin/assets/css/style.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('home')}}" class="logo d-flex align-items-center">
        <img src="{{ asset('templates/niceadmin/assets/img/logo.png')}}" alt="">
        <span class="d-none d-lg-block">Rifa Online</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="button" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="{{request()->routeIs('home') ? 'nav-link' : 'nav-link collapsed'}}" href="{{route('home')}}">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->
      </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    @yield('info-page-current')

    @yield('content')
  

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>ITCloud S.A.S</span></strong>. Todos los derechos reservados.
    </div>
    <div class="credits">
      Diseñado por <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('templates/niceadmin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('templates/niceadmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('templates/niceadmin/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{ asset('templates/niceadmin/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ asset('templates/niceadmin/assets/vendor/quill/quill.js')}}"></script>
  <script src="{{ asset('templates/niceadmin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ asset('templates/niceadmin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ asset('templates/niceadmin/assets/vendor/php-email-form/validate.js')}}"></script>

  <script src="{{ asset('templates/niceadmin/assets/js/main.js')}}"></script>

</body>
</html>