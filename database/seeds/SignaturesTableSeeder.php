<?php 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class SignaturesTableSeeder extends Seeder {

	public function run(){

		$faker = Faker::create();
		$posibleSignatures = ['MVC', 'Programacion', 'Algebra', 'Calculo', 'Estadistica', 'Requisitos', 'Metricas', 'Ajax', 'Admin', 'Admin 2', 'Diseno', 'Arquitectura de computadoras', 'Arquitectura de software'];

		for ($i=0; $i < 10 ; $i++) { 
			$id = 	\DB::table('signatures')->insertGetId(array(
				'name'			=> $faker->unique()->word,
				'description'	=> $faker->paragraph,
				'credits'		=> $faker->numberBetween(20, 80),
				'semester'		=> $faker->numberBetween(1, 8),
				'required'		=> $faker->boolean(),
			));

			\DB::table('signature_teacher')->insert(array(
				'signature_id' 	=> $id,
				'teacher_id'	=> $faker->numberBetween(1, 9),
			));
		}
	}
}