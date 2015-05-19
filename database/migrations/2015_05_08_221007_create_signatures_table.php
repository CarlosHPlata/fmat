<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('signatures', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->text('description');
			$table->integer('credits');
			$table->integer('semester');
			$table->boolean('required');

			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('signatures');
	}

}
