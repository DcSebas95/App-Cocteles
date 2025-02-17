<?php

use App\Http\Controllers\CocktailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas protegidas (requiere estar logueado)
Route::middleware(['auth'])->group(function () {
    Route::get('/cocktails', [CocktailController::class, 'index'])->name('cocktails.index');
    Route::post('/cocktails/save', [CocktailController::class, 'save'])->name('cocktails.save');
    Route::get('/my-cocktails', [CocktailController::class, 'myCocktails'])->name('cocktails.my');
    Route::get('/cocktails/{id}/edit', [CocktailController::class, 'edit'])->name('cocktails.edit');
    Route::put('/cocktails/{id}', [CocktailController::class, 'update'])->name('cocktails.update');
    Route::delete('/cocktails/{id}', [CocktailController::class, 'destroy'])->name('cocktails.destroy');
});

// Autenticación
Auth::routes();

// Ruta principal para la página de inicio
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

