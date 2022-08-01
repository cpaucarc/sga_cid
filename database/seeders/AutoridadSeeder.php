<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AutoridadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $autoridades = [
            [
                'esta_activo' => 1,
                'autoridad_cargo_id' => 1, // 1:Director del Centro de Idiomas
                'persona_id' => 1,
            ],
            [
                'esta_activo' => 1,
                'autoridad_cargo_id' => 2, // 2:Vicerrector Académico
                'persona_id' => 2,
            ],
        ];

        \App\Models\Autoridad::insert($autoridades);
    }
}
