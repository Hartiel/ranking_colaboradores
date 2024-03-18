<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ColaboradorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'cpf' => strval(random_int(10000000000, 99999999999)),
            'email' => $this->faker->unique()->safeEmail(),
            'unidade_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}
