<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatoPersonal extends Model
{
    //
    protected $table = 'datos_personales';
    protected $primaryKey = 'idDatosPersonales';
    public $timestamps = false;

    // Recibe las claves primarias de las tablas nacionalidades y generos
    public function nacionalidad()
    {
        return $this->belongsTo(Nacionalidad::class, 'idNacionalidad');
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'idGenero');
    }

    // Pasamos el primary key de datos personales a usuarios
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idDatosPersonales');
    }
}
