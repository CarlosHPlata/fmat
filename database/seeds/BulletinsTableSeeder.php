<?php 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class BulletinsTableSeeder extends Seeder {

	public function run(){

		$faker = Faker::create();

		for ($i=0; $i < 10 ; $i++) { 
			$iduser = 	\DB::table('bulletins')->insertGetId(array(
				'title'		   	=> $faker->domainWord,
				'content'		=> $faker->paragraph,
				'date'			=> $faker->date,
				'user_id'		=> $faker->numberBetween(1, 9),
			));
		}
	}
}