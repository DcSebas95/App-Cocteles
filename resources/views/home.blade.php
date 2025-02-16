{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="mb-5">Bienvenido</h1>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <a href="{{ route('cocktails.index') }}" class="btn btn-primary btn-lg btn-block">
                        Ver Cócteles
                    </a>
                </div>
                <div class="col-md-6 mb-3">
                    <a href="{{ route('cocktails.my') }}" class="btn btn-secondary btn-lg btn-block">
                        Lista de Cócteles
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
