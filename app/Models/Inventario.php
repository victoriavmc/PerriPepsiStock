<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventarios';
    protected $primaryKey = 'idInventario';
    public $timestamps = true;


    // Relación muchos a uno con Producto (un inventario tiene un producto)
    public function productos()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }

    // Relación muchos a uno con Modulo (un inventario pertenece a un modulo)
    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'idModulo');
    }
}
