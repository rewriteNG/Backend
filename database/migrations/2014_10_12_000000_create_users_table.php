<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // theoreitschen bonus tage 
        // wievievele trainingspunkte, anhand fähigkeiten erkennen und jutsus
        // maxtainings ein pool für account
        //used Trainingspoint , sind eher am charakcter
        // erstattete trainingspunkte können direkt fester pool der auf null läuft


        // genaue logik für character tod ohne account löschen

        // tracking des characters auf eine account tabelle
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
