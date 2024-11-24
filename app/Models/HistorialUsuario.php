<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialUsuario extends Model
{
    protected $table = 'historiales_usuarios';
    protected $primaryKey = 'idHistorialUsuario';
    public $timestamps = true;

    // Relacion con usuarios
    public function user()
    {
        return $this->belongsTo(User::class, 'idUsuarios');  // Relación muchos a uno
    }
}
