<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFilesProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('files_projects', function(Blueprint $table)
		{
			$table->foreign('projects_id', 'fk_files_projects_projects1')->references('id')->on('projects')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('files_projects', function(Blueprint $table)
		{
			$table->dropForeign('fk_files_projects_projects1');
		});
	}

}
