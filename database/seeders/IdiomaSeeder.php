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
                'nombre' => 'Ingles',
            ],
            [
                'codigo' => 'FRA',
                'nombre' => 'Francés',
            ],
            [
                'codigo' => 'ITA',
                'nombre' => 'Italiano',
            ],
            [
                'codigo' => 'QUE',
                'nombre' => 'Quechua',
            ],
            [
                'codigo' => 'DEU',
                'nombre' => 'Alemán',
            ],
            [
                'codigo' => 'POR',
                'nombre' => 'Portugués',
            ],
        ];

        \App\Models\Idioma::insert($idiomas);
    }
}
