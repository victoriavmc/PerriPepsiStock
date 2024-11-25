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
        Schema::create('users', function (Blueprint $table) {
            $table->id('idUsuarios');
            $table->string('username', 100);
            $table->string('password', 255);
            $table->string('email', 250)->unique()->comment('Correo electrónico del usuario');
            $table->string('pin', 255)->nullable();
            // Claves foráneas
            $table->unsignedBigInteger('idDatosPersonales');
            $table->foreign('idDatosPersonales')->references('idDatosPersonales')->on('datos_personales');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        // Eliminar la clave foránea antes de eliminar la tabla
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['idDatosPersonales']);  // Eliminar la clave foránea
        });

        // Eliminar la tabla usuarios
        Schema::dropIfExists('users');
    }
};
