{{-- resources/views/cocktails/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Cóctel</h2>
    
    {{-- Mostrar errores de validación, si existen --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario para actualizar el cóctel --}}
    <form action="{{ route('cocktails.update', $cocktail->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        {{-- Campo para el nombre del cóctel --}}
        <div class="form-group">
            <label for="strDrink">Nombre del Cóctel</label>
            <input type="text" name="strDrink" id="strDrink" class="form-control" value="{{ $cocktail->strDrink }}" required>
        </div>

        {{-- Campo para la categoría --}}
        <div class="form-group">
            <label for="strCategory">Categoría</label>
            <input type="text" name="strCategory" id="strCategory" class="form-control" value="{{ $cocktail->strCategory }}" required>
        </div>

        {{-- Campo para el tipo (Alcohólico/No Alcohólico) --}}
        <div class="form-group">
    <label for="strAlcoholic">Tipo (Alcohólico/No Alcohólico)</label>
    <select name="strAlcoholic" id="strAlcoholic" class="form-control" required>
        <option value="Alcohólico" {{ $cocktail->strAlcoholic == 'Alcohólico' ? 'selected' : '' }}>Alcohólico</option>
        <option value="No Alcohólico" {{ $cocktail->strAlcoholic == 'No Alcohólico' ? 'selected' : '' }}>No Alcohólico</option>
    </select>
</div>

        
        {{-- Botón para enviar el formulario y actualizar --}}
        <button type="submit" class="btn btn-primary">Actualizar Cóctel</button>
        <a href="{{ route('cocktails.my') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
