<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('datos_personales', function (Blueprint $table) {
            $table->id('idDatosPersonales'); // Clave Primaria
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('cuit', 50)->unique();
            $table->date('fechaNacimiento');

            // Tengo que pasar las claves foraneas del genero y de la nacional.
            $table->unsignedBigInteger('idGenero');
            $table->foreign('idGenero')->references('idGenero')->on('generos');

            $table->unsignedBigInteger('idNacionalidad');
            $table->foreign('idNacionalidad')->references('idNacionalidad')->on('nacionalidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
