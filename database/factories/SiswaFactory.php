<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Siswa;
use Faker\Generator as Faker;

$factory->define(Siswa::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'nomor_hp' => $faker->buildingNumber,
        'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
