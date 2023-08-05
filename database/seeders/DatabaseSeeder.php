<?php

namespace Database\Seeders;

use App\Models\CargoColaborador;
use App\Models\Colaborador;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UnidadeSeeder::class,
            //ColaboradorSeeder::class,
            CargoSeeder::class,
            CargoColaboradorSeeder::class,
        ]);
    }
}
