<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PuestoLaboralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Deshabilitar las restricciones de claves foráneas temporalmente
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // Limpia la tabla antes de insertar
        DB::table('puestos_laborales')->truncate();

        $this->command->info('Cargando distintos puestos laborales por defecto...');

        DB::table('puestos_laborales')->insert([
            ['nombrePuestoLaboral' => 'SuperAdmin'],
            ['nombrePuestoLaboral' => 'RRHH'],
            ['nombrePuestoLaboral' => 'Administrador de Inventario'],
            ['nombrePuestoLaboral' => 'Tesorero'],
            ['nombrePuestoLaboral' => 'Vendedor'],
        ]);

        // Reactivar las restricciones de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
