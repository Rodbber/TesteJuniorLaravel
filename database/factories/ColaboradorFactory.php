<?php

namespace Database\Factories;

use App\Models\Unidade;
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
        $faker = \Faker\Factory::create('pt_BR');
        return [
            'unidade_id' => Unidade::inRandomOrder()->first()->id,
            'nome' => $faker->name(),
            'email' => $this->faker->unique()->email(),
            'cpf' => $faker->unique()->cpf(false),
        ];
    }
}
