<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'idUsuarios';
    public $timestamps = false;
    protected $fillable = ['username', 'password', 'email', 'idDatosPersonales'];


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
