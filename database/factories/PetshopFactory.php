<?php

//use Faker\Generator as Faker;

$factory->define(App\Petshop::class, function (Faker\Generator $faker) use($factory) {

    $faker->addProvider(new Faker\Provider\pt_BR\PhoneNumber($faker));
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    $faker->addProvider(new Faker\Provider\pt_BR\Company($faker));

    return [
        'nomeFantasia' => 'Petshop '.$faker->name,
        'razaoSocial' => 'Petshop '.$faker->name.' RS',
        'cnpj' => $faker->cnpj,
        'cpf' => $faker->cpf,
        'cep' => '00000-000',
        'endereco' => $faker->streetName,
        'numero' => rand(0, 9999),
        'uf' => 'SP',
        'cidade' => $faker->randomElement(['São Bernardo do Campo' ,'São Caetano do Sul', 'Mauá', 'Diadema', 'Santo André', 'Santos', 'São Paulo']),
        'bairro' => str_random(10),
        'telefone' => $faker->phone,
        'email' => $faker->unique()->safeEmail,
        'horarioAbertura' => $faker->randomElement(['07:00' ,'08:00', '09:00', '10:00', '08:30', '07:30']),
        'horarioFechamento' => $faker->randomElement(['19:00' ,'20:00', '21:00', '22:00', '20:30', '19:30']),
        'media_avaliacoes' => 3.0,
        'total_avaliacoes' => 0,
    ];
});