<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Siswa::class, function (Faker $faker) {
    return [
        'user_id' => null,
        'institution_id' => 1,
        'avatar' => $faker->image(),
        'firstname' => $faker->firstName(),
        'lastname'=> $faker->lastName,
        'email' => $faker->email,
        'gender' => $faker->randomElement(['Male', 'Female']),
        'religion' => $faker->randomElement(['Islam', 'Kristen', 'Budha', 'Hindu', 'Katolik']),
        'address' => $faker->address,
        'major' => $faker->word(),
        'major_average' => $faker->randomDigit,
        'age' => $faker->randomDigit,
        'expertise' => $faker->word(),
        'experience' => $faker->randomDigit,
    ];
});
