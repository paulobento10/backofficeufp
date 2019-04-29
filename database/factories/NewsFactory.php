<?php

use Faker\Generator as Faker;

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'data' => now(),
        'descricao' => $faker->text,
        'curso' => $faker->text,
        'categoria' => $faker->text,
        'faculdade' => $faker->text,
    ];
});
