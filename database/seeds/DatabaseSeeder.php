<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Harry Selkirk',
            'email' => 'hselkirk@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        
        factory(App\User::class, 15)->create()->each(function($u) {
            $u->posts()
                ->saveMany(factory(App\Post::class, rand(1,10))->make())
                ->each(function($post){
                    $post->tags()->saveMany(factory(App\PostTag::class, rand(0, 5))->make());
                    $post->comments()->saveMany(factory(App\Comment::class, rand(3, 15))->make());
                });
        });
        // $this->call(UsersTableSeeder::class);
        // $this->call(PostsTableSeeder::class);
    }
}
