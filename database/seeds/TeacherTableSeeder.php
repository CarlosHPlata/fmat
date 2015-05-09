<?php 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class TeacherTableSeeder extends Seeder {

	public function run(){

		$faker = Faker::create();

		for ($i=0; $i < 10 ; $i++) { 
			$iduser = 	\DB::table('teachers')->insertGetId(array(
				'first_name'	=> $faker->firstName,
				'last_name'		=> $faker->lastName,
			));
		}
	}
}