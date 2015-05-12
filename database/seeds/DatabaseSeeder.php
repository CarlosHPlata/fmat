<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		
		$this->call('UserTableSeeder');
		$this->call('FakeUserTableSeeder');
		$this->call('TeacherTableSeeder');
		$this->call('SignaturesTableSeeder');
		$this->call('LinkTableSeeder');
		$this->call('ResourcesTableSeeder');
		$this->call('CommentsTableSeeder');
		$this->call('RatingsTableSeeder');
		$this->call('BulletinsTableSeeder');
	}

}
