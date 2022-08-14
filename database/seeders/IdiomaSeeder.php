<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class IdiomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idiomas = [
            [
                'codigo' => 'ENG', //ISO 639-2
                'codigo_pais' => 'USA',
                'nombre' => 'Inglés',
            ],
            [
                'codigo' => 'FRA',
                'codigo_pais' => 'FRA',
                'nombre' => 'Francés',
            ],
            [
                'codigo' => 'ITA',
                'codigo_pais' => 'ITA',
                'nombre' => 'Italiano',
            ],
            [
                'codigo' => 'QUE',
                'codigo_pais' => 'PER',
                'nombre' => 'Quechua',
            ],
            [
                'codigo' => 'DEU',
                'codigo_pais' => 'DUE',
                'nombre' => 'Alemán',
            ],
            [
                'codigo' => 'POR',
                'codigo_pais' => 'BRA',
                'nombre' => 'Portugués',
            ],
        ];

        \App\Models\Idioma::insert($idiomas);
    }
}
