<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    // Mostrar todos los clientes
    public function index()
    {
        $responsables = Responsable::all();
        return view('responsables.index', compact('responsables'));
    }

    // Mostrar el formulario para crear un nuevo cliente
    public function create()
    {
        return view('responsables.create');
    }

    // Guardar un nuevo cliente en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'cedula' => 'required|numeric',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'email' => 'required|email|unique:responsables,email',
            'estado' => 'required'
            
        ]);

        Responsable::create($request->all());

        return redirect()->route('responsables.index')->with('success', 'Responsable creado exitosamente');
    }

    // Mostrar un cliente específico
    public function show($id)
    {
        $responsable = Responsable::findOrFail($id);
        return view('responsables.show', compact('responsable'));
    }

    // Mostrar el formulario para editar un cliente
    public function edit($id)
    {
        $responsable = Responsable::findOrFail($id);
        return view('responsables.edit', compact('responsable'));
    }

    // Actualizar un cliente en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'cedula' => 'required|numeric',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'email' => 'required|email',
            'estado' => 'required'
        ]);
        //dd($request->estado);

        $responsable = Responsable::findOrFail($id);
        $responsable->update($request->all());

        return redirect()->route('responsables.index')->with('success', 'Responsable actualizado exitosamente');
    }

    // Eliminar un cliente
    public function destroy($id)
    {
        $responsable = Responsable::findOrFail($id);
        $responsable->delete();

        return redirect()->route('responsables.index')->with('success', 'Responsable eliminado exitosamente');
    }
}
