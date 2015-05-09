<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resources', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('description');
			$table->string('path')->nullable();
			$table->enum('type', ['work', 'test']);

			$table->integer('teacher_id')->unsigned();
			$table->integer('signature_id')->unsigned();
			
			$table->timestamps();

			$table->foreign('signature_id')
				->references('id')
				->on('signatures')
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
		Schema::drop('resources');
	}

}
