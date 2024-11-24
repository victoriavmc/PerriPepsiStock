<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'idUsuarios';
    public $timestamps = false;
    // Relación uno a uno con la tabla DatoPersonal
    public function datoPersonal()
    {
        return $this->hasOne(DatoPersonal::class, 'idDatosPersonales');
    }
    // Relacion con historialUsuario
    public function historialUsuario()
    {
        return $this->hasMany(HistorialUsuario::class, 'idUsuarios');
    }
    // Relación con la tabla UsuarioPuesto
    public function usuarioPuestos()
    {
        // Un Usuario puede tener múltiples UsuarioPuesto (relación uno a muchos)
        return $this->hasMany(UsuarioPuesto::class, 'idUsuarios');
    }

    // Relación con la tabla informe inventario
    public function informeInventario()
    {
        return $this->hasMany(InformeInventario::class, 'idUsuarios');
    }
}
