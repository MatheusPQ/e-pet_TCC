<?php

//use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
// $fakerBR = Faker\Factory::create('pt_BR');
$factory->define(App\User::class, function (Faker\Generator $faker) {

    $faker->addProvider(new Faker\Provider\pt_BR\PhoneNumber($faker));
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'phone' => $faker->phone,
        'cidade' => str_random(10),
        'estado' => str_random(10),
        'nivel' => 2,
    ];
});
