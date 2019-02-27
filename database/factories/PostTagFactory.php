<?php

use App\Post;
use Faker\Generator as Faker;

$factory->define(App\PostTag::class, function (Faker $faker) {
	$posts = Post::pluck('id')->toArray();
	$tags = ['php','css','java','regex','sql','xml','go-lang','docker','laravel','python 2.7','python 3','off-topic'];
    return [
        'post_id' => $faker->randomElement($posts),
        'tag' => $faker->randomElement($tags)
    ];
});
