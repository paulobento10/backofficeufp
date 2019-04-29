<?php

use Faker\Generator as Faker;

$factory->define(App\Users::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'password' => 'password',
        'curso' => $faker->text,
        'plano' => $faker->text,

    ];
});
