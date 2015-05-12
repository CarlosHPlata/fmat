<?php 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class RatingsTableSeeder extends Seeder {

	public function run(){

		$faker = Faker::create();

		for ($i=0; $i < 10 ; $i++) { 
			$iduser = 	\DB::table('ratings')->insertGetId(array(
				'rate'		   	=> $faker->numberBetween(0,5),
				'teacher_id'	=> $faker->numberBetween(1, 9),
				'user_id'		=> $faker->numberBetween(1, 9),
			));
		}
	}
}