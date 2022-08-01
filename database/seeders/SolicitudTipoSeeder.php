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
                'descripcion' => null,
            ],
            [
                'nombre' => 'Certificado de Estudios',
                'descripcion' => null,
            ],
        ];

        \App\Models\SolicitudTipo::insert($solicitud_tipos);
    }
}
