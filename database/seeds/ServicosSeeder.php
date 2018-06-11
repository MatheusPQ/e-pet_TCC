<?php

use Illuminate\Database\Seeder;

class ServicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicos')->insert([
            'id' => 1,
            'servico' => "Banho",
        ]);
        DB::table('servicos')->insert([
            'id' => 2,
            'servico' => "Tosa",
        ]);
        DB::table('servicos')->insert([
            'id' => 3,
            'servico' => "Tosa Higiênica",
        ]);
        // DB::table('servicos')->insert([
        //     'id' => 4,
        //     'servico' => "Veterinário",
        // ]);
        // DB::table('servicos')->insert([
        //     'id' => 5,
        //     'servico' => "Pronto Socorro",
        // ]);
        DB::table('servicos')->insert([
            'id' => 6,
            'servico' => "Hidratação",
        ]);
        // DB::table('servicos')->insert([
        //     'id' => 7,
        //     'servico' => "Loja",
        // ]);
        // DB::table('servicos')->insert([
        //     'id' => 8,
        //     'servico' => "Medicamentos",
        // ]);
        DB::table('servicos')->insert([
            'id' => 9,
            'servico' => "Tintura de pelagem",
        ]);
        DB::table('servicos')->insert([
            'id' => 10,
            'servico' => "Escovação de dentes",
        ]);
        DB::table('servicos')->insert([
            'id' => 11,
            'servico' => "Corte de unhas",
        ]);
        DB::table('servicos')->insert([
            'id' => 12,
            'servico' => "Limpeza dos ouvidos",
        ]);
    }
}
