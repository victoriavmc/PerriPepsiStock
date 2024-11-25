<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialUsuario extends Model
{
    protected $table = 'historiales_usuarios';
    protected $primaryKey = 'idHistorialUsuario';
    protected $fillable = ['created_at', 'updated_at', 'deleted_at', 'idUsuarios'];
    public $timestamps = true;

    // Relacion con usuarios
    public function user()
    {
        return $this->belongsTo(User::class, 'idUsuarios');  // Relación muchos a uno
    }
}
