<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder {
	public function run(){
		$faker = Faker::create();

		for ($i=0; $i < 10; $i++) { 
			\DB::table('comments')->insert(array(
				'comment'			=> $faker->paragraph,
				'anonymous'			=> $faker->boolean,
				'date'				=> $faker->date,
				
				'commentable_id'	=> $faker->numberBetween(1, 9),
				'commentable_type'	=> $faker->randomElement(['App\Signature','App\Teacher', 'App\Bulletin']),

				'user_id'	=> $faker->numberBetween(1, 9),
			));
		}
	}
}
