<?php

use Faker\Generator as Faker;

$factory->define(App\Entry::class, function (Faker $faker) {

    return [
	    'firstname' => $faker->firstName,
	    'lastname' => $faker->lastName,
	    'email' => $faker->email,
	    'phone' => $faker->phoneNumber,
	    'address' => $faker->streetAddress,
	    'address2' => $faker->address,
	    'city' => $faker->city,
	    'province' => $faker->randomElement(['AB','BC','MB','NB','NL','NS','NT','NU','ON','QC','SK','YT','PE']),
	    'postalcode' => $faker->postcode,
	    'imei' => $faker->numerify('###############'),
	    'purchased' => $faker->randomElement(['Bell Mobility','Virgin Mobile','The Source','MTS']),
	    'receipt' => 'http://via.placeholder.com/400x500.jpg',
	    'language' => 'en',
    ];
});
