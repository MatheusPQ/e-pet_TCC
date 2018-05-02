<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ServicosSeeder::class);
        $this->call(RacasSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(PetshopsSeeder::class);
        $this->call(PetshopUsersSeeder::class);
        $this->call(PetshopServicosSeeder::class);
        $this->call(PetshopServicoRacasSeeder::class);
        $this->call(EventosSeeder::class);
    }
}
