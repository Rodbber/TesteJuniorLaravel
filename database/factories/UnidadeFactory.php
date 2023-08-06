<?php

namespace Database\Factories;

use App\Models\Unidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnidadeFactory extends Factory
{
    protected $model = Unidade::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('pt_BR');
        return [
            'nome_fantasia' => $faker->company(),
            'razao_social' => $faker->company(),
            'cnpj' => $faker->unique()->cnpj(false),
        ];
    }
}
