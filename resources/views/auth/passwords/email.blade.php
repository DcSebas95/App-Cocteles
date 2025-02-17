@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="row justify-content-center w-100">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header text-center">{{ __('Restablecer Contraseña') }}</div>
        <div class="card-body">
          @if (session('status'))
            <!-- Mensaje de éxito y botón para regresar al login -->
            <div class="alert alert-success text-center" role="alert">
              {{ session('status') }}
            </div>
            <div class="text-center mt-3">
              <a href="{{ route('login') }}" class="btn btn-primary">
                {{ __('Regresar al Login') }}
              </a>
            </div>
          @else
            <!-- Formulario para enviar el correo de recuperación -->
            <form method="POST" action="{{ route('password.email') }}">
              @csrf
                <br>
              <div class="row mb-3 justify-content-center">
                <div class="col-md-8">
                  <label for="email" class="text-center d-block">{{ __('Correo') }}</label>
                  <input id="email" type="email" 
                         class="form-control mx-auto @error('email') is-invalid @enderror" 
                         name="email" value="{{ old('email') }}" required autocomplete="email" autofocus 
                         style="max-width: 300px;">
                  @error('email')
                    <span class="invalid-feedback d-block text-center" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
            </div>
            <br>
              <div class="row mb-0 justify-content-center">
                <div class="col-md-8 text-center">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Enviar correo de recuperación') }}
                  </button>
                </div>
              </div>
            </form>
          @endif
        </div><!-- card-body -->
      </div><!-- card -->
    </div>
  </div>
</div>
@endsection
