<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookOcrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_ocr', function (Blueprint $table) {
            $table->id();
            $table->string('page');
            $table->string('file');
            $table->timestamps();

            $table->unsignedBigInteger('id_book');
            $table->foreign('id_book')->references('id')->on ('book');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_ocr');
    }
}
