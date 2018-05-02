<?php

use Illuminate\Database\Seeder;

class EventosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('eventos')->insert([
            'id' => 1,
            'petshop_id' => 1,
            'title' => "Banho",
            'start' => '2018-04-26 17:00:00',
            'end'   => '2018-04-26 17:30:00'
        ]);
        DB::table('eventos')->insert([
            'id' => 2,
            'petshop_id' => 1,
            'title' => "Tosa",
            'start' => '2018-04-26 16:30:00',
            'end'   => '2018-04-26 17:00:00'
        ]);
    }
}
