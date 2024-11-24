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
        Schema::create('modulos', function (Blueprint $table) {
            $table->id('idModulos');
            $table->string('nombreModulo', 100);
            // Timestamps para created_at y updated_at
            $table->timestamps();
            // Agrega la columna deleted_at automáticamente
            $table->softDeletes();

            // Claves foráneas
            $table->unsignedBigInteger('idPermisos');
            $table->foreign('idPermisos')->references('idPermisos')->on('permisos');

            $table->unsignedBigInteger('idUsuarioPuesto');
            $table->foreign('idUsuarioPuesto')->references('idUsuarioPuesto')->on('usuarios_puestos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('modulos', function (Blueprint $table) {
            $table->dropForeign(['idPermisos']);
            $table->dropForeign(['idUsuarioPuesto']);
            // Eliminar la clave foránea
        });

        // Eliminar la tabla
        Schema::dropIfExists('modulos');
    }
};
