<?php 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder{
	public function  run(){
		\DB::table('users')->insert(array(
			'user_name'		=> 'admin',
			'first_name'	=> 'admin',
			'last_name'		=> 'admin',
			'email'			=> 'carlos.ksa21@gmail.com',
			'password'		=> \Hash::make('admin'),
			'type'			=> 'superadmin',
		));

		\DB::table('users')->insert(array(
			'user_name'		=> 'carlos',
			'first_name'	=> 'Carlos',
			'last_name'		=> 'Herrera',
			'email'			=> 'carl_18_hp@hotmail.com',
			'password'		=> \Hash::make('carlos'),
			'type'			=> 'admin',
		));

		\DB::table('users')->insert(array(
			'user_name'		=> 'goregeorge',
			'first_name'	=> 'Jorge',
			'last_name'		=> 'Cardenas',
			'email'			=> 'jorge@fmat.com',
			'password'		=> \Hash::make('jorge'),
			'type'			=> 'admin',
		));

		\DB::table('users')->insert(array(
			'user_name'		=> 'ramon',
			'first_name'	=> 'Ramon',
			'last_name'		=> 'Diaz',
			'email'			=> 'ramon@fmat.com',
			'password'		=> \Hash::make('ramon'),
			'type'			=> 'admin',
		));

		\DB::table('users')->insert(array(
			'user_name'		=> 'alfonso',
			'first_name'	=> 'Alfonso',
			'last_name'		=> 'de Alba',
			'email'			=> 'alfonso@fmat.com',
			'password'		=> \Hash::make('alfonso'),
			'type'			=> 'admin',
		));

		\DB::table('users')->insert(array(
			'user_name'		=> 'arandi',
			'first_name'	=> 'Arandi',
			'last_name'		=> 'Lopez',
			'email'			=> 'arandi@fmat.com',
			'password'		=> \Hash::make('arandi'),
			'type'			=> 'admin',
		));
	}
}