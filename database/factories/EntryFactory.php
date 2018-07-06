<?php

use Faker\Generator as Faker;

$factory->define(App\Entry::class, function (Faker $faker) {
    return [
        'name'      => $faker->firstName . ' ' . $faker->lastName,
        'email'     => $faker->email,
        'phone'     => $faker->phoneNumber,
        'province'  => $faker->randomElement(['Alberta', 'British Columbia', 'Manitoba', 'New Brunswick	', 'Newfoundland and Labrador', 'Nova Scotia', 'Northwest Territories', 'Nunavut', 'Ontario', 'Quebec', 'Saskatchewan', 'Yukon', 'Prince Edward Island']),
        'birthday'  => $faker->dateTimeBetween('-40 years', '-20 years'),
        'language'  => $faker->randomElement(['en', 'fr']),
    ];
});
