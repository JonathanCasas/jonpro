<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('projects', function(Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 45);
            $table->enum('state', array('New', 'Waiting', 'Open', 'Closed', 'Canceled'))->default('New');
            $table->enum('priority', array('Lower', 'Normal', 'High', 'Urgent'));
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('created_by');
            $table->text('description', 16777215)->nullable();
            $table->integer('company_id')->index('fk_projects_company_idx');
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
        Schema::drop('projects');
    }

}
