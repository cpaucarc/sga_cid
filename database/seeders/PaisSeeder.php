<?php

namespace Database\Seeders;

use App\Models\Pais;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paises = [
            [
                "id" => 10,
                "abrev" => "ARG",
                "nombre" => "ARGENTINA",
            ],
            [
                "id" => 16,
                "abrev" => "AUS",
                "nombre" => "AUSTRALIA",
            ],

            [
                "id" => 20,
                "abrev" => "BEL",
                "nombre" => "BÉLGICA",
            ],
            [
                "id" => 33,
                "abrev" => "BOL",
                "nombre" => "BOLIVIA",
            ],
            [
                "id" => 34,
                "abrev" => "BRA",
                "nombre" => "BRASIL",
            ],
            [
                "id" => 41,
                "abrev" => "CAN",
                "nombre" => "CANADA",
            ],
            [
                "id" => 43,
                "abrev" => "CHE",
                "nombre" => "SUIZA",
            ],
            [
                "id" => 44,
                "abrev" => "CHL",
                "nombre" => "CHILE",
            ],
            [
                "id" => 45,
                "abrev" => "CHN",
                "nombre" => "CHINA",
            ],
            [
                "id" => 51,
                "abrev" => "COL",
                "nombre" => "COLOMBIA",
            ],
            [
                "id" => 54,
                "abrev" => "CRI",
                "nombre" => "COSTA RICA",
            ],
            [
                "id" => 55,
                "abrev" => "CUB",
                "nombre" => "CUBA",
            ],
            [
                "id" => 64,
                "abrev" => "DNK",
                "nombre" => "DINAMARCA",
            ],
            [
                "id" => 67,
                "abrev" => "ECU",
                "nombre" => "ECUADOR",
            ],
            [
                "id" => 71,
                "abrev" => "ESP",
                "nombre" => "ESPAÑA",
            ],
            [
                "id" => 77,
                "abrev" => "FRA",
                "nombre" => "FRANCIA",
            ],
            [
                "id" => 81,
                "abrev" => "GBR",
                "nombre" => "REINO UNIDO",
            ],
            [
                "id" => 94,
                "abrev" => "GTM",
                "nombre" => "GUATEMALA",
            ],
            [
                "id" => 100,
                "abrev" => "HND",
                "nombre" => "HONDURAS",
            ],
            [
                "id" => 113,
                "abrev" => "ITA",
                "nombre" => "ITALIA",
            ],
            [
                "id" => 117,
                "abrev" => "JPN",
                "nombre" => "JAPON",
            ],
            [
                "id" => 124,
                "abrev" => "KOR",
                "nombre" => "COREA DEL SUR",
            ],
            [
                "id" => 144,
                "abrev" => "MEX",
                "nombre" => "MÉXICO",
            ],
            [
                "id" => 166,
                "abrev" => "NIC",
                "nombre" => "NICARAGUA",
            ],
            [
                "id" => 168,
                "abrev" => "NLD",
                "nombre" => "PAISES BAJOS",
            ],
            [
                "id" => 172,
                "abrev" => "NZL",
                "nombre" => "NUEVA ZELANDA",
            ],
            [
                "id" => 175,
                "abrev" => "PAN",
                "nombre" => "PANAMÁ",
            ],
            [
                "id" => 177,
                "abrev" => "PER",
                "nombre" => "PERÚ"
            ],
            [
                "id" => 182,
                "abrev" => "PRI",
                "nombre" => "PUERTO RICO"
            ],
            [
                "id" => 184,
                "abrev" => "PRT",
                "nombre" => "PORTUGAL"
            ],
            [
                "id" => 185,
                "abrev" => "PRY",
                "nombre" => "PARAGUAY"
            ],
            [
                "id" => 191,
                "abrev" => "RUS",
                "nombre" => "RUSIA"
            ],
            [
                "id" => 202,
                "abrev" => "SLV",
                "nombre" => "EL SALVADOR"
            ],
            [
                "id" => 234,
                "abrev" => "URY",
                "nombre" => "URUGUAY"
            ],
            [
                "id" => 235,
                "abrev" => "USA",
                "nombre" => "ESTADOS UNIDOS"
            ],
            [
                "id" => 239,
                "abrev" => "VEN",
                "nombre" => "VENEZUELA"
            ]
        ];

        Pais::insert($paises);

    }
}
