@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="row justify-content-center w-100">
    <div class="col-md-6 col-lg-4">
      <div class="card">
        <div class="card-header text-center">
          <h1 style="font-size: 2.5rem;">{{ __('Login') }}</h1>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Campo de email con icono de sobre -->
            <div class="form-group">
              <label for="email">{{ __('Email') }}</label>
              <div class="input-group">
                <span class="input-group-text">
                  <i class="bi bi-envelope"></i>
                </span>
                <input id="email" type="email" class="form-control" name="email" required autofocus>
              </div>
            </div>

            <!-- Campo de contraseña con icono de llave a la izquierda y toggle a la derecha -->
            <div class="form-group">
    <label for="password">Contraseña</label>
    <div class="input-group">
        <!-- Icono de llave a la izquierda -->
        <span class="input-group-text">
            <i class="bi bi-key"></i>
        </span>
        <!-- Campo de contraseña -->
        <input id="password" type="password" class="form-control" name="password" required>
        <!-- Icono de toggle (ojo) a la derecha -->
        <span class="input-group-text">
            <a href="#" id="togglePassword" style="color: inherit; text-decoration: none;">
                <i class="bi bi-eye-slash"></i>
            </a>
        </span>
    </div>
</div>


            <!-- Recordar contraseña -->
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" name="remember" id="remember">
              <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
            </div>

            <!-- Enlace de Forgot Password -->
            <div class="text-center mb-3">
              @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                  {{ __('Forgot your password?') }}
                </a>
              @endif
            </div>

            <!-- Botón de login centrado -->
            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary mx-auto d-block">
                {{ __('Login') }}
              </button>
            </div>
          </form>
          <hr>
          <!-- Botón de registrar -->
          <div class="text-center">
            <a href="{{ route('register') }}" class="btn btn-secondary btn-block">
              {{ __('Registrarse') }}
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Script para alternar la visibilidad del campo de contraseña -->
<<script>
document.addEventListener('DOMContentLoaded', function() {
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePassword.addEventListener('click', function(e) {
        e.preventDefault();
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            togglePassword.classList.remove('bi-eye-slash');
            togglePassword.classList.add('bi-eye');
        } else {
            passwordInput.type = 'password';
            togglePassword.classList.remove('bi-eye');
            togglePassword.classList.add('bi-eye-slash');
        }
    });
});
</>
@endsection
