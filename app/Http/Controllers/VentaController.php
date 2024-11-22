<?php

namespace App\Http\Controllers;

use App\Mail\namey811;
use App\Models\Cliente;
use App\Models\Evento;
use App\Models\Numero;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VentaController extends Controller
{
     // Mostrar todos los numero
   public function index()
   {
      $numeros = Numero::with('eventos')->get();
      $clientes = Cliente::all();
      $clientesventas = Venta::with('clientes','numeros', 'eventos')->get();
         return view('ventas.index', compact('clientesventas'));
   }

     // Mostrar el formulario para crear un nuevo cliente
   public function create()
   {
      //$numeros = Numero::where('estado', 'Disponible')->get();
      $numeroseventos = Numero::with('eventos')->get();
      $eventosnumeros = Evento::with('numeros')->get();
      $clientes = Cliente::all();
      return view('ventas.create', compact('numeroseventos', 'eventosnumeros','clientes'));
   }

   public function cargarlistanumerosevento($id)
{
   $valoresLista2 = Numero::where('eventos_id', $id)
   ->where('estado', 'Disponible')
   ->get();
   return response()->json($valoresLista2);
}

public function consultanumeroscliente($id)
{
   $numeroscliente = Venta::with('clientes','numeros', 'eventos')->findOrFail($id);
   return view('ventas.detalle', compact('numeroscliente'));
}

public function validateCedula(Request $request)
{
    $cedula = $request->input('cedula');
    $exists = Cliente::where('cedula', $cedula)->exists();
    $cliente = Cliente::where('cedula', $cedula)->get();

    return response()->json([
      'exists' => $exists,
      'cliente' => $cliente
   ]);
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
         $idcliente = Cliente::where('email', $request->email)->first()->id;

         $registro = Venta::create([
            'eventos_id' => $request->eventos_id,
            'clientes_id' => $idcliente,
            'numeros_id' => $request->numeros_id,
            'total' => $request->valor,
            'saldo' => $request->valor,
         ]);
         $ventaid = $registro->id;

         $numero = Numero::findOrFail($request->numeros_id);
         $numero->update([
            'estado' => 'Vendido',
         ]);
   
      Mail::to($request->email)->send(new namey811($ventaid));

         return redirect()->route('home')->with('success', 'Venta realizada exitosamente, revisa tu correo electronico donde encontraras el detalle de tu compra.');
   }

   public function store(Request $request)
   {
         $request->validate([
            'eventos_id' => 'required',
            'clientes_id' => 'required',
            'numeros_id' => 'required',
            'valor' => 'required'
         ]);
         Venta::create([
            'eventos_id' => $request->eventos_id,
            'clientes_id' => $request->clientes_id,
            'numeros_id' => $request->numeros_id,
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
