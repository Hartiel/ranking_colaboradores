<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UnidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('unidades')->insert([
                'nome_fantasia' => Str::random(10),
                'razao_social' => Str::random(10),
                'cnpj' => Str::random(14),
            ]);
        }
    }
}
