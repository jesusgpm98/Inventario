<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/png" href="https://img.icons8.com/doodle/16/000000/pizza.png"/>

  <title>{{ $title }} - Inventario</title>

  <link rel="stylesheet" href="{{asset('/css/app.css')}}">


  <link rel="shortcut icon" href="/images/cp_ico.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
  <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />
  <link href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />


  <script src="{{ asset('css/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('css/jquery/jquery.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  <script src="{{ asset('css/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

</head>

<body>
  @if (Auth::check())
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="{{ route('productos.index') }}">
        <img src="https://img.icons8.com/doodle/50/000000/pizza.png" alt="pizzeria">
      </a>
      <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
        <ul class="navbar-nav flex-row w-100">
          <li class="nav-item ml-auto px-2">
            <form class="form-inline my-2 my-lg-0" action="{{ route('user.logout') }}" method="POST">
              {{ csrf_field() }}
              <button type="submit" name="button" class="btn btn-link">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </nav>
  @else
  @endif

  <div class="container-fluid">
    <div class="row">
      @if (Auth::check())
        <div class="col-2 collapse d-md-flex bg-light pt-2 min-vh-100" id="sidebar">
          <ul class="nav flex-column flex-nowrap">
            <li class="nav-item"><a class="nav-link" href="{{ route('productos.index') }}">Overview</a></li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="#submenu1" data-toggle="collapse" data-target="#submenu1">Reports</a>
              <div class="collapse" id="submenu1" aria-expanded="false">
                <ul class="flex-column pl-2 nav">
                  <li class="nav-item"><a class="nav-link py-0" href="{{ route('productos.buscar') }}">Orders</a></li>
                  <li class="nav-item">
                    <a class="nav-link collapsed py-1" href="#submenu1sub1" data-toggle="collapse" data-target="#submenu1sub1">Customers</a>
                    <div class="collapse" id="submenu1sub1" aria-expanded="false">
                      <ul class="flex-column nav pl-4">
                        <li class="nav-item">
                          <a class="nav-link p-1" href="#">
                            <i class="fa fa-fw fa-clock-o"></i> Daily
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link p-1" href="#">
                            <i class="fa fa-fw fa-dashboard"></i> Dashboard
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link p-1" href="#">
                            <i class="fa fa-fw fa-bar-chart"></i> Charts
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link p-1" href="#">
                            <i class="fa fa-fw fa-compass"></i> Areas
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="#">Analytics</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Export</a></li>
          </ul>
        </div>
      @else
      @endif

      <main role="main" class="container">
        <div class="container">
          <br>
          @if (session()->has('flash'))
            <div class="col-md-4 offset-md-4">
              <div class="alert alert-info text-center">
                {{ session('flash') }}
              </div>
            </div>
          @endif
          @yield('content')
        </div>
      </main>

    </div>
  </div>
</body>
</html>
