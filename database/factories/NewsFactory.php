<?php

use Faker\Generator as Faker;

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'nome_pt' => $faker->name,
        'descricao_pt' => $faker->text,
        'curso_pt' => $faker->text,
        'categoria_pt' => $faker->text,
        'faculdade_pt' => $faker->text,
        'nome_en' => $faker->name,
        'descricao_en' => $faker->text,
        'curso_en' => $faker->text,
        'categoria_en' => $faker->text,
        'faculdade_en' => $faker->text,
        'nome_outro' => $faker->name,
        'descricao_outro' => $faker->text,
        'curso_outro' => $faker->text,
        'categoria_outro' => $faker->text,
        'faculdade_outro' => $faker->text,
        'data' => now(),
    ];
});
