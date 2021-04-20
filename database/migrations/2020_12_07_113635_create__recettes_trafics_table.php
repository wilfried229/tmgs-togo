<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecettesTraficsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recettes_trafics', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedInteger('voie_id');
            $table->unsignedInteger('site_id');
            $table->enum('vacation', [
                env('TYPE_VACATION_06H'),
                env('TYPE_VACATION_14H'),
                env('TYPE_VACATION_20H'),
            ]);
            $table->string('agent_voie');
            $table->string('montant');
            $table->string('recette_informatiser');
            $table->string('recette_declarer');
            $table->string('manquant');
            $table->string('supplus');
            $table->string('vl');
            $table->string('mini_bus');
            $table->string('autocars_camion');
            $table->string('pl')->nullable();
            $table->string('nbre_exempte');
            $table->string('violation');
            $table->string('total');
            $table->string('observation');

            $table->integer('user_id')->unsigned();
                $table->timestamps();
            //$table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('site_id')->references('id')->on('site');
            //$table->foreign('voie_id')->references('id')->on('voie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_recettes_trafics');
    }
}
