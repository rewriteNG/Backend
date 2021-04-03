<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('char_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->foreign('user_id')->references('id')->on('users');
            $table->integer('char_id')->foreign('char_id')->references('id')->on('char_bases')->onDelete('cascade');
            $table->integer('str')->default(0);
            $table->integer('def')->default(0);
            $table->integer('speed')->default(0);
            $table->integer('stamina')->default(0);
            $table->integer('chakra')->default(50);
            $table->integer('tai')->default(0);
            $table->integer('nin')->default(0);
            $table->integer('gen')->default(0);
            $table->integer('learn')->default(1);
            $table->json('elements');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('char_values');
    }
}
