<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
	$users = App\User::pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($users),
        'title' => $faker->sentence,
        'content' => $faker->text,
    ];
});
