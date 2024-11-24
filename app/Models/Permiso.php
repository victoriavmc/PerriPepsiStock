<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permisos';
    protected $primaryKey = 'idPermisos';
    public $timestamps = false;

    // Definir qué atributos pueden ser asignados masivamente
    protected $fillable = ['nombrePermiso',  'descripcionPermiso'];

    // Relación con Modulos (un permiso pertenece a un modulo)
    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'idModulo');
    }
}
