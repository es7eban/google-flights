<?php

$factory->define(App\Viaje::class, function (Faker\Generator $faker) {
    $aeropuerto_cod = App\Aeropuerto::all()->pluck('iata_cod')->toArray();
    return [
        'duracion' => $faker->time(),
        'origen' => $faker->randomElement($aeropuerto_cod),
        'destino' => $faker->randomElement($aeropuerto_cod),
        'val_tot' => $faker->numberBetween(1323,999999),
        'cant_con' => $faker->numberBetween(0,10),
    ];
});