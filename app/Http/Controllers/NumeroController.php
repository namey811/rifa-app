<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Numero;
use Illuminate\Http\Request;

class NumeroController extends Controller
{
     // Mostrar todos los numero
    public function index()
    {
        $numeros = Numero::all();
        $eventos = Evento::all();
        $numeroseventos = Numero::with('eventos')->get();
        return view('numeros.index', compact('numeros', 'eventos','numeroseventos'));
    }

     // Mostrar el formulario para crear un nuevo cliente
    public function create()
    {
        $eventos = Evento::all();
        return view('numeros.create', compact('eventos'));
    }

     // Guardar un nuevo cliente en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|string|max:15',
            'estado' => 'required|string|max:50',
            'eventos_id' => 'required',
        ]);

        Numero::create($request->all());

        return redirect()->route('numeros.index')->with('success', 'Numero creado exitosamente');
    }

     // Mostrar un cliente específico
    public function show($id)
    {
        $numero = Numero::with('eventos')->findOrFail($id);
        return view('numeros.show', compact('numero'));
    }

     // Mostrar el formulario para editar un cliente
    public function edit($id)
    {
        $numero = Numero::with('eventos')->findOrFail($id);
        $eventos = Evento::all();
        return view('numeros.edit', compact('numero', 'eventos'));
    }

     // Actualizar un cliente en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'numero' => 'required|string|max:15',
            'estado' => 'required|string|max:50',
            'eventos_id' => 'required'
        ]);
         //dd($request->estado);

        $numero = Numero::findOrFail($id);
        $numero->update($request->all());

        return redirect()->route('numeros.index')->with('success', 'Numero actualizado exitosamente');
    }

     // Eliminar un cliente
    public function destroy($id)
    {
        $numero = Numero::findOrFail($id);
        $numero->delete();

        return redirect()->route('numeros.index')->with('success', 'Numero eliminado exitosamente');
    }
}
