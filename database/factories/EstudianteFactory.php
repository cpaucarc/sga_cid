<?php

namespace Database\Factories;

use App\Constants\Constants;
use App\Models\Docente;
use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudiante>
 */
class EstudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $codigo = Constants::$ultimo_codigo_estudiante; //22.1.0014
        $id = Constants::$estudiante_id;

        $idioma = rand(1, 6);
        $prefijo = ['ENG', 'FRA', 'ITA', 'QUE', 'DEU', 'POR'][$idioma - 1];
        $year = now()->format('y');
        $estudiante_normal = $this->faker->boolean(80); // 80% de ser un estudiante normal
        $correlativo = $year == explode('.', $codigo)[0] ? str_pad((intval(explode('.', $codigo)[2]) + 1), 4, '0', STR_PAD_LEFT) : '0001';
        $cod_correlativo = $year . '.' . explode('.', $codigo)[1] . '.' . $correlativo;

        Constants::$ultimo_codigo_estudiante = $cod_correlativo;
        Constants::$estudiante_id = ($id + 1);

        return [
            'codigo' => $prefijo . '-' . $cod_correlativo,
            'tipo_estudiante_id' => $estudiante_normal ? 1 : 2, // 1 Normal 80, 2 Tercio 20
            'idioma_id' => $idioma,
            'persona_id' => $id
        ];
    }
}
