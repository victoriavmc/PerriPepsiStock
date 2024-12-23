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
        Schema::create('informes_inventarios', function (Blueprint $table) {
            $table->id('idInformeInventario');
            $table->string('observacion', 200);
            // Timestamps para created_at y updated_at
            $table->timestamps();
            // Agrega la columna deleted_at automáticamente
            $table->softDeletes();
            // Clave foranea
            $table->unsignedBigInteger('idMovimientosStock');
            $table->foreign('idMovimientosStock')->references('idMovimientosStock')->on('movimientos_stocks');

            $table->unsignedBigInteger('idUsuarios');
            $table->foreign('idUsuarios')->references('idUsuarios')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('informes_inventarios', function (Blueprint $table) {
            $table->dropForeign(['idUsuarios']);
            $table->dropForeign(['idMovimientosStock']);
        });

        Schema::dropIfExists('informes_inventarios');
    }
};
