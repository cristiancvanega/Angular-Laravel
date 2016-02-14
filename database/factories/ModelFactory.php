<?php

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
        'phone' => $faker->numberBetween(8100000, 9999999)
    ];
});

$factory->define(App\Obsan\Entities\Municipality::class, function (Faker\Generator $faker) {
    return [
        'name'  => $faker->city
    ];
});

$factory->define(App\Obsan\Entities\Intervention::class, function (Faker\Generator $faker) {
    return [
        'name'                              => $faker->name,
        'entity_id'                         => $faker->numberBetween(1,15),
        'municipality_id'                   => $faker->numberBetween(1,15),
        'start_date'                        => $faker->date('y-m-d'),
        'end_date'                          => $faker->date('y-m-d'),
        'description'                       => $faker->paragraph,
        'evidencias_planeadas'              => $faker->paragraph,
    ];
});

$factory->define(App\Obsan\Entities\Intervened::class, function (Faker\Generator $faker) {
    return [
        'name'          => $faker->name,
        'document_type' => $faker->numberBetween(1, 4),
        'document'      => $faker->randomNumber(9),
        'address'       => $faker->address,
        'phone'         => $faker->numberBetween(8100000, 9999999),
        'email'         => $faker->email,
        'pupilage'      => $faker->numberBetween(1, 5)
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
        'descripcion_evidencia' => $faker->paragraph,
        'impacto'               => $faker->numberBetween(1, 9),
        'estado_final'          => $faker->numberBetween(1, 4),
        'description'           => $faker->paragraph,
        'recomendaciones'       => $faker->paragraph(3)
    ];
});
