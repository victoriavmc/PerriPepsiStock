<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimientoStock extends Model
{
    //
    protected $table = 'movimientos_stocks';
    protected $primaryKey = 'idMovimientosStock';
    public $timestamps = true;

    // Relación muchos a uno con Producto un movimiento de stock tiene un producto)
    public function productos()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }

    // Relación muchos a uno con Modulo (un movimiento de stock pertenece a un modulo)
    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'idModulo');
    }

    // Relacion pasa su primaria a ventas e informes
    // Relación con Venta (un movimiento de stock puede tener una venta asociada)
    public function venta()
    {
        return $this->hasOne(Venta::class, 'idMovimientosStock');  // Relación uno a uno
    }

    // Relación con InformeInventario (un movimiento de stock puede tener un informe de inventario asociado)
    public function informeInventario()
    {
        return $this->hasOne(InformeInventario::class, 'idMovimientosStock');  // Relación uno a uno
    }
}
