<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class IdiomaDictableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ingles
        $uuidA1_ENG = substr(Str::uuid(), 0, 8);
        $uuidA2_ENG = substr(Str::uuid(), 0, 8);
        $uuidB1_ENG = substr(Str::uuid(), 0, 8);
        $uuidB2_ENG = substr(Str::uuid(), 0, 8);
        $uuidC1_ENG = substr(Str::uuid(), 0, 8);
        $uuidC2_ENG = substr(Str::uuid(), 0, 8);
        // Francés
        $uuidA1_FR = substr(Str::uuid(), 0, 8);
        $uuidA2_FR = substr(Str::uuid(), 0, 8);
        $uuidB1_FR = substr(Str::uuid(), 0, 8);
        $uuidB2_FR = substr(Str::uuid(), 0, 8);
        $uuidC1_FR = substr(Str::uuid(), 0, 8);
        $uuidC2_FR = substr(Str::uuid(), 0, 8);

        $idiomas_dicatables = [
            //Idioma Ingles - Básico
            [
                'codigo' => $uuidA1_ENG,
                'requisito' => null,
                'precio_mensual' => 100.00,
                'duracion_meses' => 5,
                'idioma_id' => 1, // Ingles
                'idioma_nivel_id' => 1, // A1, 'nivel' => 'Básico'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidA2_ENG,
                'requisito' => $uuidA1_ENG,
                'precio_mensual' => 100.00,
                'duracion_meses' => 5,
                'idioma_id' => 1, // Ingles
                'idioma_nivel_id' => 2, // A2, 'nivel' => 'Básico'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Ingles - Intermedio
            [
                'codigo' => $uuidB1_ENG,
                'requisito' => $uuidA2_ENG,
                'precio_mensual' => 110.00,
                'duracion_meses' => 5,
                'idioma_id' => 1, // Ingles
                'idioma_nivel_id' => 3, // B1, 'nivel' => 'Intermedio'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidB2_ENG,
                'requisito' => $uuidB1_ENG,
                'precio_mensual' => 110.00,
                'duracion_meses' => 5,
                'idioma_id' => 1, // Ingles
                'idioma_nivel_id' => 4, // B2, 'nivel' => 'Intermedio'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Ingles - Avanzado
            [
                'codigo' => $uuidC1_ENG,
                'requisito' => $uuidB2_ENG,
                'precio_mensual' => 150.00,
                'duracion_meses' => 3,
                'idioma_id' => 1, // Ingles
                'idioma_nivel_id' => 5, // C1, 'nivel' => 'Avanzado'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidC2_ENG,
                'requisito' => $uuidC1_ENG,
                'precio_mensual' => 150.00,
                'duracion_meses' => 3,
                'idioma_id' => 1, // Ingles
                'idioma_nivel_id' => 6, // C2, 'nivel' => 'Avanzado'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Francés - Básico
            [
                'codigo' => $uuidA1_FR,
                'requisito' => null,
                'precio_mensual' => 100.00,
                'duracion_meses' => 5,
                'idioma_id' => 2, // Francés
                'idioma_nivel_id' => 1, // A1, 'nivel' => 'Básico'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidA2_FR,
                'requisito' => $uuidA1_FR,
                'precio_mensual' => 100.00,
                'duracion_meses' => 5,
                'idioma_id' => 2, // Francés
                'idioma_nivel_id' => 2, // A2, 'nivel' => 'Básico'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Francés - Intermedio
            [
                'codigo' => $uuidB1_FR,
                'requisito' => $uuidA2_FR,
                'precio_mensual' => 110.00,
                'duracion_meses' => 5,
                'idioma_id' => 2, // Francés
                'idioma_nivel_id' => 3, // B1, 'nivel' => 'Intermedio'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidB2_FR,
                'requisito' => $uuidB2_FR,
                'precio_mensual' => 110.00,
                'duracion_meses' => 5,
                'idioma_id' => 2, // Francés
                'idioma_nivel_id' => 4, // B2, 'nivel' => 'Intermedio'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Francés - Avanzado
            [
                'codigo' => $uuidC1_FR,
                'requisito' => $uuidC1_FR,
                'precio_mensual' => 150.00,
                'duracion_meses' => 3,
                'idioma_id' => 2, // Francés
                'idioma_nivel_id' => 5, // C1, 'nivel' => 'Avanzado'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidC2_FR,
                'requisito' => $uuidC2_FR,
                'precio_mensual' => 150.00,
                'duracion_meses' => 3,
                'idioma_id' => 2, // Francés
                'idioma_nivel_id' => 6, // C2, 'nivel' => 'Avanzado'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
        ];

        \App\Models\IdiomaDictable::insert($idiomas_dicatables);
    }
}
