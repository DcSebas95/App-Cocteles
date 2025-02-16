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
            @foreach($cocktails as $cocktail)
                <tr>
                    <td>{{ $cocktail->id }}</td>
                    <td>{{ $cocktail->strDrink }}</td>
                    <td>{{ $cocktail->strCategory }}</td>
                    <td>{{ $cocktail->strAlcoholic }}</td>
                    <td>
                        <!-- Botones para editar y eliminar (implementar según necesidad) -->
                        <a href="{{ route('cocktails.edit', $cocktail->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('cocktails.destroy', $cocktail->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
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
