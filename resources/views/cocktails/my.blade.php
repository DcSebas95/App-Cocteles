{{-- resources/views/cocktails/my.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mis Cócteles Guardados</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered" id="cocktailsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
    @foreach($cocktails as $index => $cocktail)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $cocktail->strDrink }}</td>
            <td>{{ $cocktail->strCategory }}</td>
            <td>{{ $cocktail->strAlcoholic }}</td>
            <td class="d-flex justify-content-start align-items-center">
                <!-- Botón de Editar con ícono de lápiz -->
                <a href="{{ route('cocktails.edit', $cocktail->id) }}" class="btn btn-warning btn-sm me-2">
                    <i class="fas fa-pencil-alt"></i> Editar
                </a>
                
                <!-- Botón de Eliminar con ícono de caneca -->
                <form action="{{ route('cocktails.destroy', $cocktail->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>


    </table>
</div>
<div class="text-center mt-4">
        <a href="{{ url('/home') }}" class="btn btn-secondary">
            Regresar a la Página de Inicio
        </a>
    </div>
@endsection

@section('scripts')
<!-- Si deseas incluir Datatables -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#cocktailsTable').DataTable();
    });
</script>
@endsection
