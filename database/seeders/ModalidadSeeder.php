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
                'nombre' => 'Jóvenes/Adultos'
            ],
            [
                'nombre' => 'Niños'
            ],
            [
                'nombre' => 'Acelerado'
            ],
        ];

        \App\Models\Modalidad::insert($modalidades);
    }
}
