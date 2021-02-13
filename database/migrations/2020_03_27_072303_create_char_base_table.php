<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharBaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('char_bases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->foreign('user_id')->references('id')->on('users'); //TODO dont send to frontend
            $table->string('name');
            $table->enum('home_village', ['Konoha', 'Ame', 'Iwa', 'Suna', 'Kusa', 'Kumo', 'Taki', 'Landlos']);
            $table->enum('gender', ['m', 'w', 'd']);
            $table->string('current_location');
            $table->string('faction');
            $table->integer('age');
            $table->string('picture')->nullable();
            $table->string('rank')->default('Genin'); // sollte auch spezial Jounin
            $table->integer('money')->default(1);
            //geburstag
            //gefahrenpotential eventuell account
            //naveau
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
        Schema::dropIfExists('char_base');
    }
}
