<?php

namespace App\Http\Controllers;

use App\Models\Numero;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
        // Mostrar todos los numero
        public function index()
        {
            $numeros = Numero::all();
            return view('home', compact('numeros'));
        }

        public function ventaonline($id)
        {
            $numero = Numero::findOrFail($id);
            return view('ventas.create_online', compact('numero'));
        }
}
