<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignatureTeacherTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('signature_teacher', function(Blueprint $table){
			$table->increments('id');

			$table->integer('signature_id')->unsigned();
			$table->integer('teacher_id')->unsigned();

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
		Schema::drop('signature_teacher');
	}

}
