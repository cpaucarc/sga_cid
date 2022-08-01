<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmbienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ambientes = [
            [
                'nombre' => 'Centro de Idiomas de la UNASAM',
            ],
            [
                'nombre' => 'Centro Preuniversitario de la UNASAM',
            ],
            [
                'nombre' => 'Colegio de Ciencias Aplicadas de la UNASAM',
            ],
        ];

        \App\Models\Ambiente::insert($ambientes);
    }
}
