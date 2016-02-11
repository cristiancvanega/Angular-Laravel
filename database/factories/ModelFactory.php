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
        'name'  => $faker->streetName,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber
    ];
});

$factory->define(App\Obsan\Entities\Municipality::class, function (Faker\Generator $faker) {
    return [
        'name'  => $faker->city
    ];
});

$factory->define(App\Obsan\Entities\Intervention::class, function (Faker\Generator $faker) {
    return [
        'name'  => $faker->name,
        'start_date'                        => $faker->date('y-m-d'),
        'end_date'                          => $faker->date('y-m-d'),
        'address'                           => $faker->streetAddress,
        'description'                       => $faker->paragraph,
        'diversidad_dieta_inicio'           => $faker->numberBetween(0, 2),
        'diversidad_dieta_fin'              => $faker->numberBetween(0, 2),
        'variedad_dieta_inicio'             => $faker->numberBetween(0, 2),
        'variedad_dieta_fin'                => $faker->numberBetween(0, 2),
        'inseguridad_alimentaria_inicio'    => $faker->numberBetween(0, 2),
        'inseguridad_alimentaria_fin'       => $faker->numberBetween(0, 2),
    ];
});

$factory->define(App\Obsan\Entities\Intervened::class, function (Faker\Generator $faker) {
    return [
        'name'          => $faker->name,
        'document_type' => $faker->numberBetween(0, 3),
        'document'      => $faker->randomNumber(9),
        'address'       => $faker->address,
        'phone'         => $faker->phoneNumber,
        'email'         => $faker->email,
        'pupilage'      => $faker->numberBetween(0, 4)
    ];
});

$factory->define(App\Obsan\Entities\IntervenedIntervention::class, function (Faker\Generator $faker) {
    return [
        'interventions_id'  => $faker->numberBetween(1, 15),
        'intervened_id'     => $faker->numberBetween(1, 15)
    ];
});

$factory->define(App\Obsan\Entities\Evaluation::class, function (Faker\Generator $faker) {
    return [
        'intervention_id'       => $faker->numberBetween(1, 45),
        'user_id'               => $faker->numberBetween(1, 15),
        'date'                  => $faker->date('y-m-d'),
        'descripcion_evidencia' => $faker->paragraph,
        'impacto'               => $faker->numberBetween(0, 8),
        'estado_final'          => $faker->numberBetween(0, 3),
        'description'           => $faker->paragraph,
        'recomendaciones'       => $faker->paragraph(3)
    ];
});
