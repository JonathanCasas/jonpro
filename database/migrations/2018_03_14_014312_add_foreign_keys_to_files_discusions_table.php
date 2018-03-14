<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFilesDiscusionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('files_discusions', function(Blueprint $table)
		{
			$table->foreign('discusions_id', 'fk_files_discusions_discusions1')->references('id')->on('discusions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('files_discusions', function(Blueprint $table)
		{
			$table->dropForeign('fk_files_discusions_discusions1');
		});
	}

}
