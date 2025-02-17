<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <!-- Google Font: Playfair Display para una fuente elegante -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
  <!-- Bootstrap Icons (alternativamente Font Awesome) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


  <!-- Scripts & Styles -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  <style>
    /* Hace la navbar transparente y fuerza el color blanco en enlaces */
    .navbar {
      background-color: transparent !important;
    }
    .navbar .navbar-brand,
    .navbar .nav-link {
      color: white !important;
    }
    /* Personaliza el texto de la marca */
    .navbar-brand .brand-text {
      font-family: 'Playfair Display', serif;
      font-size: 1.8rem;
      text-align: center;
    }
  </style>
</head>
<body>
  <div id="app">
    @if (!Request::routeIs('login') && !Request::routeIs('register') && !request()->is('password*'))
    <nav class="navbar navbar-expand-md">
      <div class="container">
        
          <!-- Ícono o imagen -->
          <img src="{{ asset('images/cartel-bar-cocteles-estilo-luces-neon_23-2147836553.avif') }}" alt="Icono" style="height: 60px; margin-right: 10px;">
          <!-- Texto centrado con fuente elegante -->
          <span class="brand-text" style="font-size: 3rem; font-weight: bold; font-family: 'Playfair Display', serif;">
    Cocteles
  </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav me-auto">
          </ul>
  
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ms-auto">
            @guest
              @if (Route::has('login'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
              @endif
              @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
              @endif
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" 
                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
                </a>
  
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
    @endif
    <main class="py-4">
      @yield('content')
    </main>
  </div>
</body>
</html>
