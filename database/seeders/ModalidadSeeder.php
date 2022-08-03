<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modalidades = [
            [
                'nombre' => 'Jóvenes/Adultos',
                'duracion_meses' => 10,
            ],
            [
                'nombre' => 'Niños',
                'duracion_meses' => 10,
            ],
            [
                'nombre' => 'Acelerado',
                'duracion_meses' => 5,
            ],
        ];

        \App\Models\Modalidad::insert($modalidades);
    }
}
