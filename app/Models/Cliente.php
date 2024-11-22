<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['cedula','nombre', 'apellido', 'direccion', 'telefono', 'email'];
    protected $guarded = ['cedula','nombre', 'apellido', 'direccion', 'telefono', 'email'];

    public function Ventas()
    {
        return $this->hasOne(Venta::class, 'clientes_id');
    }
}
