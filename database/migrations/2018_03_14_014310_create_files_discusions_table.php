<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilesDiscusionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('files_discusions', function(Blueprint $table) {
            $table->integer('id', true);
            $table->string('route', 100);
            $table->string('name', 45);
            $table->string('type', 45);
            $table->integer('discusions_id')->index('fk_files_discusions_discusions1_idx');
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
        Schema::drop('files_discusions');
    }

}
