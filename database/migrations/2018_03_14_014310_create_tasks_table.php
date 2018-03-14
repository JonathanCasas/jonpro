<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tasks', function(Blueprint $table) {
            $table->integer('id', true);
            $table->integer('projects_id')->index('fk_tasks_projects1_idx');
            $table->string('name', 45);
            $table->enum('type', array('Bug', 'Task', 'Idea', 'Change', 'Advance'));
            $table->text('comments', 16777215)->nullable();
            $table->enum('state', array('New', 'Waiting', 'Open', 'Closed', 'Canceled', 'Done'));
            $table->enum('priority', array('Lower', 'Normal', 'High', 'Urgent'));
            $table->integer('assigned_to');
            $table->integer('estimated_time')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tasks');
    }

}
