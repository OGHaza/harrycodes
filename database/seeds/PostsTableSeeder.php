<?php

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
        $users = App\User::pluck('id')->toArray();

    	for ($i = 0; $i < 10; $i++) {
            $date = $faker->date;
	        DB::table('posts')->insert([
	            'user_id' => $faker->randomElement($users),
	            'title' => $faker->sentence,
	            'subtitle' => (rand(1,2) > 1) ? $faker->sentence : '',
	            'content' => $faker->text(1000),
	            'created_at' => $date,
	            'updated_at' => (rand(1,2) > 1) ? $date : $faker->date,
	        ]);
	    }
    }
}
