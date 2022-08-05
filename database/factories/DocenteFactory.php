<?php

namespace Database\Factories;

use App\Constants\Constants;
use App\Models\Docente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Docente>
 */
class DocenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $codigo = Constants::$ultimo_codigo_docente; //22.2.024
        $id = Constants::$docente_id;
        $prefijo = substr(str_pad($this->faker->word, '3', 'A'), 0, 3);
        $year = now()->format('y');

        $correlativo = $year == explode('.', $codigo)[0] ? str_pad((intval(explode('.', $codigo)[2]) + 1), 3, '0', STR_PAD_LEFT) : '001';
        $cod_correlativo = $year . '.' . explode('.', $codigo)[1] . '.' . $correlativo;

        Constants::$ultimo_codigo_docente = $cod_correlativo;
        Constants::$docente_id = ($id + 1);

        return [
            'codigo' => strtoupper($prefijo) . '-' . $cod_correlativo,
            'esta_activo' => true,
            'docente_categoria_id' => rand(1, 7),
            'docente_condicion_id' => rand(1, 2),
            'docente_dedicacion_id' => rand(1, 3),
            'persona_id' => $id
        ];
    }
}
