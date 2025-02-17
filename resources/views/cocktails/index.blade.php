@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Seleccione su cóctel </h2>
    

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($cocktails as $cocktail)
            <div class="col-md-4 mb-5">
                <div class="card cocktail-card">
                    @if(isset($cocktail['strDrinkThumb']))
                        <img src="{{ $cocktail['strDrinkThumb'] }}" class="card-img-top" alt="{{ $cocktail['strDrink'] }}">
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $cocktail['strDrink'] }}</h5>
                        <p class="card-text">
                            <strong>Categoría:</strong> {{ $cocktail['strCategory'] }}<br>
                            <strong>Tipo:</strong> {{ $cocktail['strAlcoholic'] }}
                        </p>
                        <form action="{{ route('cocktails.save') }}" method="POST">
                            @csrf
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

    <!-- Botón de Regreso a la Página de Inicio al final -->
    <div class="text-center mt-4">
        <a href="{{ url('/home') }}" class="btn btn-secondary">
            Regresar a la Página de Inicio
        </a>
    </div>
</div>
@endsection



