<?php

namespace App\Http\Controllers;

use App\Mail\namey811;
use App\Models\Cliente;
use App\Models\Numero;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VentaController extends Controller
{
     // Mostrar todos los numero
   public function index()
   {
      $numeros = Numero::all();
      $clientes = Cliente::all();
      $clientesventas = Venta::with('clientes','numeros')->get();
         return view('ventas.index', compact('clientesventas'));
   }

     // Mostrar el formulario para crear un nuevo cliente
   public function create()
   {
      $numeros = Numero::where('estado', 'Disponible')->get();
      $clientes = Cliente::all();
      return view('ventas.create', compact('numeros', 'clientes'));
   }

     // Guardar un nuevo cliente en la base de datos
   public function storeonline(Request $request)
   {
         $request->validate([
            'cedula' => 'required',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'email' => 'required|email|unique:clientes,email',
            'estado' => 'required',
            'numeros_id' => 'required',
         
         ]);
         Cliente::create([
            'cedula' => $request->cedula,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'estado' => $request->estado,
         ]);
         Venta::create([
            'numeros_id' => $request->numeros_id,
            'clientes_id' => Cliente::where('email', $request->email)->first()->id,
            'total' => $request->valor,
            'saldo' => $request->valor,
         ]);
         $numero = Numero::findOrFail($request->numeros_id);
         $numero->update([
            'estado' => 'Vendido',
         ]);
   
      #Mail::to($request->email)->send(new namey811());

         return redirect()->route('ventas.index')->with('success', 'Venta creado exitosamente');
   }

   public function store(Request $request)
   {
         $request->validate([
            'clientes_id' => 'required',
            'numeros_id' => 'required',
            'valor' => 'required'
         ]);
         Venta::create([
            'numeros_id' => $request->numeros_id,
            'clientes_id' => $request->clientes_id,
            'total' => $request->valor,
            'saldo' => $request->valor,
         ]);
         $numero = Numero::findOrFail($request->numeros_id);
         $numero->update([
            'estado' => 'Vendido',
         ]);
   
      #Mail::to($request->email)->send(new namey811());

         return redirect()->route('ventas.index')->with('success', 'Venta creado exitosamente');
   }

     // Mostrar un cliente específico
   public function show($id)
   {
         $venta = Numero::with('eventos')->findOrFail($id);
         return view('ventas.show', compact('venta'));
   }

   // Mostrar el formulario para editar un cliente
   public function edit($id)
   {
      $numero = Numero::with('eventos')->findOrFail($id);
      return view('ventas.edit', compact('numero'));
   }

     // Actualizar un cliente en la base de datos
   public function update(Request $request, $id)
   {
         $request->validate([
               'clientes_id' => 'required',
               'numeros_id' => 'required',
         ]);
         //dd($request->estado);

         $venta = Venta::findOrFail($id);
         $venta->update($request->all());

         return redirect()->route('ventas.index')->with('success', 'Venta actualizado exitosamente');
   }

     // Eliminar un cliente
   public function destroy($id)
   {
         $venta = Venta::findOrFail($id);
         $venta->delete();

         return redirect()->route('ventas.index')->with('success', 'Venta eliminado exitosamente');
   }
}
