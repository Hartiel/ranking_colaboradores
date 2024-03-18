<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UnidadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $company = $this->faker->unique()->company();
        return [
            'nome_fantasia' => $company,
            'razao_social' => $company,
            'cnpj' => strval(random_int(10000000000000, 99999999999999)),
        ];
    }
}
