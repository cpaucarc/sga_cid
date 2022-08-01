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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Nivel 0
        $this->call(AmbienteSeeder::class);
        $this->call(IdiomaSeeder::class);
        $this->call(ModalidadSeeder::class);
        $this->call(RequisitoSeeder::class);

        // Nivel 1
        $this->call(AulaSeeder::class);
        $this->call(IdiomaDictableSeeder::class);
        $this->call(CursoSeeder::class);
        $this->call(IdiomaDictableRequisitoSeeder::class);

    }
}
