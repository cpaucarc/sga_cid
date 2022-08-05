<?php

namespace Database\Seeders;

use App\Constants\Constants;
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
        $codigo_cid = Constants::$utimo_codigo_cid;
        $codigo_persona_1 = explode('.', $codigo_cid)[0] . '.1.' . str_pad((intval(explode('.', $codigo_cid)[2]) + 1), 4, '0', STR_PAD_LEFT);
        $codigo_persona_2 = explode('.', $codigo_cid)[0] . '.1.' . str_pad((intval(explode('.', $codigo_cid)[2]) + 2), 4, '0', STR_PAD_LEFT);
        $codigo_persona_3 = explode('.', $codigo_cid)[0] . '.1.' . str_pad((intval(explode('.', $codigo_cid)[2]) + 3), 4, '0', STR_PAD_LEFT);
        $codigo_persona_4 = explode('.', $codigo_cid)[0] . '.1.' . str_pad((intval(explode('.', $codigo_cid)[2]) + 4), 4, '0', STR_PAD_LEFT);
        $personas = [
            [
                'codigo' => $codigo_persona_1,
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
                'codigo' => $codigo_persona_2,
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
                'codigo' => $codigo_persona_3,
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
                'codigo' => $codigo_persona_4,
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
