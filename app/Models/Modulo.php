<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table = 'modulos';
    protected $primaryKey = 'idModulo';
    public $timestamps = true;

    // Relación con Permisos (un modulo tiene muchos permisos)
    public function permisos()
    {
        return $this->hasMany(Permiso::class, 'idModulo');
    }

    // Relación con UsuarioPuesto (un modulo tiene muchos UsuarioPuestos)
    public function usuarioPuestos()
    {
        return $this->hasMany(UsuarioPuesto::class, 'idModulo');
    }

    // El idModulo se le pasa a la tabla inventario y Movimeitno stock
    // Relación uno a muchos con Inventario (un modulo tiene muchos inventarios)
    public function inventarios()
    {
        return $this->hasMany(Inventario::class, 'idModulo');
    }

    // Relación uno a muchos con MovimientoStock (un modulo tiene muchos movimientos de stock)
    public function movimientosStock()
    {
        return $this->hasMany(MovimientoStock::class, 'idModulo');
    }
}
