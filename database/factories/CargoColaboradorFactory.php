<?php

namespace Database\Factories;

use App\Models\Cargo;
use App\Models\CargoColaborador;
use App\Models\Colaborador;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class CargoColaboradorFactory extends Factory
{
    protected $model = CargoColaborador::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $temp = null;
        return [
            'colaborador_id' => Colaborador::factory(),
            'cargo_id' => Cargo::inRandomOrder()->first()->id,
            'nota_desempenho' => rand(1, 10),
        ];
    }
}
