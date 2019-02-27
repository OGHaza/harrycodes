<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
	$users = App\User::pluck('id')->toArray();
    return [
		'name' => $faker->name,
		'email' => $faker->email,
		'url' => $faker->url,
		'text' => $faker->text(150),
        'user_id' => $faker->randomElement($users),
    ];
});
