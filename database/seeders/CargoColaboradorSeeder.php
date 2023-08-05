<?php

namespace Database\Seeders;

use App\Models\CargoColaborador;
use Illuminate\Database\Seeder;

class CargoColaboradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CargoColaborador::factory(100)->create();
    }
}
