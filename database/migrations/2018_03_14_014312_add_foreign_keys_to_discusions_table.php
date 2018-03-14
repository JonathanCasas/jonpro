<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDiscusionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('discusions', function(Blueprint $table) {
            $table->foreign('projects_id', 'fk_discusions_projects1')->references('id')->on('projects')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('users_id', 'fk_discusions_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('discusions', function(Blueprint $table) {
            $table->dropForeign('fk_discusions_projects1');
            $table->dropForeign('fk_discusions_users1');
        });
    }

}
