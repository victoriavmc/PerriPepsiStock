<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    //
    protected $table = 'generos';
    protected $primaryKey = 'idGenero';

    // Por defecto es true, pero no nos importa la fecha que se crea o modifica
    public $timestamps = false;

    // Define que este atributo puede ser asignado masivamente
    protected $fillable = ['nombreGenero'];

    // El genero se relaciona con la tabla datos personales entonces, paso el idGenero como foranea a datos personales
    public function datosPersonales()
    {
        return $this->hasMany(DatoPersonal::class, 'idGenero');
    }
}
