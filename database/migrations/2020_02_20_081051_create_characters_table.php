<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->enum('home_village', ['Konoha', 'Ame', 'Iwa', 'Suna', 'Kusa', 'Kumo', 'Taki', 'Landlos']);
            $table->string('current_location');
            $table->string('faction');
            $table->integer('age');
            $table->string('picture')->nullable();
            $table->string('rank')->default('Genin');
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
        Schema::dropIfExists('characters');
    }
}
