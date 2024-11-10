<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Numero extends Model
{
    protected $fillable = ['numero', 'estado', 'eventos_id'];
    protected $guarded = ['numero', 'estado', 'eventos_id'];

    public function Eventos()
    {
        return $this->belongsTo(Evento::class);
    }



}
