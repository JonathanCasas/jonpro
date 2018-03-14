<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFilesTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('files_tickets', function(Blueprint $table)
		{
			$table->foreign('tickets_id', 'fk_files_tickets_tickets1')->references('id')->on('tickets')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('files_tickets', function(Blueprint $table)
		{
			$table->dropForeign('fk_files_tickets_tickets1');
		});
	}

}
