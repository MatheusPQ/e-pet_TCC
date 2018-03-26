<?php

use Illuminate\Database\Seeder;

class RacasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('racas')->insert([
            'id' => 1,
            'raca' => "Shih-Tzu",
        ]);
        DB::table('racas')->insert([
            'id' => 2,
            'raca' => "Yorkshire",
        ]);
        DB::table('racas')->insert([
            'id' => 3,
            'raca' => "Poodle",
        ]);
        DB::table('racas')->insert([
            'id' => 4,
            'raca' => "Lhasa Apso",
        ]);
        DB::table('racas')->insert([
            'id' => 5,
            'raca' => "Buldogue Francês",
        ]);
        DB::table('racas')->insert([
            'id' => 6,
            'raca' => "Maltês",
        ]);
        DB::table('racas')->insert([
            'id' => 7,
            'raca' => "Golden Retriever",
        ]);
        DB::table('racas')->insert([
            'id' => 8,
            'raca' => "Labrador",
        ]);
        DB::table('racas')->insert([
            'id' => 9,
            'raca' => "Pug",
        ]);
        DB::table('racas')->insert([
            'id' => 10,
            'raca' => "Dachshund",
        ]);
        DB::table('racas')->insert([
            'id' => 11,
            'raca' => "Spitz Alemão",
        ]);
        DB::table('racas')->insert([
            'id' => 12,
            'raca' => "Pinscher",
        ]);
        DB::table('racas')->insert([
            'id' => 13,
            'raca' => "Schnauzer",
        ]);
        DB::table('racas')->insert([
            'id' => 14,
            'raca' => "Beagle",
        ]);
        DB::table('racas')->insert([
            'id' => 15,
            'raca' => "Cocker Spaniel",
        ]);
        DB::table('racas')->insert([
            'id' => 16,
            'raca' => "Border Collie",
        ]);
        DB::table('racas')->insert([
            'id' => 17,
            'raca' => "Buldogue Inglês",
        ]);
        DB::table('racas')->insert([
            'id' => 18,
            'raca' => "Pit Bull",
        ]);
        DB::table('racas')->insert([
            'id' => 19,
            'raca' => "Chow Chow",
        ]);
        DB::table('racas')->insert([
            'id' => 20,
            'raca' => "Rotweiller",
        ]);
    }
}
