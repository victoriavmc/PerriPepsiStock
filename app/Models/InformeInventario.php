<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformeInventario extends Model
{
    protected $table = 'informes_inventarios';
    protected $primaryKey = 'idInformeInventario';
    public $timestamps = true;

    // Relación muchos a uno con MovimientoStock
    public function movimientoStock()
    {
        return $this->belongsTo(MovimientoStock::class, 'idMovimientosStock');
    }
}
