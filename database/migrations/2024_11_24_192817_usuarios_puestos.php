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
        Schema::create('usuarios_puestos', function (Blueprint $table) {
            $table->id('idUsuarioPuesto');
            $table->date('fechaIniciaRol');
            $table->date('fechaFinalizaRol');

            // Timestamps para created_at y updated_at
            $table->timestamps();
            // Agrega la columna deleted_at automáticamente
            $table->softDeletes();

            // Claves foráneas
            $table->unsignedBigInteger('idUsuarios');
            $table->foreign('idUsuarios')->references('idUsuarios')->on('users');

            $table->unsignedBigInteger('idPuestosLaborales');
            $table->foreign('idPuestosLaborales')->references('idPuestosLaborales')->on('puestos_laborales');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar la clave foránea antes de eliminar la tabla
        Schema::table('usuarios_puestos', function (Blueprint $table) {
            $table->dropForeign(['idUsuarios']);
            $table->dropForeign(['idPuestosLaborales']);
            // Eliminar las claves foráneas
        });

        // Eliminar la tabla
        Schema::dropIfExists('usuarios_puestos');
    }
};
