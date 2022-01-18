<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('definitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('spliction_id');
            $table->string('type_of_word');
            $table->string('definition');
            $table->tinyInteger('status');
            $table->timestampsTz();
            $table->softDeletesTz('deleted_at', 0);
            $table->integer('votes_up');
            $table->integer('votes_down');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('definitions');
    }
}
