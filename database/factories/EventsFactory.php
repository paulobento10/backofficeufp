<?php

use Faker\Generator as Faker;

$factory->define(App\Events::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'data' => now(),
        'descricao' => $faker->text,
        'curso' => $faker->text,
        'categoria' => $faker->text,
        'faculdade' => $faker->text,
    ];
});
