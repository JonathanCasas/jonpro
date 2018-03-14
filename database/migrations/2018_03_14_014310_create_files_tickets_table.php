<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilesTicketsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('files_tickets', function(Blueprint $table) {
            $table->integer('id', true);
            $table->string('route', 100);
            $table->string('name', 45);
            $table->string('type', 45);
            $table->integer('tickets_id')->index('fk_files_tickets_tickets1_idx');
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
        Schema::drop('files_tickets');
    }

}
