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
        //Ingles
        $uuid_ingles_jovenes_basico = substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_intermedio = substr(Str::uuid(), 0, 8);
        $uuid_ingles_jovenes_avanzado = substr(Str::uuid(), 0, 8);
        $uuid_ingles_ninos_basico = substr(Str::uuid(), 0, 8);
        $uuid_ingles_ninos_intermedio = substr(Str::uuid(), 0, 8);
        $uuid_ingles_ninos_avanzado = substr(Str::uuid(), 0, 8);
        $uuid_ingles_acelerado_basico = substr(Str::uuid(), 0, 8);
        $uuid_ingles_acelerado_intermedio = substr(Str::uuid(), 0, 8);
        $uuid_ingles_acelerado_avanzado = substr(Str::uuid(), 0, 8);
        //Frances
        $uuid_frances_jovenes_basico = substr(Str::uuid(), 0, 8);
        $uuid_frances_jovenes_intermedio = substr(Str::uuid(), 0, 8);
        $uuid_frances_jovenes_avanzado = substr(Str::uuid(), 0, 8);
        $uuid_frances_ninos_basico = substr(Str::uuid(), 0, 8);
        $uuid_frances_ninos_intermedio = substr(Str::uuid(), 0, 8);
        $uuid_frances_ninos_avanzado = substr(Str::uuid(), 0, 8);
        $uuid_frances_acelerado_basico = substr(Str::uuid(), 0, 8);
        $uuid_frances_acelerado_intermedio = substr(Str::uuid(), 0, 8);
        $uuid_frances_acelerado_avanzado = substr(Str::uuid(), 0, 8);
        //Italiano
        $uuid_italiano_jovenes_basico = substr(Str::uuid(), 0, 8);
        $uuid_italiano_jovenes_intermedio = substr(Str::uuid(), 0, 8);
        $uuid_italiano_jovenes_avanzado = substr(Str::uuid(), 0, 8);
        $uuid_italiano_ninos_basico = substr(Str::uuid(), 0, 8);
        $uuid_italiano_ninos_intermedio = substr(Str::uuid(), 0, 8);
        $uuid_italiano_ninos_avanzado = substr(Str::uuid(), 0, 8);
        $uuid_italiano_acelerado_basico = substr(Str::uuid(), 0, 8);
        $uuid_italiano_acelerado_intermedio = substr(Str::uuid(), 0, 8);
        $uuid_italiano_acelerado_avanzado = substr(Str::uuid(), 0, 8);
        //Quechua
        $uuid_quechua_jovenes_basico = substr(Str::uuid(), 0, 8);
        $uuid_quechua_jovenes_intermedio = substr(Str::uuid(), 0, 8);
        $uuid_quechua_jovenes_avanzado = substr(Str::uuid(), 0, 8);
        $uuid_quechua_ninos_basico = substr(Str::uuid(), 0, 8);
        $uuid_quechua_ninos_intermedio = substr(Str::uuid(), 0, 8);
        $uuid_quechua_ninos_avanzado = substr(Str::uuid(), 0, 8);
        $uuid_quechua_acelerado_basico = substr(Str::uuid(), 0, 8);
        $uuid_quechua_acelerado_intermedio = substr(Str::uuid(), 0, 8);
        $uuid_quechua_acelerado_avanzado = substr(Str::uuid(), 0, 8);
        //Alemán
        $uuid_aleman_jovenes_basico = substr(Str::uuid(), 0, 8);
        $uuid_aleman_jovenes_intermedio = substr(Str::uuid(), 0, 8);
        $uuid_aleman_jovenes_avanzado = substr(Str::uuid(), 0, 8);
        $uuid_aleman_ninos_basico = substr(Str::uuid(), 0, 8);
        $uuid_aleman_ninos_intermedio = substr(Str::uuid(), 0, 8);
        $uuid_aleman_ninos_avanzado = substr(Str::uuid(), 0, 8);
        $uuid_aleman_acelerado_basico = substr(Str::uuid(), 0, 8);
        $uuid_aleman_acelerado_intermedio = substr(Str::uuid(), 0, 8);
        $uuid_aleman_acelerado_avanzado = substr(Str::uuid(), 0, 8);
        //Portugues
        $uuid_portugues_jovenes_basico = substr(Str::uuid(), 0, 8);
        $uuid_portugues_jovenes_intermedio = substr(Str::uuid(), 0, 8);
        $uuid_portugues_jovenes_avanzado = substr(Str::uuid(), 0, 8);
        $uuid_portugues_ninos_basico = substr(Str::uuid(), 0, 8);
        $uuid_portugues_ninos_intermedio = substr(Str::uuid(), 0, 8);
        $uuid_portugues_ninos_avanzado = substr(Str::uuid(), 0, 8);
        $uuid_portugues_acelerado_basico = substr(Str::uuid(), 0, 8);
        $uuid_portugues_acelerado_intermedio = substr(Str::uuid(), 0, 8);
        $uuid_portugues_acelerado_avanzado = substr(Str::uuid(), 0, 8);

        $idiomas_dicatables = [
            [
                "codigo" => $uuid_ingles_jovenes_basico,
                "requisito" => null,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 1,
                "modalidad_id" => 1,
                "idioma_id" => 1
            ],
            [
                "codigo" => $uuid_ingles_jovenes_intermedio,
                "requisito" => $uuid_ingles_jovenes_basico,
                "precio_mensual" => 110,
                "idioma_nivel_id" => 2,
                "modalidad_id" => 1,
                "idioma_id" => 1
            ],
            [
                "codigo" => $uuid_ingles_jovenes_avanzado,
                "requisito" => $uuid_ingles_jovenes_intermedio,
                "precio_mensual" => 150,
                "idioma_nivel_id" => 3,
                "modalidad_id" => 1,
                "idioma_id" => 1
            ],
            [
                "codigo" => $uuid_frances_jovenes_basico,
                "requisito" => null,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 1,
                "modalidad_id" => 1,
                "idioma_id" => 2
            ],
            [
                "codigo" => $uuid_frances_jovenes_intermedio,
                "requisito" => $uuid_frances_jovenes_basico,
                "precio_mensual" => 110,
                "idioma_nivel_id" => 2,
                "modalidad_id" => 1,
                "idioma_id" => 2
            ],
            [
                "codigo" => $uuid_frances_jovenes_avanzado,
                "requisito" => $uuid_frances_jovenes_intermedio,
                "precio_mensual" => 150,
                "idioma_nivel_id" => 3,
                "modalidad_id" => 1,
                "idioma_id" => 2
            ],
            [
                "codigo" => $uuid_italiano_jovenes_basico,
                "requisito" => null,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 1,
                "modalidad_id" => 1,
                "idioma_id" => 3
            ],
            [
                "codigo" => $uuid_italiano_jovenes_intermedio,
                "requisito" => $uuid_italiano_jovenes_basico,
                "precio_mensual" => 110,
                "idioma_nivel_id" => 2,
                "modalidad_id" => 1,
                "idioma_id" => 3
            ],
            [
                "codigo" => $uuid_italiano_jovenes_avanzado,
                "requisito" => $uuid_italiano_jovenes_intermedio,
                "precio_mensual" => 150,
                "idioma_nivel_id" => 3,
                "modalidad_id" => 1,
                "idioma_id" => 3
            ],
            [
                "codigo" => $uuid_quechua_jovenes_basico,
                "requisito" => null,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 1,
                "modalidad_id" => 1,
                "idioma_id" => 4
            ],
            [
                "codigo" => $uuid_quechua_jovenes_intermedio,
                "requisito" => $uuid_quechua_jovenes_basico,
                "precio_mensual" => 110,
                "idioma_nivel_id" => 2,
                "modalidad_id" => 1,
                "idioma_id" => 4
            ],
            [
                "codigo" => $uuid_quechua_jovenes_avanzado,
                "requisito" => $uuid_quechua_jovenes_intermedio,
                "precio_mensual" => 150,
                "idioma_nivel_id" => 3,
                "modalidad_id" => 1,
                "idioma_id" => 4
            ],
            [
                "codigo" => $uuid_aleman_jovenes_basico,
                "requisito" => null,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 1,
                "modalidad_id" => 1,
                "idioma_id" => 5
            ],
            [
                "codigo" => $uuid_aleman_jovenes_intermedio,
                "requisito" => $uuid_aleman_jovenes_basico,
                "precio_mensual" => 110,
                "idioma_nivel_id" => 2,
                "modalidad_id" => 1,
                "idioma_id" => 5
            ],
            [
                "codigo" => $uuid_aleman_jovenes_avanzado,
                "requisito" => $uuid_aleman_jovenes_intermedio,
                "precio_mensual" => 150,
                "idioma_nivel_id" => 3,
                "modalidad_id" => 1,
                "idioma_id" => 5
            ],
            [
                "codigo" => $uuid_portugues_jovenes_basico,
                "requisito" => null,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 1,
                "modalidad_id" => 1,
                "idioma_id" => 6
            ],
            [
                "codigo" => $uuid_portugues_jovenes_intermedio,
                "requisito" => $uuid_portugues_jovenes_basico,
                "precio_mensual" => 110,
                "idioma_nivel_id" => 2,
                "modalidad_id" => 1,
                "idioma_id" => 6
            ],
            [
                "codigo" => $uuid_portugues_jovenes_avanzado,
                "requisito" => $uuid_portugues_jovenes_intermedio,
                "precio_mensual" => 150,
                "idioma_nivel_id" => 3,
                "modalidad_id" => 1,
                "idioma_id" => 6
            ],
            [
                "codigo" => $uuid_ingles_ninos_basico,
                "requisito" => null,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 1,
                "modalidad_id" => 2,
                "idioma_id" => 1
            ],
            [
                "codigo" => $uuid_ingles_ninos_intermedio,
                "requisito" => $uuid_ingles_ninos_basico,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 2,
                "modalidad_id" => 2,
                "idioma_id" => 1
            ],
            [
                "codigo" => $uuid_ingles_ninos_avanzado,
                "requisito" => $uuid_ingles_ninos_intermedio,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 3,
                "modalidad_id" => 2,
                "idioma_id" => 1
            ],
            [
                "codigo" => $uuid_frances_ninos_basico,
                "requisito" => null,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 1,
                "modalidad_id" => 2,
                "idioma_id" => 2
            ],
            [
                "codigo" => $uuid_frances_ninos_intermedio,
                "requisito" => $uuid_frances_ninos_basico,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 2,
                "modalidad_id" => 2,
                "idioma_id" => 2
            ],
            [
                "codigo" => $uuid_frances_ninos_avanzado,
                "requisito" => $uuid_frances_ninos_intermedio,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 3,
                "modalidad_id" => 2,
                "idioma_id" => 2
            ],
            [
                "codigo" => $uuid_italiano_ninos_basico,
                "requisito" => null,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 1,
                "modalidad_id" => 2,
                "idioma_id" => 3
            ],
            [
                "codigo" => $uuid_italiano_ninos_intermedio,
                "requisito" => $uuid_italiano_ninos_basico,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 2,
                "modalidad_id" => 2,
                "idioma_id" => 3
            ],
            [
                "codigo" => $uuid_italiano_ninos_avanzado,
                "requisito" => $uuid_italiano_ninos_intermedio,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 3,
                "modalidad_id" => 2,
                "idioma_id" => 3
            ],
            [
                "codigo" => $uuid_quechua_ninos_basico,
                "requisito" => null,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 1,
                "modalidad_id" => 2,
                "idioma_id" => 4
            ],
            [
                "codigo" => $uuid_quechua_ninos_intermedio,
                "requisito" => $uuid_quechua_ninos_basico,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 2,
                "modalidad_id" => 2,
                "idioma_id" => 4
            ],
            [
                "codigo" => $uuid_quechua_ninos_avanzado,
                "requisito" => $uuid_quechua_ninos_intermedio,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 3,
                "modalidad_id" => 2,
                "idioma_id" => 4
            ],
            [
                "codigo" => $uuid_aleman_ninos_basico,
                "requisito" => null,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 1,
                "modalidad_id" => 2,
                "idioma_id" => 5
            ],
            [
                "codigo" => $uuid_aleman_ninos_intermedio,
                "requisito" => $uuid_aleman_ninos_basico,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 2,
                "modalidad_id" => 2,
                "idioma_id" => 5
            ],
            [
                "codigo" => $uuid_aleman_ninos_avanzado,
                "requisito" => $uuid_aleman_ninos_intermedio,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 3,
                "modalidad_id" => 2,
                "idioma_id" => 5
            ],
            [
                "codigo" => $uuid_portugues_ninos_basico,
                "requisito" => null,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 1,
                "modalidad_id" => 2,
                "idioma_id" => 6
            ],
            [
                "codigo" => $uuid_portugues_ninos_intermedio,
                "requisito" => $uuid_portugues_ninos_basico,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 2,
                "modalidad_id" => 2,
                "idioma_id" => 6
            ],
            [
                "codigo" => $uuid_portugues_ninos_avanzado,
                "requisito" => $uuid_portugues_ninos_intermedio,
                "precio_mensual" => 100,
                "idioma_nivel_id" => 3,
                "modalidad_id" => 2,
                "idioma_id" => 6
            ],
            [
                "codigo" => $uuid_ingles_acelerado_basico,
                "requisito" => null,
                "precio_mensual" => 160,
                "idioma_nivel_id" => 1,
                "modalidad_id" => 3,
                "idioma_id" => 1
            ],
            [
                "codigo" => $uuid_ingles_acelerado_intermedio,
                "requisito" => $uuid_ingles_acelerado_basico,
                "precio_mensual" => 160,
                "idioma_nivel_id" => 2,
                "modalidad_id" => 3,
                "idioma_id" => 1
            ],
            [
                "codigo" => $uuid_ingles_acelerado_avanzado,
                "requisito" => $uuid_ingles_acelerado_intermedio,
                "precio_mensual" => 160,
                "idioma_nivel_id" => 3,
                "modalidad_id" => 3,
                "idioma_id" => 1
            ],
            [
                "codigo" => $uuid_frances_acelerado_basico,
                "requisito" => null,
                "precio_mensual" => 160,
                "idioma_nivel_id" => 1,
                "modalidad_id" => 3,
                "idioma_id" => 2
            ],
            [
                "codigo" => $uuid_frances_acelerado_intermedio,
                "requisito" => $uuid_frances_acelerado_basico,
                "precio_mensual" => 160,
                "idioma_nivel_id" => 2,
                "modalidad_id" => 3,
                "idioma_id" => 2
            ],
            [
                "codigo" => $uuid_frances_acelerado_avanzado,
                "requisito" => $uuid_frances_acelerado_intermedio,
                "precio_mensual" => 160,
                "idioma_nivel_id" => 3,
                "modalidad_id" => 3,
                "idioma_id" => 2
            ],
            [
                "codigo" => $uuid_italiano_acelerado_basico,
                "requisito" => null,
                "precio_mensual" => 160,
                "idioma_nivel_id" => 1,
                "modalidad_id" => 3,
                "idioma_id" => 3
            ],
            [
                "codigo" => $uuid_italiano_acelerado_intermedio,
                "requisito" => $uuid_italiano_acelerado_basico,
                "precio_mensual" => 160,
                "idioma_nivel_id" => 2,
                "modalidad_id" => 3,
                "idioma_id" => 3
            ],
            [
                "codigo" => $uuid_italiano_acelerado_avanzado,
                "requisito" => $uuid_italiano_acelerado_intermedio,
                "precio_mensual" => 160,
                "idioma_nivel_id" => 3,
                "modalidad_id" => 3,
                "idioma_id" => 3
            ],
            [
                "codigo" => $uuid_quechua_acelerado_basico,
                "requisito" => null,
                "precio_mensual" => 160,
                "idioma_nivel_id" => 1,
                "modalidad_id" => 3,
                "idioma_id" => 4
            ],
            [
                "codigo" => $uuid_quechua_acelerado_intermedio,
                "requisito" => $uuid_quechua_acelerado_basico,
                "precio_mensual" => 160,
                "idioma_nivel_id" => 2,
                "modalidad_id" => 3,
                "idioma_id" => 4
            ],
            [
                "codigo" => $uuid_quechua_acelerado_avanzado,
                "requisito" => $uuid_quechua_acelerado_intermedio,
                "precio_mensual" => 160,
                "idioma_nivel_id" => 3,
                "modalidad_id" => 3,
                "idioma_id" => 4
            ],
            [
                "codigo" => $uuid_aleman_acelerado_basico,
                "requisito" => null,
                "precio_mensual" => 160,
                "idioma_nivel_id" => 1,
                "modalidad_id" => 3,
                "idioma_id" => 5
            ],
            [
                "codigo" => $uuid_aleman_acelerado_intermedio,
                "requisito" => $uuid_aleman_acelerado_basico,
                "precio_mensual" => 160,
                "idioma_nivel_id" => 2,
                "modalidad_id" => 3,
                "idioma_id" => 5
            ],
            [
                "codigo" => $uuid_aleman_acelerado_avanzado,
                "requisito" => $uuid_aleman_acelerado_intermedio,
                "precio_mensual" => 160,
                "idioma_nivel_id" => 3,
                "modalidad_id" => 3,
                "idioma_id" => 5
            ],
            [
                "codigo" => $uuid_portugues_acelerado_basico,
                "requisito" => null,
                "precio_mensual" => 160,
                "idioma_nivel_id" => 1,
                "modalidad_id" => 3,
                "idioma_id" => 6
            ],
            [
                "codigo" => $uuid_portugues_acelerado_intermedio,
                "requisito" => $uuid_portugues_acelerado_basico,
                "precio_mensual" => 160,
                "idioma_nivel_id" => 2,
                "modalidad_id" => 3,
                "idioma_id" => 6
            ],
            [
                "codigo" => $uuid_portugues_acelerado_avanzado,
                "requisito" => $uuid_portugues_acelerado_intermedio,
                "precio_mensual" => 160,
                "idioma_nivel_id" => 3,
                "modalidad_id" => 3,
                "idioma_id" => 6
            ]
        ];

        \App\Models\IdiomaDictable::insert($idiomas_dicatables);
    }
}
