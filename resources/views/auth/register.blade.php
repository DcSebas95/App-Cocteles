@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="row justify-content-center w-100">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header text-center">
          <h1 style="font-size: 2.5rem; margin: 0;">{{ __('Registrarse') }}</h1>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Campo de Name centrado -->
            <div class="row mb-3 justify-content-center">
              <div class="col-md-8">
                <label for="name" class="d-block text-center mb-2">{{ __('nombre') }}</label>
                <input id="name" type="text" 
                       class="form-control @error('name') is-invalid @enderror" 
                       name="name" value="{{ old('name') }}" 
                       required autocomplete="name" autofocus 
                       style="max-width: 400px; margin: 0 auto;">
                @error('name')
                  <span class="invalid-feedback d-block text-center" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <!-- Campo de Email centrado -->
            <div class="row mb-3 justify-content-center">
              <div class="col-md-8">
                <label for="email" class="d-block text-center mb-2">{{ __('Correo') }}</label>
                <input id="email" type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" 
                       required autocomplete="email" 
                       style="max-width: 400px; margin: 0 auto;">
                @error('email')
                  <span class="invalid-feedback d-block text-center" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <!-- Campo de Password centrado -->
            <div class="row mb-3 justify-content-center">
              <div class="col-md-8">
                <label for="password" class="d-block text-center mb-2">{{ __('contraseña') }}</label>
                <input id="password" type="password" 
                       class="form-control @error('password') is-invalid @enderror" 
                       name="password" required autocomplete="new-password" 
                       style="max-width: 400px; margin: 0 auto;">
                @error('password')
                  <span class="invalid-feedback d-block text-center" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <!-- Campo de Confirm Password centrado -->
            <div class="row mb-3 justify-content-center">
              <div class="col-md-8">
                <label for="password-confirm" class="d-block text-center mb-2">{{ __('Confirme Contraseña') }}</label>
                <input id="password-confirm" type="password" class="form-control" 
                       name="password_confirmation" required autocomplete="new-password" 
                       style="max-width: 400px; margin: 0 auto;">
              </div>
            </div>

            <!-- Botón de Register centrado -->
            <div class="row mb-0 justify-content-center">
              <div class="col-md-8 text-center">
                <button type="submit" class="btn btn-primary">
                  {{ __('Registrar') }}
                </button>
              </div>
            </div>
          </form>
        </div><!-- card-body -->
      </div><!-- card -->
    </div>
  </div>
</div>
@endsection
