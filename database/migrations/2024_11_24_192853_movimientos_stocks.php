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
        Schema::create('movimientos_stocks', function (Blueprint $table) {
            $table->id('idMovimientosStock');
            $table->longText('numeroFactura');
            $table->date('fecha');
            $table->integer('cantidad');
            $table->decimal('precioXunidad', 10, 2);
            $table->string('movimiento', 50);
            // Timestamps para created_at y updated_at
            $table->timestamps();
            // Agrega la columna deleted_at automáticamente
            $table->softDeletes();

            // Clave foranea
            $table->unsignedBigInteger('idProductos');
            $table->foreign('idProductos')->references('idProductos')->on('productos');

            $table->unsignedBigInteger('idModulos');
            $table->foreign('idModulos')->references('idModulos')->on('modulos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar la clave foránea antes de eliminar la tabla
        Schema::table('movimientos_stocks', function (Blueprint $table) {
            $table->dropForeign(['idModulos']);
            $table->dropForeign(['idProductos']); // Eliminar la clave foránea
        });

        // Eliminar la tabla
        Schema::dropIfExists('movimientos_stocks');
    }
};
