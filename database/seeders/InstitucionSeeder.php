<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstitucionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $instituciones = [
            [
                'ruc' => '20166550239',
                'nombre' => 'UNIVERSIDAD NACIONAL SANTIAGO ANTUNEZ DE MAYOLO',
                'direccion' => 'Av. Centenario Nro. 200 Centenario (Local Central de la Unasam)',
                'institucion_ambito_id' => 1,
                'institucion_tipo_id' => 1,
                'user_id' => 1,
            ],
            [
                'ruc' => '20169004359',
                'nombre' => 'UNIVERSIDAD NACIONAL DE INGENIERIA UNI',
                'direccion' => 'Av. Tupac Amaru Nro. 210 (Km. 4.5 Tupac Amaru)',
                'institucion_ambito_id' => 1,
                'institucion_tipo_id' => 1,
                'user_id' => 1,
            ],
            [
                'ruc' => '20148092282',
                'nombre' => 'UNIVERSIDAD NACIONAL MAYOR DE SAN MARCOS',
                'direccion' => 'Cal. German Amezaga Nro. 375 Otros',
                'institucion_ambito_id' => 1,
                'institucion_tipo_id' => 1,
                'user_id' => 1,
            ],
            [
                'ruc' => '20155945860',
                'nombre' => 'PONTIFICIA UNIVERSIDAD CATOLICA DEL PERU',
                'direccion' => 'Av. Universitaria Nro. 1801',
                'institucion_ambito_id' => 1,
                'institucion_tipo_id' => 1,
                'user_id' => 1,
            ],
            [
                'ruc' => '20164113532',
                'nombre' => 'UNIVERSIDAD CESAR VALLEJO S.A.C.',
                'direccion' => 'Av. Larco Nro. 1770',
                'institucion_ambito_id' => 1,
                'institucion_tipo_id' => 1,
                'user_id' => 1,
            ],
            [
                'ruc' => '20319956043',
                'nombre' => 'UNIVERSIDAD CATOLICA LOS ANGELES DE CHIMBOTE',
                'direccion' => 'Jr. Tumbes Nro. 247 Centro Comercial y Financ (Costado del Centro de Servicio Sunat)',
                'institucion_ambito_id' => 1,
                'institucion_tipo_id' => 1,
                'user_id' => 1,
            ],
            [
                'ruc' => '20172557628',
                'nombre' => 'UNIVERSIDAD NACIONAL DE TRUJILLO',
                'direccion' => 'Cal. Diego de Almagro Nro. 344',
                'institucion_ambito_id' => 1,
                'institucion_tipo_id' => 1,
                'user_id' => 1,
            ],
        ];

        \App\Models\Institucion::insert($instituciones);
    }
}
