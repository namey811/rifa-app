<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Numero;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
        // Mostrar todos los numero
        public function index()
        {
            $numeros = Numero::all();
            $eventos = Evento::all();
            return view('home.home', compact('numeros','eventos'));
        }

        public function ventaonline($id)
        {
            $numero = Numero::findOrFail($id);
            return view('ventas.create_online', compact('numero'));
        }

        public function listarnumeros($id)
        {
            //$numero = Numero::findOrFail($id);
            $numeros = Numero::where('eventos_id', $id)->get();
            $eventos = Evento::all();
            //return view('home.home', compact('numeros','eventos'));
            return view('home.home_numeros', compact('numeros'));
        }
}
