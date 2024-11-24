<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
    protected $primaryKey = 'idVentas';
    public $timestamps = true;

    // Relación muchos a uno con MovimientoStock
    public function movimientoStock()
    {
        return $this->belongsTo(MovimientoStock::class, 'idMovimientosStock');
    }
}
