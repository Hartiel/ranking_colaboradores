<?php

namespace Database\Seeders;

use \App\Models\Cargo;
use \App\Models\Unidade;
use \App\Models\Colaborador;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Unidade::factory(100)->create();
        Colaborador::factory(100)->create();
        Cargo::factory(10)->create();
        for ($i = 1; $i <= 100; $i++)
        {
            DB::table('cargo_colaborador')->insert([
                'cargo_id' => random_int(1, 10),
                'colaborador_id' => $i,
                'nota_desempenho' => random_int(0, 10),
            ]);
        }
    }
}
