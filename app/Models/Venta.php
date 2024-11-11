<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = ['eventos_id','clientes_id', 'numeros_id', 'total', 'abonado', 'saldo'];
    protected $guarded = ['eventos_id','clientes_id', 'numeros_id','total', 'abonado', 'saldo'];

    public function Clientes()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function Numeros()
    {
        return $this->belongsTo(Numero::class);
    }

    public function Eventos()
    {
        return $this->belongsTo(Evento::class);
    }
}
