<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = ['clientes_id', 'ventas_id','tipo','metodo_pago','monto','fecha_pago'];
    protected $guarded = ['clientes_id', 'ventas_id','tipo','metodo_pago','monto','fecha_pago'];

    public function Clientes()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function Ventas()
    {
        return $this->belongsTo(Venta::class);
    }

}
