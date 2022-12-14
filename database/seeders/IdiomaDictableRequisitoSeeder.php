<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdiomaDictableRequisitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idioma_requisitos = [
            [
                'esta_activo' => 1,
                'solicitud_tipo_id' => 1,
                'requisito_id' => 1, // Comprobante de pago (Constancia de Notas)
                'idioma_dictable_id' => 1, // Ingles - Jóvenes - Básico
            ],
            [
                'esta_activo' => 1,
                'solicitud_tipo_id' => 1,
                'requisito_id' => 2, // FUT
                'idioma_dictable_id' => 1, // Ingles - Jóvenes - Básico
            ],
            [
                'esta_activo' => 1,
                'solicitud_tipo_id' => 1,
                'requisito_id' => 3, // Copia simple de DNI
                'idioma_dictable_id' => 1, // Ingles - Jóvenes - Básico
            ],
            [
                'esta_activo' => 1,
                'solicitud_tipo_id' => 2,
                'requisito_id' => 4, // Comprobante de pago (Cerficado de Estudio)
                'idioma_dictable_id' => 1, // Ingles - Jóvenes - Básico
            ],
            [
                'esta_activo' => 1,
                'solicitud_tipo_id' => 2,
                'requisito_id' => 5, // Copia de Constancia de Notas (autenticada)
                'idioma_dictable_id' => 1, // Ingles - Jóvenes - Básico
            ],
            [
                'esta_activo' => 1,
                'solicitud_tipo_id' => 2,
                'requisito_id' => 6, // Fotografía (tamaño carné)
                'idioma_dictable_id' => 1, // Ingles - Jóvenes - Básico
            ],
            [
                'esta_activo' => 1,
                'solicitud_tipo_id' => 1,
                'requisito_id' => 1, // Comprobante de pago (Constancia de Notas)
                'idioma_dictable_id' => 2, // Ingles - Jóvenes - Intermedio
            ],
            [
                'esta_activo' => 1,
                'solicitud_tipo_id' => 1,
                'requisito_id' => 2, // FUT
                'idioma_dictable_id' => 2, // Ingles - Jóvenes - Intermedio
            ],
            [
                'esta_activo' => 1,
                'solicitud_tipo_id' => 1,
                'requisito_id' => 3, // Copia simple de DNI
                'idioma_dictable_id' => 2, // Ingles - Jóvenes - Intermedio
            ],
            [
                'esta_activo' => 1,
                'solicitud_tipo_id' => 2,
                'requisito_id' => 4, // Comprobante de pago (Cerficado de Estudio)
                'idioma_dictable_id' => 2, // Ingles - Jóvenes - Intermedio
            ],
            [
                'esta_activo' => 1,
                'solicitud_tipo_id' => 2,
                'requisito_id' => 5, // Copia de Constancia de Notas (autenticada)
                'idioma_dictable_id' => 2, // Ingles - Jóvenes - Intermedio
            ],
            [
                'esta_activo' => 1,
                'solicitud_tipo_id' => 2,
                'requisito_id' => 6, // Fotografía (tamaño carné)
                'idioma_dictable_id' => 2, // Ingles - Jóvenes - Intermedio
            ],
            [
                'esta_activo' => 1,
                'solicitud_tipo_id' => 1,
                'requisito_id' => 1, // Comprobante de pago (Constancia de Notas)
                'idioma_dictable_id' => 3, // Ingles - Jóvenes - Avanzado
            ],
            [
                'esta_activo' => 1,
                'solicitud_tipo_id' => 1,
                'requisito_id' => 2, // FUT
                'idioma_dictable_id' => 3, // Ingles - Jóvenes - Avanzado
            ],
            [
                'esta_activo' => 1,
                'solicitud_tipo_id' => 1,
                'requisito_id' => 3, // Copia simple de DNI
                'idioma_dictable_id' => 3, // Ingles - Jóvenes - Avanzado
            ],
            [
                'esta_activo' => 1,
                'solicitud_tipo_id' => 2,
                'requisito_id' => 4, // Comprobante de pago (Cerficado de Estudio)
                'idioma_dictable_id' => 3, // Ingles - Jóvenes - Avanzado
            ],
            [
                'esta_activo' => 1,
                'solicitud_tipo_id' => 2,
                'requisito_id' => 5, // Copia de Constancia de Notas (autenticada)
                'idioma_dictable_id' => 3, // Ingles - Jóvenes - Avanzado
            ],
            [
                'esta_activo' => 1,
                'solicitud_tipo_id' => 2,
                'requisito_id' => 6, // Fotografía (tamaño carné)
                'idioma_dictable_id' => 3, // Ingles - Jóvenes - Avanzado
            ],
        ];

        \App\Models\IdiomaDictableRequisito::insert($idioma_requisitos);
    }
}
