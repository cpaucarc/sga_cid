<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aulas = [
            //Aulas del Centro de Idiomas de la UNASAM
            [
                'nombre' => '102',
                'ambiente_id' => 1,
            ],
            [
                'nombre' => '105',
                'ambiente_id' => 1,
            ],
            [
                'nombre' => '201',
                'ambiente_id' => 1,
            ],
            [
                'nombre' => '203',
                'ambiente_id' => 1,
            ],
            [
                'nombre' => '204',
                'ambiente_id' => 1,
            ],
            [
                'nombre' => '205',
                'ambiente_id' => 1,
            ],
            [
                'nombre' => '206',
                'ambiente_id' => 1,
            ],
            [
                'nombre' => '207',
                'ambiente_id' => 1,
            ],
            [
                'nombre' => '302',
                'ambiente_id' => 1,
            ],
            [
                'nombre' => '303',
                'ambiente_id' => 1,
            ],
            [
                'nombre' => '305',
                'ambiente_id' => 1,
            ],
            [
                'nombre' => '306',
                'ambiente_id' => 1,
            ],
            [
                'nombre' => '307',
                'ambiente_id' => 1,
            ],
            //Aulas del Centro Preuniversitario de la UNASAM
            [
                'nombre' => 'Aula-CID',
                'ambiente_id' => 2,
            ],
            //Aulas del Colegio de Ciencias Aplicadas de la UNASAM
            [
                'nombre' => 'Aula-CID',
                'ambiente_id' => 3,
            ],
        ];

        \App\Models\Aula::insert($aulas);
    }
}
