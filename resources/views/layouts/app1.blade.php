<!DOCTYPE html>
<html lang="es">

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
  <!-- Template Main CSS File -->
  <link href="{{ asset('templates/niceadmin/assets/css/style.css')}}" rel="stylesheet">
  <!-- Custom CSS -->
  @yield('css-customize')
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

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Maestros</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="{{request()->routeIs('clientes.index', 'numeros.index', 'ventas.index', 'responsables.index', 'eventos.index', 'pagos.index') ? 'nav-content collapse show' : 'nav-content collapse' }}" data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="{{route('responsables.index')}}" class="{{request()->routeIs('responsables.index') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Responsables</span>
            </a>
          </li>
          <li>
            <a href="{{route('eventos.index')}}" class="{{request()->routeIs('eventos.index') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Eventos</span>
            </a>
          </li>
          <li>
            <a href="{{route('clientes.index')}}" class="{{request()->routeIs('clientes.index') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Clientes</span>
            </a>
          </li>

          <li>
            <a href="{{route('numeros.index')}}" class="{{request()->routeIs('numeros.index') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Numeros</span>
            </a>
          </li>

          <li>
            <a href="{{route('ventas.index')}}" class="{{request()->routeIs('ventas.index') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Ventas</span>
            </a>
          </li>

          <li>
            <a href="{{route('pagos.index')}}" class="{{request()->routeIs('pagos.index') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Pagos</span>
            </a>
          </li>


        </ul>
        
      </li><!-- End Components Nav -->
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
      Diseñado por <a href="https://itcloud.com.co">Ivan Narvaez Mejia</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- JS Custom-->
  @yield('js-customize')

  <!-- Vendor JS Files -->
  
  <script src="{{ asset('templates/niceadmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <script src="{{ asset('templates/niceadmin/assets/js/main.js')}}"></script>
  
</body>
</html>