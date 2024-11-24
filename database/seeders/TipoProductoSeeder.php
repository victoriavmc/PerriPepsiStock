<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Deshabilitar las restricciones de claves foráneas temporalmente
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // Limpia la tabla antes de insertar
        DB::table('tipos_productos')->truncate();

        $this->command->info('Cargando Tipos de productos por defecto...');

        DB::table('tipos_productos')->insert([
            ['tipoProducto' => 'Alcohólico'],
            ['tipoProducto' => 'No Alcohólico'],
        ]);

        // Reactivar las restricciones de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
