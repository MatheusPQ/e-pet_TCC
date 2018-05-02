<?php

use Illuminate\Database\Seeder;

class PetshopServicoRacasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petshopservicoracas')->insert([
            'petshop_id' => 1,
            'servico_id' => 1,
            'raca_id' => 1,
            'preco' => 15.00
        ]);
        DB::table('petshopservicoracas')->insert([
            'petshop_id' => 1,
            'servico_id' => 1,
            'raca_id' => 2,
            'preco' => 17.00
        ]);
        DB::table('petshopservicoracas')->insert([
            'petshop_id' => 1,
            'servico_id' => 2,
            'raca_id' => 1,
            'preco' => 20.00
        ]);
        DB::table('petshopservicoracas')->insert([
            'petshop_id' => 1,
            'servico_id' => 2,
            'raca_id' => 2,
            'preco' => 25.00
        ]);
        DB::table('petshopservicoracas')->insert([
            'petshop_id' => 1,
            'servico_id' => 3,
            'raca_id' => 1,
            'preco' => 0
        ]);
        DB::table('petshopservicoracas')->insert([
            'petshop_id' => 1,
            'servico_id' => 3,
            'raca_id' => 2,
            'preco' => 40.00
        ]);
        DB::table('petshopservicoracas')->insert([
            'petshop_id' => 1,
            'servico_id' => 4,
            'raca_id' => 1,
            'preco' => 80.00
        ]);
        DB::table('petshopservicoracas')->insert([
            'petshop_id' => 1,
            'servico_id' => 4,
            'raca_id' => 2,
            'preco' => 80.00
        ]);
    }
}
