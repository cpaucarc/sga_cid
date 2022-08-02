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
        // Ingles - Básico
        $uuid_ingles_jovenes_basico_I=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_basico_II=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_basico_III=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_basico_IV=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_basico_V=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_basico_VI=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_basico_VII=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_basico_VIII=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_basico_IX=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_basico_X=substr(Str::uuid(), 0, 8);
        // Ingles - Intermedio
        $uuid_ingles_jovenes_intermedio_I=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_intermedio_II=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_intermedio_III=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_intermedio_IV=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_intermedio_V=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_intermedio_VI=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_intermedio_VII=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_intermedio_VIII=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_intermedio_IX=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_intermedio_X=substr(Str::uuid(), 0, 8);
        // Ingles - Avanzado
        $uuid_ingles_jovenes_avanzado_I=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_avanzado_II=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_avanzado_III=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_avanzado_IV=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_avanzado_V=substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_avanzado_VI=substr(Str::uuid(), 0, 8);

        $cursos = [
            [
                'codigo' => $uuid_ingles_jovenes_basico_I,
                'requisito' => null,
                'ciclo' => 'I',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 1, // Ingles - Jóvenes - Básico
            ],
            [
                'codigo' => $uuid_ingles_jovenes_basico_II,
                'requisito' => $uuid_ingles_jovenes_basico_I,
                'ciclo' => 'II',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 1,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_basico_III,
                'requisito' => $uuid_ingles_jovenes_basico_II,
                'ciclo' => 'III',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 1,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_basico_IV,
                'requisito' => $uuid_ingles_jovenes_basico_III,
                'ciclo' => 'IV',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 1,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_basico_V,
                'requisito' => $uuid_ingles_jovenes_basico_IV,
                'ciclo' => 'V',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 1,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_basico_VI,
                'requisito' => $uuid_ingles_jovenes_basico_V,
                'ciclo' => 'VI',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 1,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_basico_VII,
                'requisito' => $uuid_ingles_jovenes_basico_VI,
                'ciclo' => 'VII',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 1,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_basico_VIII,
                'requisito' => $uuid_ingles_jovenes_basico_VII,
                'ciclo' => 'VIII',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 1,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_basico_IX,
                'requisito' => $uuid_ingles_jovenes_basico_VIII,
                'ciclo' => 'IX',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 1,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_basico_X,
                'requisito' => $uuid_ingles_jovenes_basico_IX,
                'ciclo' => 'X',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 1,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_intermedio_I,
                'requisito' => $uuid_ingles_jovenes_basico_X,
                'ciclo' => 'I',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 2, // Ingles - Jóvenes - Intermedio
            ],
            [
                'codigo' => $uuid_ingles_jovenes_intermedio_II,
                'requisito' => $uuid_ingles_jovenes_intermedio_I,
                'ciclo' => 'II',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 2,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_intermedio_III,
                'requisito' => $uuid_ingles_jovenes_intermedio_II,
                'ciclo' => 'III',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 2,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_intermedio_IV,
                'requisito' => $uuid_ingles_jovenes_intermedio_III,
                'ciclo' => 'IV',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 2,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_intermedio_V,
                'requisito' => $uuid_ingles_jovenes_intermedio_IV,
                'ciclo' => 'V',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 2,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_intermedio_VI,
                'requisito' => $uuid_ingles_jovenes_intermedio_V,
                'ciclo' => 'VI',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 2,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_intermedio_VII,
                'requisito' => $uuid_ingles_jovenes_intermedio_VI,
                'ciclo' => 'VII',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 2,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_intermedio_VIII,
                'requisito' => $uuid_ingles_jovenes_intermedio_VII,
                'ciclo' => 'VIII',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 2,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_intermedio_IX,
                'requisito' => $uuid_ingles_jovenes_intermedio_VIII,
                'ciclo' => 'IX',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 2,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_intermedio_X,
                'requisito' => $uuid_ingles_jovenes_intermedio_IX,
                'ciclo' => 'X',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 2,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_avanzado_I,
                'requisito' => $uuid_ingles_jovenes_intermedio_X,
                'ciclo' => 'I',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 3, // Ingles - Jóvenes - Avanzado
            ],
            [
                'codigo' => $uuid_ingles_jovenes_avanzado_II,
                'requisito' => $uuid_ingles_jovenes_avanzado_I,
                'ciclo' => 'II',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 3,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_avanzado_III,
                'requisito' => $uuid_ingles_jovenes_avanzado_II,
                'ciclo' => 'III',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 3,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_avanzado_IV,
                'requisito' => $uuid_ingles_jovenes_avanzado_III,
                'ciclo' => 'IV',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 3,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_avanzado_V,
                'requisito' => $uuid_ingles_jovenes_avanzado_IV,
                'ciclo' => 'V',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 3,
            ],
            [
                'codigo' => $uuid_ingles_jovenes_avanzado_VI,
                'requisito' => $uuid_ingles_jovenes_avanzado_V,
                'ciclo' => 'VI',
                'aforo_maximo' => 25,
                'idioma_dictable_id' => 3,
            ],
        ];

        \App\Models\Curso::insert($cursos);
    }
}
