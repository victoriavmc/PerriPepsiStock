<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
    protected $table = 'nacionalidades';
    protected $primaryKey = 'idNacionalidad';
    public $timestamps = false;
    // Definir qué atributos pueden ser asignados masivamente
    protected $fillable = ['abreviacion', 'nacion'];
    // Relación uno a muchos con la tabla DatosPersonales
    public function datosPersonales()
    {
        return $this->hasMany(DatoPersonal::class, 'idNacionalidad');
    }
}
