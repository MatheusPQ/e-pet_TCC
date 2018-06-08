<?php

use Faker\Generator as Faker;

$factory->define(App\PetshopUser::class, function (Faker $faker) {

    $user = factory(App\User::class)->create();
    $petshop = factory(App\Petshop::class)->create();

    return [
        'petshop_id' => $petshop->id,
        'user_id' => $user->id,
    ];
});
