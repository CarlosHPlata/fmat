<?php 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class LinkTableSeeder extends Seeder {

	public function run(){

		$faker = Faker::create();

		for ($i=0; $i < 10 ; $i++) { 
			$iduser = 	\DB::table('links')->insertGetId(array(
				'name'		   	=> $faker->domainWord,
				'url'			=> $faker->url,
				'signature_id' 	=> $faker->numberBetween(1, 9),
			));
		}
	}
}