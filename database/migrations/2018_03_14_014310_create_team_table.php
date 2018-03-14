<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeamTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('team', function(Blueprint $table) {
            $table->integer('id', true);
            $table->integer('projects_id')->index('fk_team_projects1_idx');
            $table->integer('users_id')->index('fk_team_users1_idx');
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
        Schema::drop('team');
    }

}
