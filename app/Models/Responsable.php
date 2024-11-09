<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $fillable = ['cedula','nombre', 'apellido', 'direccion', 'telefono', 'email','estado'];
    protected $guarded = ['cedula','nombre', 'apellido', 'direccion', 'telefono', 'email','estado'];

    public function Eventos()
    {
        return $this->hasOne(Evento::class);
    }
}
