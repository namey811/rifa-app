<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'cifras', 'valor','fecha_evento','fecha_inicio','fecha_fin', 'responsables_id'];
    protected $guarded = ['nombre', 'descripcion', 'cifras', 'valor','fecha_evento','fecha_inicio','fecha_fin', 'responsables_id'];

    public function Responsables()
    {
        return $this->belongsTo(Responsable::class);
    }
    public function Numeros()
    {
        return $this->hasOne(Numero::class, 'eventos_id');
    }

    public function Ventas()
    {
        return $this->belongsTo(Venta::class);
    }
}
