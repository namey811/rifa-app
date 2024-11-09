<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = ['clientes_id', 'numeros_id', 'total', 'abonado', 'saldo'];
    protected $guarded = ['clientes_id', 'numeros_id','total', 'abonado', 'saldo'];

    public function Clientes()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function Numeros()
    {
        return $this->belongsTo(Numero::class);
    }
}
