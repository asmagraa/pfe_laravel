<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapitreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapitre', function (Blueprint $table) {
            $table->id('id');
            $table->string('type_chapitre')->nullable();
            $table->string('name_chapitre')->nullable();
            $table->string('text')->nullable();
            $table->integer('num_chapitre')->nullable();
            $table->integer('num_box')->nullable();
            $table->timestamps();
            
            $table->unsignedBigInteger('id_book');
            $table->foreign('id_book')->references('id')->on ('book');

            $table->unsignedBigInteger('file_id');
            $table->foreign('file_id')->references('id')->on ('file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapitre');
    }
}
