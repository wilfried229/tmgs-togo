<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptageContraditoireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptage_contraditoire', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedInteger('voie_id');
            $table->unsignedInteger('site_id');
            $table->enum('vacation', [
                env('TYPE_VACATION_06H'),
                env('TYPE_VACATION_14H'),
                env('TYPE_VACATION_20H'),
            ]);
            $table->string('nbre_passageManuel');
            $table->string('nbre_passageSysteme');
            $table->string('montantManuel');
            $table->string('montantInformatiser');
            $table->text('observation');
            //$table->unsignedInteger('users_id');
            $table->timestamps();
            ///$table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('comptage_contraditoire');
    }
}
