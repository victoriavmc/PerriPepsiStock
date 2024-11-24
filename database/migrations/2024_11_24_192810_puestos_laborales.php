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
        Schema::create('puestos_laborales', function (Blueprint $table) {
            $table->id('idPuestosLaborales');
            $table->string('nombrePuestoLaboral', 100);
            // Timestamps para created_at y updated_at
            $table->timestamps();
            // Agrega la columna deleted_at automáticamente
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('puestos_laborales');
    }
};
