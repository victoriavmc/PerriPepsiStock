<?php

namespace Database\Seeders;

use App\Models\Genero;
use App\Models\Permiso;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Agrego un comentario de que comienzo la carga de datos iniciales
        $this->command->info('Iniciando la carga de datos iniciales...');
        //
        // Llama a cada seeder en el orden deseado
        $this->call([
            GeneroSeeder::class,
            NacionalidadSeeder::class,
            PermisoSeeder::class,
            TipoProductoSeeder::class,
            PuestoLaboralSeeder::class,
        ]);
        //
        //
        // Agrego  mensaje de final de carga
        $this->command->info('Datos iniciales cargados exitosamente!');
    }
}
