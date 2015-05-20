<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class ResourcesTableSeeder extends Seeder {

	public function run(){
		$faker = Faker::create();

		for ($i=0; $i < 10; $i++) { 
			\DB::table('resources')->insert(array(
				'name'		   	=> $faker->domainWord,
				'description'	=> $faker->paragraph,
				'type'			=> $faker->randomElement(['work', 'test']),

				'teacher_id'	=> $faker->numberBetween(1, 9),
				'signature_id' 	=> $faker->numberBetween(1, 9),
				'user_id'		=> $faker->numberBetween(1,9),
			));
		}
	}
}