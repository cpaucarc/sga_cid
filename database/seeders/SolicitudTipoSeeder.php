<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SolicitudTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $solicitud_tipos = [
            [
                'nombre' => 'Constancia de Notas',
                'descripcion' => 'Documento el cual sirve para acreditar su situación académica.',
            ],
            [
                'nombre' => 'Certificado de Estudios',
                'descripcion' => 'Documento oficial en el que las Instituciones Educativas declaran oficialmente que una persona ha acreditado un programa o plan de estudios determinado.',
            ],
        ];

        \App\Models\SolicitudTipo::insert($solicitud_tipos);
    }
}
