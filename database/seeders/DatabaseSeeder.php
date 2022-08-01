<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Modalidad;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* TODO: Colocar en su respectivo nivel, y por orden alfabetico  */
        // Nivel 0
        $this->call(AmbienteSeeder::class);
        $this->call(IdiomaSeeder::class);
        $this->call(ModalidadSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(RequisitoSeeder::class);

        // Nivel 1
        $this->call(AulaSeeder::class);
        $this->call(CursoSeeder::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(IdiomaDictableSeeder::class);
        $this->call(IdiomaDictableRequisitoSeeder::class);

        // Nivel 2

        $this->call(ProvinciaSeeder::class);

        // Nivel 3

        $this->call(DistritoSeeder::class);

        // Nivel 4
        // Nivel 5
        // Nivel 6
        // Nivel 7
        // Nivel 8
        // Nivel 9

    }
}
