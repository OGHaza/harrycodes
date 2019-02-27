<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
	$users = App\User::pluck('id')->toArray();
	$date = $faker->date;
    return [
        'user_id' => $faker->randomElement($users),
        'title' => $faker->sentence,
        'subtitle' => (rand(1,2) > 1) ? $faker->sentence : '',
        'content' => $faker->text(1000),
        'created_at' => $date,
        'updated_at' => (rand(1,2) > 1) ? $date : $faker->date,
    ];
});
