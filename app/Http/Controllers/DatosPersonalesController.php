<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Nacionalidad;
use Illuminate\Http\Request;
use App\View\Components\GuestLayout;

class DatosPersonalesController extends Controller
{
    //Recuperamos para el registro
    public function traerPaises()
    {
        return Nacionalidad::all();
    }

    //Recuperamos para el registro
    public function traerGeneros()
    {
        return Genero::all();
    }

    public function showRegistrationForm()
    {
        $nacionalidades = $this->traerPaises();
        $generos = $this->traerGeneros();

        return view('auth.register', compact('nacionalidades', 'generos'));
    }
}
