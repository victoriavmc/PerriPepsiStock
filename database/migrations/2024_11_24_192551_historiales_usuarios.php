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
        //historialusuario
        Schema::create('historiales_usuarios', function (Blueprint $table) {
            $table->id('idHistorialUsuario');

            // Me importa cuando creo
            $table->timestamps(); // crea y modifica guarda

            // Hago eliminacion logica entonces tambien importa la fecha que "borra"
            $table->softDeletes();

            // Claves foráneas
            $table->unsignedBigInteger('idUsuarios');
            $table->foreign('idUsuarios')->references('idUsuarios')->on('usuarios');
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
