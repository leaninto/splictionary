<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->string('spliction_id');
            $table->string('definition_id');
            $table->ipAddress('ip');
            $table->string('session_id');
            $table->tinyInteger('vote');
            $table->softDeletesTz('deleted_at', 0);
            $table->string('hash');
            $table->timestampsTz();
            $table->unique('hash');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
