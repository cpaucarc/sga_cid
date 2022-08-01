<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class IdiomaDictableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ingles
        $uuidA1_ENG = substr(Str::uuid(), 0, 8);
        $uuidA2_ENG = substr(Str::uuid(), 0, 8);
        $uuidB1_ENG = substr(Str::uuid(), 0, 8);
        $uuidB2_ENG = substr(Str::uuid(), 0, 8);
        $uuidC1_ENG = substr(Str::uuid(), 0, 8);
        $uuidC2_ENG = substr(Str::uuid(), 0, 8);
        // Francés
        $uuidA1_FR = substr(Str::uuid(), 0, 8);
        $uuidA2_FR = substr(Str::uuid(), 0, 8);
        $uuidB1_FR = substr(Str::uuid(), 0, 8);
        $uuidB2_FR = substr(Str::uuid(), 0, 8);
        $uuidC1_FR = substr(Str::uuid(), 0, 8);
        $uuidC2_FR = substr(Str::uuid(), 0, 8);
        // Italiano
        $uuidA1_IT = substr(Str::uuid(), 0, 8);
        $uuidA2_IT = substr(Str::uuid(), 0, 8);
        $uuidB1_IT = substr(Str::uuid(), 0, 8);
        $uuidB2_IT = substr(Str::uuid(), 0, 8);
        $uuidC1_IT = substr(Str::uuid(), 0, 8);
        $uuidC2_IT = substr(Str::uuid(), 0, 8);
        // Quechua
        $uuidA1_QCH = substr(Str::uuid(), 0, 8);
        $uuidA2_QCH = substr(Str::uuid(), 0, 8);
        $uuidB1_QCH = substr(Str::uuid(), 0, 8);
        $uuidB2_QCH = substr(Str::uuid(), 0, 8);
        $uuidC1_QCH = substr(Str::uuid(), 0, 8);
        $uuidC2_QCH = substr(Str::uuid(), 0, 8);
        // Alemán
        $uuidA1_GM = substr(Str::uuid(), 0, 8);
        $uuidA2_GM = substr(Str::uuid(), 0, 8);
        $uuidB1_GM = substr(Str::uuid(), 0, 8);
        $uuidB2_GM = substr(Str::uuid(), 0, 8);
        $uuidC1_GM = substr(Str::uuid(), 0, 8);
        $uuidC2_GM = substr(Str::uuid(), 0, 8);
        // Portugués
        $uuidA1_PO = substr(Str::uuid(), 0, 8);
        $uuidA2_PO = substr(Str::uuid(), 0, 8);
        $uuidB1_PO = substr(Str::uuid(), 0, 8);
        $uuidB2_PO = substr(Str::uuid(), 0, 8);
        $uuidC1_PO = substr(Str::uuid(), 0, 8);
        $uuidC2_PO = substr(Str::uuid(), 0, 8);

        $idiomas_dicatables = [
            //Idioma Ingles - Básico
            [
                'codigo' => $uuidA1_ENG,
                'requisito' => null,
                'precio_mensual' => 100.00,
                'duracion_meses' => 5,
                'idioma_id' => 1, // Ingles
                'idioma_nivel_id' => 1, // A1, 'nivel' => 'Básico'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidA2_ENG,
                'requisito' => $uuidA1_ENG,
                'precio_mensual' => 100.00,
                'duracion_meses' => 5,
                'idioma_id' => 1, // Ingles
                'idioma_nivel_id' => 2, // A2, 'nivel' => 'Básico'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Ingles - Intermedio
            [
                'codigo' => $uuidB1_ENG,
                'requisito' => $uuidA2_ENG,
                'precio_mensual' => 110.00,
                'duracion_meses' => 5,
                'idioma_id' => 1, // Ingles
                'idioma_nivel_id' => 3, // B1, 'nivel' => 'Intermedio'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidB2_ENG,
                'requisito' => $uuidB1_ENG,
                'precio_mensual' => 110.00,
                'duracion_meses' => 5,
                'idioma_id' => 1, // Ingles
                'idioma_nivel_id' => 4, // B2, 'nivel' => 'Intermedio'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Ingles - Avanzado
            [
                'codigo' => $uuidC1_ENG,
                'requisito' => $uuidB2_ENG,
                'precio_mensual' => 150.00,
                'duracion_meses' => 3,
                'idioma_id' => 1, // Ingles
                'idioma_nivel_id' => 5, // C1, 'nivel' => 'Avanzado'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidC2_ENG,
                'requisito' => $uuidC1_ENG,
                'precio_mensual' => 150.00,
                'duracion_meses' => 3,
                'idioma_id' => 1, // Ingles
                'idioma_nivel_id' => 6, // C2, 'nivel' => 'Avanzado'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Francés - Básico
            [
                'codigo' => $uuidA1_FR,
                'requisito' => null,
                'precio_mensual' => 100.00,
                'duracion_meses' => 5,
                'idioma_id' => 2, // Francés
                'idioma_nivel_id' => 1, // A1, 'nivel' => 'Básico'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidA2_FR,
                'requisito' => $uuidA1_FR,
                'precio_mensual' => 100.00,
                'duracion_meses' => 5,
                'idioma_id' => 2, // Francés
                'idioma_nivel_id' => 2, // A2, 'nivel' => 'Básico'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Francés - Intermedio
            [
                'codigo' => $uuidB1_FR,
                'requisito' => $uuidA2_FR,
                'precio_mensual' => 110.00,
                'duracion_meses' => 5,
                'idioma_id' => 2, // Francés
                'idioma_nivel_id' => 3, // B1, 'nivel' => 'Intermedio'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidB2_FR,
                'requisito' => $uuidB1_FR,
                'precio_mensual' => 110.00,
                'duracion_meses' => 5,
                'idioma_id' => 2, // Francés
                'idioma_nivel_id' => 4, // B2, 'nivel' => 'Intermedio'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Francés - Avanzado
            [
                'codigo' => $uuidC1_FR,
                'requisito' => $uuidB2_FR,
                'precio_mensual' => 150.00,
                'duracion_meses' => 3,
                'idioma_id' => 2, // Francés
                'idioma_nivel_id' => 5, // C1, 'nivel' => 'Avanzado'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidC2_FR,
                'requisito' => $uuidC1_FR,
                'precio_mensual' => 150.00,
                'duracion_meses' => 3,
                'idioma_id' => 2, // Francés
                'idioma_nivel_id' => 6, // C2, 'nivel' => 'Avanzado'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Italiano - Básico
            [
                'codigo' => $uuidA1_IT,
                'requisito' => null,
                'precio_mensual' => 100.00,
                'duracion_meses' => 5,
                'idioma_id' => 3, // Italiano
                'idioma_nivel_id' => 1, // A1, 'nivel' => 'Básico'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidA2_IT,
                'requisito' => $uuidA1_IT,
                'precio_mensual' => 100.00,
                'duracion_meses' => 5,
                'idioma_id' => 3, // Italiano
                'idioma_nivel_id' => 2, // A2, 'nivel' => 'Básico'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Italiano - Intermedio
            [
                'codigo' => $uuidB1_IT,
                'requisito' => $uuidA2_IT,
                'precio_mensual' => 110.00,
                'duracion_meses' => 5,
                'idioma_id' => 3, // Italiano
                'idioma_nivel_id' => 3, // B1, 'nivel' => 'Intermedio'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidB2_IT,
                'requisito' => $uuidB1_IT,
                'precio_mensual' => 110.00,
                'duracion_meses' => 5,
                'idioma_id' => 3, // Italiano
                'idioma_nivel_id' => 4, // B2, 'nivel' => 'Intermedio'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Italiano - Avanzado
            [
                'codigo' => $uuidC1_IT,
                'requisito' => $uuidB2_IT,
                'precio_mensual' => 150.00,
                'duracion_meses' => 3,
                'idioma_id' => 3, // Italiano
                'idioma_nivel_id' => 5, // C1, 'nivel' => 'Avanzado'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidC2_IT,
                'requisito' => $uuidC1_IT,
                'precio_mensual' => 150.00,
                'duracion_meses' => 3,
                'idioma_id' => 3, // Italiano
                'idioma_nivel_id' => 6, // C2, 'nivel' => 'Avanzado'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Quechua - Básico
            [
                'codigo' => $uuidA1_QCH,
                'requisito' => null,
                'precio_mensual' => 100.00,
                'duracion_meses' => 5,
                'idioma_id' => 4, // Quechua
                'idioma_nivel_id' => 1, // A1, 'nivel' => 'Básico'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidA2_QCH,
                'requisito' => $uuidA1_QCH,
                'precio_mensual' => 100.00,
                'duracion_meses' => 5,
                'idioma_id' => 4, // Quechua
                'idioma_nivel_id' => 2, // A2, 'nivel' => 'Básico'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Quechua - Intermedio
            [
                'codigo' => $uuidB1_QCH,
                'requisito' => $uuidA2_QCH,
                'precio_mensual' => 110.00,
                'duracion_meses' => 5,
                'idioma_id' => 4, // Quechua
                'idioma_nivel_id' => 3, // B1, 'nivel' => 'Intermedio'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidB2_QCH,
                'requisito' => $uuidB1_QCH,
                'precio_mensual' => 110.00,
                'duracion_meses' => 5,
                'idioma_id' => 4, // Quechua
                'idioma_nivel_id' => 4, // B2, 'nivel' => 'Intermedio'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Quechua - Avanzado
            [
                'codigo' => $uuidC1_QCH,
                'requisito' => $uuidB2_QCH,
                'precio_mensual' => 150.00,
                'duracion_meses' => 3,
                'idioma_id' => 4, // Quechua
                'idioma_nivel_id' => 5, // C1, 'nivel' => 'Avanzado'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidC2_QCH,
                'requisito' => $uuidC1_QCH,
                'precio_mensual' => 150.00,
                'duracion_meses' => 3,
                'idioma_id' => 4, // Quechua
                'idioma_nivel_id' => 6, // C2, 'nivel' => 'Avanzado'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Alemán - Básico
            [
                'codigo' => $uuidA1_GM,
                'requisito' => null,
                'precio_mensual' => 100.00,
                'duracion_meses' => 5,
                'idioma_id' => 5, // Alemán
                'idioma_nivel_id' => 1, // A1, 'nivel' => 'Básico'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidA2_GM,
                'requisito' => $uuidA1_GM,
                'precio_mensual' => 100.00,
                'duracion_meses' => 5,
                'idioma_id' => 5, // Alemán
                'idioma_nivel_id' => 2, // A2, 'nivel' => 'Básico'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Alemán - Intermedio
            [
                'codigo' => $uuidB1_GM,
                'requisito' => $uuidA2_GM,
                'precio_mensual' => 110.00,
                'duracion_meses' => 5,
                'idioma_id' => 5, // Alemán
                'idioma_nivel_id' => 3, // B1, 'nivel' => 'Intermedio'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidB2_GM,
                'requisito' => $uuidB1_GM,
                'precio_mensual' => 110.00,
                'duracion_meses' => 5,
                'idioma_id' => 5, // Alemán
                'idioma_nivel_id' => 4, // B2, 'nivel' => 'Intermedio'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Alemán - Avanzado
            [
                'codigo' => $uuidC1_GM,
                'requisito' => $uuidB2_GM,
                'precio_mensual' => 150.00,
                'duracion_meses' => 3,
                'idioma_id' => 5, // Alemán
                'idioma_nivel_id' => 5, // C1, 'nivel' => 'Avanzado'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidC2_GM,
                'requisito' => $uuidC1_GM,
                'precio_mensual' => 150.00,
                'duracion_meses' => 3,
                'idioma_id' => 5, // Alemán
                'idioma_nivel_id' => 6, // C2, 'nivel' => 'Avanzado'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //I6ioma Portugués - Básico
            [
                'codigo' => $uuidA1_PO,
                'requisito' => null,
                'precio_mensual' => 100.00,
                'duracion_meses' => 5,
                'idioma_id' => 6, // Portugués
                'idioma_nivel_id' => 1, // A1, 'nivel' => 'Básico'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidA2_PO,
                'requisito' => $uuidA1_PO,
                'precio_mensual' => 100.00,
                'duracion_meses' => 5,
                'idioma_id' => 6, // Portugués
                'idioma_nivel_id' => 2, // A2, 'nivel' => 'Básico'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Portugués - Intermedio
            [
                'codigo' => $uuidB1_PO,
                'requisito' => $uuidA2_PO,
                'precio_mensual' => 110.00,
                'duracion_meses' => 5,
                'idioma_id' => 6, // Portugués
                'idioma_nivel_id' => 3, // B1, 'nivel' => 'Intermedio'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidB2_PO,
                'requisito' => $uuidB1_PO,
                'precio_mensual' => 110.00,
                'duracion_meses' => 5,
                'idioma_id' => 6, // Portugués
                'idioma_nivel_id' => 4, // B2, 'nivel' => 'Intermedio'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            //Idioma Alemán - Avanzado
            [
                'codigo' => $uuidC1_PO,
                'requisito' => $uuidB2_PO,
                'precio_mensual' => 150.00,
                'duracion_meses' => 3,
                'idioma_id' => 6, // Portugués
                'idioma_nivel_id' => 5, // C1, 'nivel' => 'Avanzado'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
            [
                'codigo' => $uuidC2_PO,
                'requisito' => $uuidC1_PO,
                'precio_mensual' => 150.00,
                'duracion_meses' => 3,
                'idioma_id' => 6, // Portugués
                'idioma_nivel_id' => 6, // C2, 'nivel' => 'Avanzado'
                'modalidad_id' => 1, // Jóvenes/Adultos
            ],
        ];

        \App\Models\IdiomaDictable::insert($idiomas_dicatables);
    }
}
