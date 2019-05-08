<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\PhoneNote;
use Faker\Generator as Faker;

$factory->define(PhoneNote::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'phone_number' => $faker->unique()->numberBetween(1000000, 9999999),
        'name' => $faker->name,
        'description' => $faker->text,
        'created_at' => now()
    ];
});
