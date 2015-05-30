<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CREATETEXTATTRLOGTABLE extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('logs', function(Blueprint $table)
		{
			$table->text('text');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('logs', function(Blueprint $table)
		{
			$table->dropColumn('text');
		});
	}

}
