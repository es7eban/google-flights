<?php

$factory->define(App\Vuelo::class, function (Faker\Generator $faker) {
    $aeropuerto_cod = App\Aeropuerto::all()->pluck('iata_cod')->toArray();
    return [
        'viaje_id' => function(){
            return factory(App\Viaje::class)->create()->id;
        },
        'duracion' => $faker->time(),
        'origen' => $faker->randomElement($aeropuerto_cod),
        'destino' => $faker->randomElement($aeropuerto_cod),
        'fec_hora_sal' => $faker->dateTime(),
        'fec_hora_lle' => $faker->dateTime(),
        'con_duracion' => $faker->time(),
        'cabina' => $faker->text(20),
        'comida' => $faker->text(50),
        'carrier_id' => $faker->text(10),
    ];
});