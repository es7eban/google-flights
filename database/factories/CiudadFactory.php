<?php

$factory->define(App\Ciudad::class, function (Faker\Generator $faker) {
    return [
        'cod' => $faker->unique()->currencyCode(),
        'ciudad_nom' => $faker->unique()->city(),
        'pais_cod' => $faker->countryCode()
    ];
});