<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    protected $table = 'tipos_productos';
    protected $primaryKey = 'idTipoProducto';
    public $timestamps = true;
    // Definir qué atributos pueden ser asignados masivamente
    protected $fillable = ['tipoProducto'];

    // Relación con productos (un tipo de producto puede tener muchos productos)
    public function productos()
    {
        return $this->hasMany(Producto::class, 'idTipoProducto'); // 'idTipoProducto' es la clave foránea en la tabla 'productos'
    }
}
