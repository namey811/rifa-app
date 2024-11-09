<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Responsable;
use Illuminate\Http\Request;

class EventoController extends Controller
{
         // Mostrar todos los numero
         public function index()
         {
             #$numeros = Evento::all();
             #$eventos = Evento::all();
             $eventosresponsable = Evento::with('responsables')->get();
             return view('eventos.index', compact('eventosresponsable'));
         }
     
          // Mostrar el formulario para crear un nuevo cliente
         public function create()
         {
             $responsables = Responsable::where('estado', '1')->get();
             return view('eventos.create', compact('responsables'));
         }
     
          // Guardar un nuevo cliente en la base de datos
         public function store(Request $request)
         {
             $request->validate([
                 'nombre' => 'required|string|max:255',
                 'descripcion' => 'required|string|max:255',
                 'cifras' => 'required',
                 'fecha_evento' => 'required',
                 'responsables_id' => 'required'
                 
             ]);
     
             Evento::create($request->all());
     
             return redirect()->route('eventos.index')->with('success', 'Evento creado exitosamente');
         }
     
          // Mostrar un cliente específico
         public function show($id)
         {
             $evento = Evento::with('responsables')->findOrFail($id);
             return view('eventos.show', compact('evento'));
         }
     
          // Mostrar el formulario para editar un cliente
         public function edit($id)
         {
             $eventoresponsable = Evento::with('responsables')->findOrFail($id);
             $responsables = Responsable::where('estado', '1')->get();
             return view('eventos.edit', compact('eventoresponsable', 'responsables'));
         }
     
          // Actualizar un cliente en la base de datos
         public function update(Request $request, $id)
         {
             $request->validate([
                 'nombre' => 'required|string|max:255',
                 'descripcion' => 'required|string|max:255',
                 'cifras' => 'required',
                 'fecha_evento' => 'required',
                 'responsables_id' => 'required'
             ]);
              //dd($request->estado);
     
             $evento = Evento::findOrFail($id);
             $evento->update($request->all());
     
             return redirect()->route('eventos.index')->with('success', 'Evento actualizado exitosamente');
         }
     
          // Eliminar un cliente
         public function destroy($id)
         {
             $evento = Evento::findOrFail($id);
             $evento->delete();
     
             return redirect()->route('eventos.index')->with('success', 'Evento eliminado exitosamente');
         }
}
