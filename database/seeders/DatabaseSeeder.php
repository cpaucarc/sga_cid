<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Modalidad;
use App\Models\Persona;
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
        $this->call(SolicitudTipoSeeder::class);

        // Nivel 1
        $this->call(AulaSeeder::class);
        $this->call(IdiomaDictableSeeder::class);
        $this->call(DepartamentoSeeder::class);


        // Nivel 2
        $this->call(CursoSeeder::class);
        $this->call(IdiomaDictableRequisitoSeeder::class);
        $this->call(ProvinciaSeeder::class);

        // Nivel 3

        $this->call(DistritoSeeder::class);

        // Nivel 4
        $this->call(PersonaSeeder::class); // 4 personas (autoridades)
        Persona::factory(565)->create(); // 65 docentes [5 - 70], 500 estudiantes [71 - 571]

        // Nivel 5
        $this->call(AutoridadSeeder::class);
        Docente::factory(65)->create(); // 65 docentes [5 - 69], 500 estudiantes [70 - 596]
        Estudiante::factory(500)->create(); // 65 docentes [5 - 69], 500 estudiantes [70 - 596]
        $this->call(UserSeeder::class);

        // Nivel 6
        $this->call(InstitucionSeeder::class);

        // Nivel 7
        // Nivel 8
        // Nivel 9

    }
}
