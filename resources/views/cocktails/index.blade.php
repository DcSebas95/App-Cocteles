{{-- resources/views/cocktails/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Seleccione su coctel</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($cocktails as $cocktail)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if(isset($cocktail['strDrinkThumb']))
                        <img src="{{ $cocktail['strDrinkThumb'] }}" class="card-img-top" alt="{{ $cocktail['strDrink'] }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $cocktail['strDrink'] }}</h5>
                        <p class="card-text">
                            <strong>Categoría:</strong> {{ $cocktail['strCategory'] }}<br>
                            <strong>Tipo:</strong> {{ $cocktail['strAlcoholic'] }}
                        </p>
                        <!-- Botón para guardar el cóctel -->
                        <form action="{{ route('cocktails.save') }}" method="POST">
                            @csrf
                            <!-- Enviar campos ocultos con la información necesaria -->
                            <input type="hidden" name="strDrink" value="{{ $cocktail['strDrink'] }}">
                            <input type="hidden" name="strCategory" value="{{ $cocktail['strCategory'] }}">
                            <input type="hidden" name="strAlcoholic" value="{{ $cocktail['strAlcoholic'] }}">
                            <input type="hidden" name="strInstructions" value="{{ $cocktail['strInstructions'] }}">
                            <input type="hidden" name="strDrinkThumb" value="{{ $cocktail['strDrinkThumb'] }}">
                            <button type="submit" class="btn btn-primary btn-sm">Guardar Cóctel</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div>
    <!-- Botón de Regreso a la Página de Inicio al final -->
    <div class="text-center mt-4">
        <a href="{{ url('/home') }}" class="btn btn-secondary">
            Regresar a la Página de Inicio
        </a>
    </div>
</div>
@endsection
