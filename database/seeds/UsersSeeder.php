<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => "Fulano Ciclano",
            'email' => 'email@email.com',
            'password' => bcrypt('123456'),
            'phone' => '1112345678',
            'nivel' => '2',
        ]);
    }
}
