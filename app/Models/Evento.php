<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'cifras', 'fecha_evento', 'responsables_id'];
    protected $guarded = ['nombre', 'descripcion', 'cifras', 'fecha_evento', 'responsables_id'];

    public function Responsables()
    {
        return $this->belongsTo(Responsable::class);
    }
    public function Numeros()
    {
        return $this->hasOne(Numero::class);
    }
}
