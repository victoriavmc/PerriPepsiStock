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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('idProductos');
            $table->string('nombreProducto', 100);
            $table->string('codigoProducto', 200);
            $table->string('medidaProducto', 60);
            $table->string('imagenProducto', 250);
            // Timestamps para created_at y updated_at
            $table->timestamps();
            // Agrega la columna deleted_at automáticamente
            $table->softDeletes();
            // Clave foranea
            $table->unsignedBigInteger('idTipoProducto');
            $table->foreign('idTipoProducto')->references('idTipoProducto')->on('tipos_productos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign(['idTipoProducto']);  // Eliminar la clave foránea
        });

        // Eliminar la tabla
        Schema::dropIfExists('productos');
    }
};
