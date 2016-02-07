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

$factory->define(App\Obsan\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'name'              => $faker->name,
        'email'             => $faker->email,
        'password'          => bcrypt('12345678'),
        'remember_token'    => str_random(10),
    ];
});

$factory->define(App\Obsan\Entities\Entity::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->email,
        'tel'   => $faker->randomNumber(8)
    ];
});

$factory->define(App\Obsan\Entities\Municipality::class, function (Faker\Generator $faker) {
    return [
        'name'  => $faker->city
    ];
});

$factory->define(App\Obsan\Entities\Evaluation::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(App\Obsan\Entities\Intervened::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(App\Obsan\Entities\IntervenedIntervention::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(App\Obsan\Entities\Intervention::class, function (Faker\Generator $faker) {
    return [
    ];
});
