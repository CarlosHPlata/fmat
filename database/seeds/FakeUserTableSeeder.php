<?php 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class FakeUserTableSeeder extends Seeder {

	public function run(){

		$faker = Faker::create();

		for ($i=0; $i < 10 ; $i++) { 
			\DB::table('users')->insert(array(
				'user_name'		=> $faker->unique()->userName,
				'first_name'	=> $faker->firstName,
				'last_name'		=> $faker->lastName,
				'email'			=> $faker->unique()->email,
				'password'		=> \Hash::make('123456'),
				'type'			=> 'user',
			));
		}
	}
}