<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Se envia como clave foranea, entonces para que no haya problemas deshabilito las restricciones hasta finalizar el proceso
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        //Limpiamos datos de la tabla antes de iniciar si es necesario
        DB::table('generos')->truncate();

        $this->command->info('Cargando Generos...');
        // Una manera de insertar los valores:
        DB::table('generos')->insert([
            ['nombreGenero' => 'Masculino'],
            ['nombreGenero' => 'Femenino'],
            ['nombreGenero' => 'Otro'],
        ]);

        // Reactivamos la clave foranea
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
