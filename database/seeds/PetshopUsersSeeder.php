<?php

use Illuminate\Database\Seeder;

class PetshopUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petshop_users')->insert([
            'petshop_id' => 1,
            'user_id' => 1
        ]);
    }
}