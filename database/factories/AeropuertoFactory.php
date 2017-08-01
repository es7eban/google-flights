<?php

$factory->define(App\Aeropuerto::class, function (Faker\Generator $faker) {
    return [
        'iata_cod' => $faker->unique()->currencyCode(),
        'ciudad_cod' => function(){
            return factory(App\Ciudad::class)->create()->cod;
        },
        'nombre' => $faker->countryCode()
    ];
});