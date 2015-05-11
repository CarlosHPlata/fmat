<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ratings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('rate');

			$table->integer('teacher_id')->unsigned();
			$table->integer('user_id')->unsigned();
			
			$table->timestamps();

			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');

			$table->foreign('teacher_id')
				->references('id')
				->on('teachers')
				->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ratings');
	}

}
