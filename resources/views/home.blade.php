@extends('layouts.app')

@section('content')
<div class="container-fluid hero-container" style="background-image: url('{{ asset('images/cocktail-on-counter-top-5utfhiwzi52kmpn8.jpg') }}');">
  
  <div class="text-center">
    <!-- Título con fondo semitransparente y color dorado -->
    <h1 class="hero-title mb-4 px-4 py-2">
      Bienvenido
    </h1>
    
    <!-- Fila de botones, más separados y más abajo -->
    <div class="row mt-4 hero-buttons">
      <div class="col-md-12 d-flex flex-column align-items-center">
        <a href="{{ route('cocktails.index') }}" class="btn btn-primary btn-lg">
          Ver Cócteles
        </a>
        <a href="{{ route('cocktails.my') }}" class="btn btn-secondary btn-lg">
          Lista de Cócteles
        </a>
      </div>
    </div>
  </div>

</div>
@endsection
