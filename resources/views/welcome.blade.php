{{-- resources/views/welcome.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="text-center">
        <h1>Bienvenido al Proyecto</h1>
        <p>Haz clic en el botón para entrar al proyecto</p>
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
    Entra al Proyecto
</a>



    </div>
</div>
@endsection
