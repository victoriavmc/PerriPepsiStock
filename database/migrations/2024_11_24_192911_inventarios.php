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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id('idInventario');
            $table->integer('cantMinimo')->default(0);
            $table->integer('cantMaximo')->default(0);
            $table->integer('cantStock')->default(0);
            // Timestamps para created_at y updated_at
            $table->timestamps();

            // clave foranea
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
        //
    }
};
