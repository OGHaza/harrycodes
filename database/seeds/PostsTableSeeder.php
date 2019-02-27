<?php

use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = User::pluck('id')->toArray();

        factory(App\Post::class, 50)->create()->each(function ($post) {
            factory(App\PostTag::class, 3)->create(['post_id' => $post->id,]);
        });
    }
}
