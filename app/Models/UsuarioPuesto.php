<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioPuesto extends Model
{
    protected $table = 'usuarios_puestos';
    protected $primaryKey = 'idUsuarioPuesto';
    public $timestamps = true;

    // Relaciono con un Usuario (muchos a uno)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuarios');  // Relación muchos a uno
    }

    // Relaciono con un PuestoLaboral (muchos a uno)
    public function puestoLaboral()
    {
        return $this->belongsTo(PuestoLaboral::class, 'idPuestosLaborales');  // Relación muchos a uno
    }

    // Relaciono con modulos 
    public function modulos()
    {
        return $this->belongsToMany(Modulo::class, 'idModulo');
    }
}
