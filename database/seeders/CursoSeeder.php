<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ingles
        $uuidA1_ENGI = substr(Str::uuid(), 0, 8);
        $uuidA1_ENGII = substr(Str::uuid(), 0, 8);
        $uuidA1_ENGIII = substr(Str::uuid(), 0, 8);
        $uuidA1_ENGIV = substr(Str::uuid(), 0, 8);
        $uuidA1_ENGV = substr(Str::uuid(), 0, 8);
        $uuidA2_ENGVI = substr(Str::uuid(), 0, 8);
        $uuidA2_ENGVII = substr(Str::uuid(), 0, 8);
        $uuidA2_ENGVIII = substr(Str::uuid(), 0, 8);
        $uuidA2_ENGIX = substr(Str::uuid(), 0, 8);
        $uuidA2_ENGX = substr(Str::uuid(), 0, 8);

        $cursos = [
            //Idioma Ingles - Básico
            [
                'codigo' => $uuidA1_ENGI,
                'requisito' => null,
                'ciclo' => 'I',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 1, // ENG-A1, 'nivel' => 'Básico'
            ],
            [
                'codigo' => $uuidA1_ENGII,
                'requisito' => $uuidA1_ENGI,
                'ciclo' => 'II',
                'aforo_maximo' => 20,
                'idioma_dictable_id' => 1, // ENG-A1, 'nivel' => 'Básico'
            ],
            [
                'codigo' => $uuidA1_ENGIII,
                'requisito' => $uuidA1_ENGII,
                'ciclo' => 'III',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 1, // ENG-A1, 'nivel' => 'Básico'
            ],
            [
                'codigo' => $uuidA1_ENGIV,
                'requisito' => $uuidA1_ENGIII,
                'ciclo' => 'IV',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 1, // ENG-A1, 'nivel' => 'Básico'
            ],
            [
                'codigo' => $uuidA1_ENGV,
                'requisito' => $uuidA1_ENGIV,
                'ciclo' => 'V',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 1, // ENG-A1, 'nivel' => 'Básico'
            ],
            // A2, 'nivel' => 'Básico'
            [
                'codigo' => $uuidA2_ENGVI,
                'requisito' => $uuidA1_ENGV,
                'ciclo' => 'VI',
                'aforo_maximo' => 20,
                'idioma_dictable_id' => 2, // ENG-A2, 'nivel' => 'Básico'
            ],
            [
                'codigo' => $uuidA2_ENGVII,
                'requisito' => $uuidA2_ENGVI,
                'ciclo' => 'VII',
                'aforo_maximo' => 20,
                'idioma_dictable_id' => 2, // ENG-A2, 'nivel' => 'Básico'
            ],
            [
                'codigo' => $uuidA2_ENGVIII,
                'requisito' => $uuidA2_ENGVII,
                'ciclo' => 'VIII',
                'aforo_maximo' => 20,
                'idioma_dictable_id' => 2, // ENG-A2, 'nivel' => 'Básico'
            ],
            [
                'codigo' => $uuidA2_ENGIX,
                'requisito' => $uuidA2_ENGVIII,
                'ciclo' => 'IX',
                'aforo_maximo' => 20,
                'idioma_dictable_id' => 2, // ENG-A2, 'nivel' => 'Básico'
            ],
            [
                'codigo' => $uuidA2_ENGX,
                'requisito' => $uuidA2_ENGIX,
                'ciclo' => 'X',
                'aforo_maximo' => 20,
                'idioma_dictable_id' => 2, // ENG-A2, 'nivel' => 'Básico'
            ],
        ];

        \App\Models\Curso::insert($cursos);
    }
}
