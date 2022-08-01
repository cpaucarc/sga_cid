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
                'codigo' => substr(Str::uuid(), 0, 8),
                'nombre' => 'Ingles',
            ],
            [
                'codigo' => substr(Str::uuid(), 0, 8),
                'nombre' => 'Francés',
            ],
            [
                'codigo' => substr(Str::uuid(), 0, 8),
                'nombre' => 'Italiano',
            ],
            [
                'codigo' => substr(Str::uuid(), 0, 8),
                'nombre' => 'Quechua',
            ],
            [
                'codigo' => substr(Str::uuid(), 0, 8),
                'nombre' => 'Alemán',
            ],
            [
                'codigo' => substr(Str::uuid(), 0, 8),
                'nombre' => 'Portugués',
            ],
        ];

        \App\Models\Idioma::insert($idiomas);
    }
}
