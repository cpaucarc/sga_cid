<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $personas = [
            [
                'codigo' => substr(Str::uuid(), 0, 13),
                'dni' => '18037851',
                'apellido_paterno' => 'CABRERA',
                'apellido_materno' => 'SALVATIERRA',
                'nombres' => 'JULIO EDUARDO',
                'celular' => '967916543',
                'correo' => 'jcabreras@unasam.edu.pe',
                'fecha_nacimiento' => '1983-02-16',
                'sexo_id' => 1,
                'distrito_id' => 85, // Huaraz
            ],
            [
                'codigo' => substr(Str::uuid(), 0, 13),
                'dni' => '31621028',
                'apellido_paterno' => 'SILVA',
                'apellido_materno' => 'LINDO',
                'nombres' => 'MARCO ANTONIO',
                'celular' => '970031833',
                'correo' => 'msilval@unasam.edu.pe',
                'fecha_nacimiento' => '1985-06-20',
                'sexo_id' => 1,
                'distrito_id' => 85, // Huaraz
            ],
            [
                'codigo' => substr(Str::uuid(), 0, 13),
                'dni' => '31676590',
                'apellido_paterno' => 'ORTIZ',
                'apellido_materno' => 'GOMEZ',
                'nombres' => 'FLOYD MAIK',
                'celular' => '987983456',
                'correo' => 'ogomezf@unasam.edu.pe',
                'fecha_nacimiento' => '1995-06-20',
                'sexo_id' => 2,
                'distrito_id' => 85, // Huaraz
            ],
            [
                'codigo' => substr(Str::uuid(), 0, 13),
                'dni' => '31676536',
                'apellido_paterno' => 'NIVIN',
                'apellido_materno' => 'VARGAS',
                'nombres' => 'LAURA ROSA',
                'celular' => '941860618',
                'correo' => 'lnivin@unasam.edu.pe',
                'fecha_nacimiento' => '1985-06-20',
                'sexo_id' => 2,
                'distrito_id' => 85, // Huaraz
            ],
        ];

        \App\Models\Persona::insert($personas);
    }
}
