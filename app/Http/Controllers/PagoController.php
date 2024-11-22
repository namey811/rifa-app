<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pago;
use App\Models\Venta;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pagosventas = Pago::with('ventas', 'clientes')->get();
        return view('pagos.index', compact('pagosventas'));
    }

     // Mostrar el formulario para crear un nuevo cliente
    public function create()
    {
        //$ventas = Venta::all();
        //$clientes = Cliente::all();
        $clientes = Venta::with('clientes')
        ->where('estado', 'No pagado')
        ->get();
       # dd($clientes);
        return view('pagos.create', compact('clientes'));
    }

     // Guardar un nuevo cliente en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'clientes_id' => 'required|numeric',
            'ventas_id' => 'required|numeric',
            'tipo' => 'required',
            'metodo_pago' => 'required',
            'monto' => 'required|numeric',
            'fecha_pago' => 'required|date'
        ]);

        Pago::create($request->all());
        $venta = Venta::findOrFail($request->ventas_id);
        $venta->update([
            'abonado' => $request->monto,
            'saldo' => $venta->saldo - $request->monto,
            'estado' => 'Pagado',
         ]);

        return redirect()->route('pagos.index')->with('success', 'Pago creado exitosamente');
    }

    public function cargarventasporcliente($id)
    {
       $resultado = Venta::with('numeros')
       ->where('clientes_id', $id)
       ->where('estado', 'No Pagado')
       ->get();
       return response()->json($resultado);
    }

     // Mostrar un cliente específico
    public function show($id)
    {
        $pago = Pago::with('ventas')->findOrFail($id);
        return view('pagos.show', compact('pago'));
    }

     // Mostrar el formulario para editar un cliente
    public function edit($id)
    {
        $pagoventas = Pago::with('ventas', 'clientes')->findOrFail($id);
        return view('pagos.edit', compact('pagoventas'));
    }

     // Actualizar un cliente en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'clientes_id' => 'required|number|max:50',
            'ventas_id' => 'required|number|max:50',
            'tipo' => 'required',
            'metodo_pago' => 'required',
            'monto' => 'required',
            'fecha_pago' => 'required|date'
        ]);
         //dd($request->estado);

        $pago = Pago::findOrFail($id);
        $pago->update($request->all());

        return redirect()->route('pagos.index')->with('success', 'Pago actualizado exitosamente');
    }

     // Eliminar un cliente
    public function destroy($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->delete();

        return redirect()->route('numeros.index')->with('success', 'Pago eliminado exitosamente');
    }
}
