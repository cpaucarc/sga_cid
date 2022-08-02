<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequisitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $requisitos = [
            [
                'nombre' => 'Comprobante de pago (Constancia de Notas)',
                'descripcion' => 'Básico (S/.15.00) - Intermedio (S/.15.00) - Avanzado (S/.15.00).',
            ],
            [
                'nombre' => 'FUT',
                'descripcion'=>'Formato unico de tramite (fut).',
            ],
            [
                'nombre' => 'Copia simple de DNI',
                'descripcion'=>'La copia de DNI ambas caras en una sola hoja claras y nítidas.',
            ],
            [
                'nombre' => 'Comprobante de pago (Cerficado de Estudios)',
                'descripcion' => 'Básico (S/.40.00) - Intermedio (S/.50.00) - Avanzado (S/.60.00).',
            ],
            [
                'nombre' => 'Copia de Constancia de Notas (autenticada)',
                'descripcion' => 'La copia de constancia de notas debe estar autenticada en la Secretaria General de la UNASAM.',
            ],
            [
                'nombre' => 'Fotografía (tamaño carné)',
                'descripcion' => 'La fotografía con terno, tamaño carné, a colores (terno oscuro fondo blando).',
            ],
        ];

        \App\Models\Requisito::insert($requisitos);
    }
}
