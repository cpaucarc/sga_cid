<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $sexo = rand(1, 2); //1:Fem, 2 Masc
        $fecha_nacimiento = $this->faker->date('Y-m-d', '2005-12-31');
        $correo = $this->faker->safeEmail;

        return [
            'dni' => str_pad(strval(rand(10000, 99999999)), 8, '0', STR_PAD_LEFT),
            'apellido_paterno' =>  $this->faker->lastName,
            'apellido_materno' =>  $this->faker->lastName,
            'nombres' => $this->faker->firstName($sexo == 1 ? 'female' : 'male') . ' ' . $this->faker->firstName($sexo == 1 ? 'female' : 'male'),
            'celular' => strval(rand(900000000, 999999990)),
            'correo' => explode('@', $correo)[0] . substr(explode('-', $fecha_nacimiento)[0], 2, 2) . '@' . explode('@', $correo)[1],
            'fecha_nacimiento' => $fecha_nacimiento,
            'sexo_id' => $sexo,
            'pais_id' => 177, //177 Peru
            'distrito_id' => Arr::random([85, 86, 90, 117, 122, 125, 127, 139, 217, 174, 184]),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
