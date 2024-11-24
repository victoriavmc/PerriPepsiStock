<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PuestoLaboral extends Model
{
    protected $table = 'puestos_laborales';
    protected $primaryKey = 'idPuestosLaborales';
    public $timestamps = true;
    // Definir qué atributos pueden ser asignados masivamente
    protected $fillable = ['nombrePuestoLaboral'];

    // Relación con la tabla UsuarioPuesto
    public function usuarioPuestos()
    {
        return $this->hasMany(UsuarioPuesto::class, 'idPuestosLaborales');
    }
}
