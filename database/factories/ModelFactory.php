<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
/*$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
*/
$factory->define(App\Viaje::class, function (Faker\Generator $faker) {
    return [
        'duracion' => $faker->time(),
        'origen' => $faker->countryCode(),
        'destino' => $faker->countryCode(),
        'val_tot' => $faker->numberBetween(1323,999999),
        'cant_con' => $faker->numberBetween(0,10),
    ];
});

$factory->define(App\Vuelo::class, function (Faker\Generator $faker) {
    $viajeIds=\App\Viaje::all()->pluck('id')->toArray();
    return [
        'viaje_id' => $faker->randomElement($viajeIds),
        'duracion' => $faker->time(),
        'origen' => $faker->countryCode(),
        'destino' => $faker->countryCode(3),
        'fec_hora_sal' => $faker->dateTime(),
        'fec_hora_lle' => $faker->dateTime(),
        'con_duracion' => $faker->time(),
        'cabina' => $faker->text(20),
        'comida' => $faker->text(50),
        'carrier_id' => $faker->text(10),
    ];
});