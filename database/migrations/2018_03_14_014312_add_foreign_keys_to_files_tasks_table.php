<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFilesTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('files_tasks', function(Blueprint $table)
		{
			$table->foreign('tasks_id', 'fk_files_tasks_tasks1')->references('id')->on('tasks')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('files_tasks', function(Blueprint $table)
		{
			$table->dropForeign('fk_files_tasks_tasks1');
		});
	}

}
