<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->id('id');
            $table->string('type_book')->nullable();
            $table->string('name_book')->nullable();
            $table->string('author')->nullable();
            $table->string('description')->nullable();
            $table->string('langue')->nullable();
            $table->string('edition')->nullable();
            $table->string('user_update')->nullable();
            $table->timestamps();
            
            $table->unsignedBigInteger('id_type');
            $table->foreign('id_type')->references('id')->on ('type_books');

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
        Schema::dropIfExists('book');
    }
}
