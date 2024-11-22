<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Numero;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    
        // Mostrar todos los numero
        public function index()
        {
            $fecha_actual = Carbon::today()->toDateString();
            $eventos = Evento::whereDate('fecha_fin', '>=', $fecha_actual)->get();
            
            return view('home.home', compact('eventos'));
        }

        public function ventaonline($id)
        {
            $numero = Numero::findOrFail($id);
            return view('ventas.create_online', compact('numero'));
        }

        public function listarnumeros($id)
        {
            //$numero = Numero::findOrFail($id);
            $numeros = Numero::where('eventos_id', $id)
            ->where('estado', 'Disponible')
            ->get();
            
            return view('home.home_numeros', compact('numeros'));
        }
}
