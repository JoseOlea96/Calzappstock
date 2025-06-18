<!DOCTYPE html>
<html lang="en">

<head>
  <title>Calzappstock</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="Santiago Montiel">
  <meta name="keywords" content="Inventario Virtual">
  <meta name="description" content="Calzappstock - Manejamos tu inventario">

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,900;1,900&family=Source+Sans+Pro:wght@400;600;700;900&display=swap"
    rel="stylesheet">
  <script src="{{ asset('js/script.js') }}" defer></script>
</head>

  <!-- Loader 4 -->

  <div class="preloader" style="position: fixed;top:0;left:0;width: 100%;height: 100%;background-color: #fff;display: flex;align-items: center;justify-content: center;z-index: 9999;">
    <svg version="1.1" id="L4" width="100" height="100" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    viewBox="0 0 50 100" enable-background="new 0 0 0 0" xml:space="preserve">
    <circle fill="#111" stroke="none" cx="6" cy="50" r="6">
      <animate
        attributeName="opacity"
        dur="1s"
        values="0;1;0"
        repeatCount="indefinite"
        begin="0.1"/>    
    </circle>
    <circle fill="#111" stroke="none" cx="26" cy="50" r="6">
      <animate
        attributeName="opacity"
        dur="1s"
        values="0;1;0"
        repeatCount="indefinite" 
        begin="0.2"/>       
    </circle>
    <circle fill="#111" stroke="none" cx="46" cy="50" r="6">
      <animate
        attributeName="opacity"
        dur="1s"
        values="0;1;0"
        repeatCount="indefinite" 
        begin="0.3"/>     
    </circle>
    </svg>
  </div>
      </div>
    </div>
    <nav id="header-nav" class="navbar navbar-expand-lg">
      <div class="container-lg">
        <a class="navbar-brand" href="index.html">
          <img src="{{ asset('images/main-logo.png') }}" class="logo" alt="logo" style="width: 150px; height: auto;">
        </a>
        <button class="navbar-toggler d-flex d-lg-none order-3 border-0 p-1 ms-2" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
          <svg class="navbar-icon">
            <use xlink:href="#navbar-icon"></use>
          </svg>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar">
          <div class="offcanvas-header px-4 pb-0">
            <a class="navbar-brand ps-3" href="{{ route('home') }}">
              <img src="{{ asset('images/main-logo.png') }}" class="logo" alt="logo">
            </a>
            <button type="button" class="btn-close btn-close-black p-5" data-bs-dismiss="offcanvas" aria-label="Close"
              data-bs-target="#bdNavbar"></button>
          </div>
          <div class="offcanvas-body">
            <ul id="navbar" class="navbar-nav fw-bold justify-content-end align-items-center flex-grow-1">
              <li class="nav-item">
                <a class="nav-link me-5" href="/catalogo">Catálogo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-5" href="{{ route('inventario') }}">Inventario</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-5" href="{{ route('historial') }}">Movimientos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-5" href="{{ route('proveedores.create') }}">Proveedores</a>
              </li>
            </ul>
          </div>
        </div>
          <ul class="d-flex justify-content-end list-unstyled align-item-center m-0">
            <li class="pe-3">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="container">
    <h1>Bienvenido, Administrador</h1>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card calzappstock-metricas-card calzappstock-ventas-totales">
                <div class="card-body">
                    <h5 class="card-title">Ventas Totales</h5>
                    <p class="card-text">${{ $totalVentas }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card calzappstock-metricas-card calzappstock-ventas-hoy">
                <div class="card-body">
                    <h5 class="card-title">Ventas Hoy</h5>
                    <p class="card-text">{{ $ventasHoy }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card calzappstock-metricas-card calzappstock-stock-bajo ultima-metrica">
                <div class="card-body">
                    <h5 class="card-title">Productos con Stock Bajo</h5>
                    <p class="card-text">{{ $productosBajoStock }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

  <footer id="footer" class="site-footer py-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 pb-3">
          <ul class="list-unstyled">
            <li class="pb-2">
              <a href="#">Contáctanos</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-4 footer-menu">
          <div class="footer-contact-text">
            <span>CalzAppStock, San Francisco Montería - Colombia.</span>
            <span>Llámanos: (+57) 300 7438138</span>
            <span class="text-hover fw-bold light-border">
              <a href="mailto:montields1601@gmail.com">montields1601@gmail.com</a>
            </span>
          </div>
        </div>
        <div class="col-lg-4 text-center">
          <p>© Copyright Calzappstock 2025.</p>
        </div>
      </div>
    </div>
  </footer>
  <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
  <script src="{{ asset('js/plugins.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
