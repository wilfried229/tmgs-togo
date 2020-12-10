<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDyfonctionnementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dyfonctionnement', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('voie_id')->nullable();
            $table->unsignedInteger('site_id')->nullable();
            $table->date('date');
            $table->string('localisation')->nullable();
            $table->string('dysfonctionnement')->nullable();
            $table->string('cause')->nullable();
            $table->string('travauxArealiser')->nullable();
            $table->string('travauxRealiser')->nullable();
            $table->time('heureConstat')->nullable();
            $table->time(   'heureDebutIntervention')->nullable();
            $table->time('heureFinIntervention')->nullable();
            $table->text('resultatObtenir')->nullable();
            $table->text('besoins')->nullable();
            $table->text('preuve')->nullable();
            $table->text('observation')->nullable();
            $table->integer('user_id')->unsigned()->nullable();

            $table->timestamps();
            ///$table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('site_id')->references('id')->on('site');
            ///$table->foreign('voie_id')->references('id')->on('voie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dyfonctionnement');
    }
}
