<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSplictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('splictions', function (Blueprint $table) {
            $table->id();
            $table->string('first_word');
            $table->string('second_word');
            $table->boolean('first_word_callable')->default(false);
            $table->boolean('second_word_callable')->default(false);
            $table->string('word_splice')->unique();
            $table->text('description')->nullable($value = true);
            $table->binary('pronounce')->nullable($value = true);;
            $table->tinyInteger('status')->default(-1);
            $table->timestampsTz();
            $table->boolean('first_word_dominant')->default(false);
            $table->index(['first_word', 'second_word']);
            $table->index('status');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('splictions');
    }
}
