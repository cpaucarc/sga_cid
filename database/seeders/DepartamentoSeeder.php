<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $departamentos = [
            [
                "id" => 1,
                "nombre" => "Amazonas",
                "pais_id" => 177
            ],
            [
                "id" => 2,
                "nombre" => "Áncash",
                "pais_id" => 177
            ],
            [
                "id" => 3,
                "nombre" => "Apurímac",
                "pais_id" => 177
            ],
            [
                "id" => 4,
                "nombre" => "Arequipa",
                "pais_id" => 177
            ],
            [
                "id" => 5,
                "nombre" => "Ayacucho",
                "pais_id" => 177
            ],
            [
                "id" => 6,
                "nombre" => "Cajamarca",
                "pais_id" => 177
            ],
            [
                "id" => 7,
                "nombre" => "Cusco",
                "pais_id" => 177
            ],
            [
                "id" => 8,
                "nombre" => "Huancavelica",
                "pais_id" => 177
            ],
            [
                "id" => 9,
                "nombre" => "Huánuco",
                "pais_id" => 177
            ],
            [
                "id" => 10,
                "nombre" => "Ica",
                "pais_id" => 177
            ],
            [
                "id" => 11,
                "nombre" => "Junín",
                "pais_id" => 177
            ],
            [
                "id" => 12,
                "nombre" => "La Libertad",
                "pais_id" => 177
            ],
            [
                "id" => 13,
                "nombre" => "Lambayeque",
                "pais_id" => 177
            ],
            [
                "id" => 14,
                "nombre" => "Lima",
                "pais_id" => 177
            ],
            [
                "id" => 15,
                "nombre" => "Loreto",
                "pais_id" => 177
            ],
            [
                "id" => 16,
                "nombre" => "Madre de Dios",
                "pais_id" => 177
            ],
            [
                "id" => 17,
                "nombre" => "Moquegua",
                "pais_id" => 177
            ],
            [
                "id" => 18,
                "nombre" => "Pasco",
                "pais_id" => 177
            ],
            [
                "id" => 19,
                "nombre" => "Piura",
                "pais_id" => 177
            ],
            [
                "id" => 20,
                "nombre" => "Puno",
                "pais_id" => 177
            ],
            [
                "id" => 21,
                "nombre" => "San Martín",
                "pais_id" => 177
            ],
            [
                "id" => 22,
                "nombre" => "Tacna",
                "pais_id" => 177
            ],
            [
                "id" => 23,
                "nombre" => "Tumbes",
                "pais_id" => 177
            ],
            [
                "id" => 24,
                "nombre" => "Callao",
                "pais_id" => 177
            ],
            [
                "id" => 25,
                "nombre" => "Ucayali",
                "pais_id" => 177
            ]
        ];

        Departamento::insert($departamentos);
    }
}
