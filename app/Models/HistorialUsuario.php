<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialUsuario extends Model
{
    protected $table = 'historiales_usuarios';
    protected $primaryKey = 'idHistorialUsuario';
    public $timestamps = true;

    // Relacion con usuarios
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuarios');  // Relación muchos a uno
    }
}
