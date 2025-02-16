<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Constructor para aplicar el middleware de autenticación
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Método para la redirección post-login
    public function index()
    {
        return view('home'); // Asegúrate de que devuelve la vista home.blade.php
    }
}
