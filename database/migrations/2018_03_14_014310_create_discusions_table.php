<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiscusionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('discusions', function(Blueprint $table) {
            $table->integer('id', true);
            $table->string('title', 45);
            $table->text('comment', 16777215);
            $table->integer('projects_id')->index('fk_discusions_projects1_idx');
            $table->integer('users_id')->index('fk_discusions_users1_idx');
            $table->enum('type', array('creation', 'response'));
            $table->integer('parent')->default(0)->comment('el comentario padre');
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
        Schema::drop('discusions');
    }

}
