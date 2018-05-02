<?php

use Illuminate\Database\Seeder;

class PetshopServicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petshop_servicos')->insert([
            'petshop_id' => 1,
            'servico_id' => 1
        ]);
        DB::table('petshop_servicos')->insert([
            'petshop_id' => 1,
            'servico_id' => 2
        ]);
        DB::table('petshop_servicos')->insert([
            'petshop_id' => 1,
            'servico_id' => 3
        ]);
        DB::table('petshop_servicos')->insert([
            'petshop_id' => 1,
            'servico_id' => 4
        ]);
    }
}
