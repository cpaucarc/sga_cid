<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CodigoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $codigos = [
            [
                'ultimo_codigo' => '00.1.0000',
                'tipo_id' => 1, // 1: Estudiante
                'idioma_id' => 1, // 1: ENG
            ],
            [
                'ultimo_codigo' => '00.1.0000',
                'tipo_id' => 1, // 1: Estudiante
                'idioma_id' => 2, // 2: FRA
            ],
            [
                'ultimo_codigo' => '00.1.0000',
                'tipo_id' => 1, // 1: Estudiante
                'idioma_id' => 3, // 3: ITA
            ],
            [
                'ultimo_codigo' => '00.1.0000',
                'tipo_id' => 1, // 1: Estudiante
                'idioma_id' => 4, // 4: QUE
            ],
            [
                'ultimo_codigo' => '00.1.0000',
                'tipo_id' => 1, // 1: Estudiante
                'idioma_id' => 5, // 5: DEU
            ],
            [
                'ultimo_codigo' => '00.1.0000',
                'tipo_id' => 1, // 1: Estudiante
                'idioma_id' => 6, // 6: POR
            ],
            [
                'ultimo_codigo' => '00.2.000',
                'tipo_id' => 2, // 2: Docente
                'idioma_id' => null, // Null: No te necesita idioma
            ],
            [
                'ultimo_codigo' => '00.3.000',
                'tipo_id' => 3, // 2: Autoridad
                'idioma_id' => null, // Null: No te necesita idioma
            ],
        ];

        \App\Models\Codigo::insert($codigos);
    }
}
