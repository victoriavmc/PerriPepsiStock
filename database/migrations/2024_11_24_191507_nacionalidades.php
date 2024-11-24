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
        Schema::create('nacionalidades', function (Blueprint $table) {
            $table->id('idNacionalidad'); // Clave Primaria
            $table->string('abreviacion', 50); // 
            $table->string('nacion', 100); //
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
