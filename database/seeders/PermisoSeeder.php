<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Deshabilitar las restricciones de claves foráneas temporalmente
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Limpia la tabla antes de insertar
        DB::table('permisos')->truncate();

        $this->command->info('Cargando Permisos...');

        // Inserta los permisos en la tabla
        DB::table('permisos')->insert([
            ['nombrePermiso' => 'Carga', 'descripcionPermiso' => 'Permite la carga de nuevos datos en el sistema.'],
            ['nombrePermiso' => 'Modificar', 'descripcionPermiso' => 'Permite la edición de datos existentes en el sistema.'],
            ['nombrePermiso' => 'Eliminar', 'descripcionPermiso' => 'Permite eliminar datos previamente cargados en el sistema.'],
            ['nombrePermiso' => 'Visualizar', 'descripcionPermiso' => 'Permite acceder y visualizar datos en un módulo específico.'],
        ]);
        // Reactivar las restricciones de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
