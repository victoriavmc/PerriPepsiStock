<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'idProductos';
    public $timestamps = true;

    // Relación con TipoProducto (un producto tiene un tipo de producto)
    public function tipoProducto()
    {
        return $this->belongsTo(TipoProducto::class, 'idTipoProducto'); // Relación inversa: 'idTipoProducto' es la clave foránea en la tabla 'productos'
    }

    // Relación con Inventario (un producto pertenece a un inventario)
    public function inventarios()
    {
        return $this->hasMany(Inventario::class, 'idProducto');
    }

    // Relación con MovimientoStock (un producto pertenece a un movimiento de stock)
    public function movimientosStock()
    {
        return $this->hasMany(MovimientoStock::class, 'idProducto');
    }
}
