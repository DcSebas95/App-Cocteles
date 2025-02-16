<?php

use App\Http\Controllers\CocktailController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas protegidas (se requiere estar logueado)
Route::middleware(['auth'])->group(function () {
    Route::get('/cocktails', [CocktailController::class, 'index'])->name('cocktails.index');
    Route::post('/cocktails/save', [CocktailController::class, 'save'])->name('cocktails.save');
    Route::get('/my-cocktails', [CocktailController::class, 'myCocktails'])->name('cocktails.my');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::middleware(['auth'])->group(function () {
    Route::get('/cocktails/{id}/edit', [App\Http\Controllers\CocktailController::class, 'edit'])->name('cocktails.edit');
    Route::put('/cocktails/{id}', [App\Http\Controllers\CocktailController::class, 'update'])->name('cocktails.update');
    Route::delete('/cocktails/{id}', [App\Http\Controllers\CocktailController::class, 'destroy'])->name('cocktails.destroy');
    });
    


    
    // Rutas para editar y eliminar (se pueden agregar aquí)
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('cocktails', CocktailController::class)->middleware('auth');