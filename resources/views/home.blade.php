@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex flex-column justify-content-center align-items-center" 
     style="height: 80vh; background-image: url('{{ asset('images/cocktail-on-counter-top-5utfhiwzi52kmpn8.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center; padding: 50px 0;">
  
  <div class="text-center">
    <!-- Título con fondo semitransparente y color dorado -->
    <h1 class="mb-4 px-4 py-2" 
        style="font-size: 3rem; font-weight: bold; font-family: 'Playfair Display', serif;
               background: rgba(0, 0, 0, 0.6); color: #FFD700; display: inline-block; border-radius: 10px;">
      Bienvenido
    </h1>
    
    <!-- Fila de botones, más separados y más abajo -->
    <div class="row mt-4">
      <div class="col-md-12 d-flex flex-column align-items-center">
        <a href="{{ route('cocktails.index') }}" class="btn btn-primary btn-lg mb-3" style="width: 250px;">
          Ver Cócteles
        </a>
        <a href="{{ route('cocktails.my') }}" class="btn btn-secondary btn-lg" style="width: 250px;">
          Lista de Cócteles
        </a>
      </div>
    </div>
  </div>

</div>
@endsection
